<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @var global $APPLICATION
 */

$APPLICATION->SetTitle("Регистрация");

$APPLICATION->IncludeComponent("kolos.studio:user.registration", "", [], false);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>