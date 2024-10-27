<?php

/**
 * @var global $arCurrentValues
 */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

if (!CModule::IncludeModule('iblock')) {
    return;
}

$arIBlockType = CIBlockParameters::GetIBlockTypes();
$arIBlock = [];
$rsIBlock = CIBlock::GetList(['SORT' => 'ASC'], ['TYPE' => $arCurrentValues['IBLOCK_TYPE'], 'ACTIVE' => 'Y']);
while ($arr = $rsIBlock->Fetch()) {
    $arIBlock[$arr['ID']] = '[' . $arr['ID'] . '] ' . $arr['NAME'];
}

$arComponentParameters = [
    'GROUPS' => [],
    'PARAMETERS' => [
        'AJAX_MODE' => [],
        'IBLOCK_TYPE' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('IBLOCK_TYPE'),
            'TYPE' => 'LIST',
            'VALUES' => $arIBlockType,
            'REFRESH' => 'Y',
        ],
        'IBLOCK_ID' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('IBLOCK'),
            'TYPE' => 'LIST',
            'VALUES' => $arIBlock,
            'DEFAULT' => '',
            'ADDITIONAL_VALUES' => 'Y',
            'REFRESH' => 'Y',
        ],
        'CACHE_TIME' => ['DEFAULT' => 3600],
        "SEF_MODE" => [
            "test_list" => [
                "NAME" => GetMessage("test_list"),
                "DEFAULT" => "",
                "VARIABLES" => [],
            ],
            "detail_test" => [
                "NAME" => GetMessage("detail_test"),
                "DEFAULT" => "#SECTION_ID#/",
                "VARIABLES" => ["SECTION_ID"],
            ],
            "attempt_list" => [
                "NAME" => GetMessage("attempt_list"),
                "DEFAULT" => "attempts/course/#COURSE_CODE#/",
                "VARIABLES" => ["COURSE_CODE"],
            ],
            "detail_attempt" => [
                "NAME" => GetMessage("detail_test"),
                "DEFAULT" => "attempts/#COURSE_CODE#/#SECTION_ID#/",
                "VARIABLES" => ["COURSE_CODE", "SECTION_ID"],
            ],
        ],
    ],
];
