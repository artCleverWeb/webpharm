<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * @var $arParams
 */

CModule::IncludeModule("imaginweb.sms");

$arResult["MESS"] = [];
$arResult["ERRORS"] = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($arParams["~AUTH_RESULT"]["TYPE"] == "ERROR") {
        $arResult["ERRORS"][] = $arParams["~AUTH_RESULT"]["MESSAGE"];
    } elseif (strlen($arParams["~AUTH_RESULT"]["MESSAGE"]) > 0) {
        $arResult["MESS"][] = $arParams["~AUTH_RESULT"]["MESSAGE"];
    }
}

if (htmlspecialchars($_REQUEST["forgotpasswd"]) == "yes") {
    $arResult["ERRORS"] = [];
    $arResult["MESS"] = [];

    $sMobile = str_replace(['(', ')', '+', '_', '-', ' '], "", $_REQUEST["USER_LOGIN"]);
    $sMobile = CIWebSMS::MakePhoneNumber($sMobile);

    if(beforeSmsSend($sMobile) === false){
        $arResult["ERRORS"][] = "Исчерпан лимит отправки СМС. Подождите или обратитесь к менеджеру.";
        $sMobile = '';
    }

    if (strlen(trim($sMobile)) > 0) {
        $arUser = CUser::GetList(
            $sBy = "id",
            $sO = "asc",
            [
                "LOGIN_EQUAL" => htmlspecialchars($sMobile),
            ],
            [
                "FIELDS" =>
                    [
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
                $arResult["MESS"][] = "Вам отправлено SMS с паролем.";

                $message = "Логин: " . $arUser["LOGIN"] . " и пароль: " . $arUser["UF_CREEN_PASS"] . " для " . $_SERVER["HTTP_HOST"];
                CIWebSMS::Send($arUser["LOGIN"], $message);
                afterSmsSend($arUser["LOGIN"], $message);
            } else {
                $arResult["ERRORS"][] = "Пользователь не найден.<br>" .
                    "Обратитесь к администратору сайта.";
            }
        } else {
            $arResult["ERRORS"][] = "Введен неверный пароль или номер телефона.";
        }
    }
}
