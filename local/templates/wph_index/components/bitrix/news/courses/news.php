<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

\Bitrix\Main\Loader::includeModule('iblock');

$rsSection = \Bitrix\Iblock\SectionTable::getRow([
    'filter' => [
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'DEPTH_LEVEL' => 1,
        'ACTIVE' => 'Y',
    ],
    'order' => [
        'SORT' => 'desc',
    ],
    'select' => [
        'ID',
        'CODE',
        'NAME',
    ],
]);

if ($rsSection) {
    LocalRedirect('/courses/' . $rsSection['CODE'] . '/', true, 301);
}
else{
    LocalRedirect('/' , true, 301);
}