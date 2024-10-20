<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * @var global $USER
 */

if ($USER->IsAuthorized()) {
    LocalRedirect("/");
}

CModule::IncludeModule("imaginweb.sms");

// параметры
$arParams["mobile"] = str_replace(['(', ')', '+', '_', '-', ' '], "", $_POST["mobile"]);
$arParams["agree"] = strlen($_POST["agree"]) > 0;
$arParams["send"] = strlen($_POST["send"]) > 0;

if ($arParams["send"]) {
    $arResult["ERRORS"] = [];

    if (strlen($arParams["mobile"]) < 11) {
        $arResult["ERRORS"][] = "Укажите корректно номер мобильного телефона.";
    } else {
        $arParams["mobile"] = CIWebSMS::MakePhoneNumber($_POST['mobile']);
    }

    if (!$arParams["agree"]) {
        $arResult["ERRORS"][] = "Ознакомьтесь с Политикой конфиденциальности и примите Пользовательское соглашение.";
    }

    if (empty($arResult["ERRORS"])) {
        $arUser = CUser::GetList(
            $sBy = "id",
            $sO = "asc",
            [],
            [
                "FIELDS" => [
                    "ID",
                    "ACTIVE",
                    "LOGIN",
                ],
                "SELECT" => [
                    "UF_CREEN_PASS",
                ],
            ]
        )->GetNext();

        if ($arUser["ID"] > 0) {
            if ($arUser["ACTIVE"] == "Y") {
                $arResult["EXIST_REG"] = true;
                CIWebSMS::Send(
                    $arUser["LOGIN"],
                    "Логин: " . $arUser["LOGIN"] . " и пароль: " . $arUser["UF_CREEN_PASS"] . " для " . $_SERVER["HTTP_HOST"]
                );
                LocalRedirect("/auth/?mobile={$arParams["mobile"]}");
            } else {
                $arResult["BLOCK_REG"] = true;
            }
        } else {
            $sPasswd = randString(4, ["0123456789"]);

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
                $arResult["ERRORS"][] = $obNewUser->LAST_ERROR;
            } else {
                $arResult["GOOD_REG"] = true;
                CIWebSMS::Send(
                    $arParams["mobile"],
                    "Логин: " . $arParams["mobile"] . " и пароль: " . $sPasswd . " для " . $_SERVER["HTTP_HOST"]
                );
                LocalRedirect("/auth/?mobile={$arParams["mobile"]}");
            }
        }
    } else {
        if (strlen($arParams["mobile"]) < 11) {
            $arParams["mobile"] = "";
        } else {
            $arParams["mobile"] = CIWebSMS::MakePhoneNumber($_POST['mobile']);
            $arParams["mobile"] = substr($arParams['mobile'], 1, strlen($arParams['mobile']) - 1);
        }
    }
}

$this->IncludeComponentTemplate();
