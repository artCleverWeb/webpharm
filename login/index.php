<?php

define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

/**
 * @var global $APPLICATION
 */

$APPLICATION->SetTitle("Авторизация");

if ($GLOBALS["USER"]->IsAuthorized()) {
    LocalRedirect("/");
}

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>