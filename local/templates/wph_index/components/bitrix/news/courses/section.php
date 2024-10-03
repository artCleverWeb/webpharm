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
if (intval($arResult['VARIABLES']['SECTION_ID']) > 0) {
    $sectionInfo = Kolos\Studio\Helpers\Sections::getSectionInfo(intval($arResult['VARIABLES']['SECTION_ID']));
}

foreach ($sectionInfo['PATH_TO'] as $section) {
    $APPLICATION->AddChainItem($section['NAME'], $section['SECTION_PAGE_URL']);
}

$tmpSection = current(array_reverse($sectionInfo['PATH_TO']));

if ($sectionInfo['SEO']) {
    $iproperty = $sectionInfo['SEO'];
    $APPLICATION->SetTitle($iproperty['SECTION_PAGE_TITLE'] ?? '');
    $APPLICATION->SetPageProperty("title", $iproperty["SECTION_META_TITLE"] ?? '', []);
    $APPLICATION->SetPageProperty("keywords", $iproperty["SECTION_META_KEYWORDS"] ?? '', []);
    $APPLICATION->SetPageProperty("description", $iproperty["SECTION_META_DESCRIPTION"] ?? '', []);
}

?>
    <!--    <div class="section__part">-->
    <!--        <h2 class="title section__title articles__title">-->
    <!--            <a href=" --><?php
//            echo $tmpSection['SECTION_PAGE_URL'] ?><!--" class="title__data title__data_link">-->
    <!--                <svg class="icon title__arrow">-->
    <!--                    <use xlink:href="/assets/images/icons/icons.svg#icon-arrow-2"></use>-->
    <!--                </svg>-->
    <!--                <span class="title__text">-->
    <!--                --><?php
//                echo $tmpSection['NAME'] ?>
    <!--            </span>-->
    <!--            </a>-->
    <!--        </h2>-->
    <!--    </div>-->

<?php
$APPLICATION->IncludeComponent(
    "kolos.studio:elements.list",
    "simple",
    [
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'SECTION_CODE' => $arResult['VARIABLES']['SECTION_CODE'],
        'COUNT' => 9,
        'SORT_1' => 'SORT',
        'ORDER_1' => 'desc',
        'SORT_2' => 'ACTIVE_FROM',
        'ORDER_2' => 'desc',
        'CACHE_TIME' => 3600,
        'FILTER' => [
            '>PROPERTY_ON_MAIN' => 1,
        ],
    ]
);
?>

<?php
$APPLICATION->IncludeComponent(
    "kolos.studio:iblock.double.list",
    "simple_section",
    [
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'SECTION_ID' => $arResult['VARIABLES']['SECTION_ID'],
        'ELEMENT_COUNT' => 10,
        'ELEMENT_SORT_1' => 'SORT',
        'ELEMENT_ORDER_1' => 'desc',
        'ELEMENT_SORT_2' => 'ACTIVE_FROM',
        'ELEMENT_ORDER_2' => 'desc',
        'SECTION_COUNT' => 10,
        'SECTION_SORT_1' => 'SORT',
        'SECTION_ORDER_1' => 'desc',
        'SECTION_SORT_2' => 'ACTIVE_FROM',
        'SECTION_ORDER_2' => 'desc',
        'CACHE_TIME' => 3600,
    ]
);
?>