<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

/**
 * @var global $APPLICATION
 */

$APPLICATION->SetTitle("Мой кошелек");

$APPLICATION->IncludeComponent("kolos.studio:user.wallet", "", [], false);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); 