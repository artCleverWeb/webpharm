<?php

AddEventHandler("main", "OnBeforeUserLogin", "OnBeforeUserLoginHandler");

function OnBeforeUserLoginHandler(&$arFields)
{
    $curDir = $GLOBALS["APPLICATION"]->GetCurDir();
    
    //Если мы не пользователь 1C и не логинимся в админку
    if ((substr($curDir, 0, strlen("/bitrix/")) != "/bitrix/") && (substr(
                $curDir,
                0,
                strlen("/1c-exchange/")
            ) != "/1c-exchange/")) {

        // приводим телефон к единому виду
        $arFields["LOGIN"] = CIWebSMS::MakePhoneNumber($arFields["LOGIN"]);
    }
}


//AddEventHandler("main", "OnBeforeProlog", "MyOnBeforePrologHandler");

function MyOnBeforePrologHandler()
{
    if(!is_null($_REQUEST['logout']) && $_REQUEST['logout'] == 'yes'){
        global $USER;
        $USER->Logout();
        LocalRedirect('/login/');
    }

    $allowPublicUrl = [
        '/login/',
        '/registration/',
        '/bitrix/services/main/ajax.php',
    ];

    if(!is_authorized()){
        $url = explode( '?', $_SERVER['REQUEST_URI'])[0];

        if(!in_array($url, $allowPublicUrl) && strpos($url, '/bitrix/admin') === false){
            LocalRedirect('/login/');
        }
    }
}