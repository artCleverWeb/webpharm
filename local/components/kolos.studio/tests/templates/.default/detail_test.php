<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var global $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */

$APPLICATION->IncludeComponent(
    "kolos.studio:tests.form",
    "",
    array(
        "CACHE_TIME" => $arParams['CACHE_TIME'],
        "CACHE_TYPE" => $arParams['CACHE_TYPE'],
        "IBLOCK_ID" => $arParams['IBLOCK_ID'],
        "IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
        "SECTION_CODE" => $arResult['VARIABLES']['SECTION_CODE'],
    )
);

