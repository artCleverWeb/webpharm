<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

\Bitrix\Main\Loader::includeModule('kolos.studio');

use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\Response\AjaxJson;
use Bitrix\Main\Engine\ActionFilter;
use Kolos\Studio\Helpers\Notification;

class UserProfile extends \CBitrixComponent implements Controllerable
{
    public function configureActions()
    {
        return [
            'sendSms' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod(
                        [ActionFilter\HttpMethod::METHOD_POST]
                    ),
                    new ActionFilter\Csrf(),
                ],
            ],
            'checkCode' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod(
                        [ActionFilter\HttpMethod::METHOD_POST]
                    ),
                    new ActionFilter\Csrf(),
                ],
            ],
        ];
    }

    public function setStateAction($fields): AjaxJson
    {
        try {
            if (is_authorized()) {
                return AjaxJson::createSuccess(
                    [
                        'status' => \Kolos\Studio\Helpers\Users::setExperienced(user_id(), $fields['state'] == true),
                        'redirect' => "/",
                    ]
                );
            } else {
                return AjaxJson::createSuccess(
                    [
                        'status' => false,
                        'errors' => ['Необходимо авторизоваться'],
                    ]
                );
            }
        } catch (\Exception $exception) {
            $result = new \Bitrix\Main\Result();
            $result->addError(new \Bitrix\Main\Error($exception->getMessage()), $exception->getCode());

            return AjaxJson::createError($result->getErrorCollection());
        }
    }

    public function sendSmsAction($fields): AjaxJson
    {
        try {
            if (is_authorized() === true) {
                return AjaxJson::createSuccess(
                    [
                        'redirect' => "/",
                    ]
                );
            } else {
                CModule::IncludeModule("imaginweb.sms");
                $arParams["mobile"] = str_replace(['(', ')', '+', '_', '-', ' '], "", $fields["mobile"]);
                $arParams["agree"] = strlen($fields["agree"]) > 0;
                $arResult["errors"] = [];

                if (strlen($arParams["mobile"]) < 11) {
                    $arResult["errors"][] = "Укажите корректно номер мобильного телефона.";
                } else {
                    $arParams["mobile"] = CIWebSMS::MakePhoneNumber($fields['mobile']);
                }

                if (!$arParams["agree"]) {
                    $arResult["errors"][] = "Ознакомьтесь с Политикой конфиденциальности и примите Пользовательское соглашение.";
                }

                if (beforeSmsSend($arParams["mobile"]) === false) {
                    $arResult["errors"][] = "Исчерпан лимит отправки СМС. Подождите или обратитесь к менеджеру.";
                }

                if (empty($arResult["errors"])) {
                    $arUser = \Bitrix\Main\UserTable::getRow([
                        'filter' => [
                            "=LOGIN" => htmlspecialchars($arParams["mobile"]),
                        ],
                        'select' => [
                            "ID",
                            "ACTIVE",
                            "LOGIN",
                            "UF_CREEN_PASS",
                        ],
                    ]);

                    if ($arUser["ID"] > 0) {
                        if ($arUser["ACTIVE"] == "Y") {
                            $arResult["exist_reg"] = true;

                            $message = "Логин: " . $arUser["LOGIN"] . " и пароль: " . $arUser["UF_CREEN_PASS"] . " для " . $_SERVER["HTTP_HOST"];
                            CIWebSMS::Send($arUser["LOGIN"], $message);
                            afterSmsSend($arUser["LOGIN"], $message);

                            return AjaxJson::createSuccess(
                                [
                                    'redirect' => "/login/?mobile={$arParams["mobile"]}",
                                ]
                            );
                        } else {
                            $arResult["block_reg"] = true;
                        }
                    } else {
                        $sPasswd = randString(6, ["0123456789"]);

                        $obNewUser = new CUser;
                        $arNewUser = [
                            "ACTIVE" => "Y",
                            "LOGIN" => $arParams["mobile"],
                            "EMAIL" => $arParams["mobile"] . "@mail.crt",
                            "GROUP_ID" => [2, GRID__AUTH_USERS],
                            "PASSWORD" => $sPasswd,
                            "CONFIRM_PASSWORD" => $sPasswd,
                            "UF_CREEN_PASS" => $sPasswd,
                            "LID" => SITE_ID,
                        ];

                        $iNewUser = $obNewUser->Add($arNewUser);

                        if (intval($iNewUser) <= 0) {
                            $arResult["errors"][] = $obNewUser->LAST_ERROR;
                        } else {
                            $message = "Логин: " . $arParams["mobile"] . " и пароль: " . $sPasswd . " для " . $_SERVER["HTTP_HOST"];
                            //CIWebSMS::Send($arParams["mobile"], $message);
                            afterSmsSend($arParams["mobile"], $message);
                            $arResult["state"] = true;
                        }
                    }
                }

                return AjaxJson::createSuccess($arResult);
            }
        } catch (\Exception $e) {
            $result = new \Bitrix\Main\Result();
            $result->addError(new \Bitrix\Main\Error($e->getMessage()), $e->getCode());

            return AjaxJson::createError($result->getErrorCollection());
        }
    }

    public function checkCodeAction($fields): AjaxJson
    {
        try {
            $login = str_replace(['(', ')', '+', '_', '-', ' '], "", $fields["mobile"]);
            $password = $fields["password"];

            $arResult["errors"] = [];

            if (strlen($login) < 11) {
                $arResult["errors"][] = "Укажите корректно номер мобильного телефона.";
                return AjaxJson::createSuccess($arResult);
            } else {
                $login = CIWebSMS::MakePhoneNumber($fields['mobile']);
            }

            global $USER;
            $isLogin = $USER->Login($login, $password, 'Y');

            if ($isLogin !== true) {
                $arResult["errors"][] = $isLogin['MESSAGE'];
            }
            else{
                $arResult['state'] = true;
            }

            return AjaxJson::createSuccess($arResult);

        } catch (\Exception $e) {
            $result = new \Bitrix\Main\Result();
            $result->addError(new \Bitrix\Main\Error($e->getMessage()), $e->getCode());

            return AjaxJson::createError($result->getErrorCollection());
        }
    }

    public function executeComponent()
    {
        try {
            if (is_authorized()) {
                LocalRedirect("/");
            }

            parent::executeComponent();
            $this->arResult = [];
            $this->includeComponentTemplate();
        } catch (\Exception $exception) {
            ShowError($exception->getMessage());
        }
    }
}
