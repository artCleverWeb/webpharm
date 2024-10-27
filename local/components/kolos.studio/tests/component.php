<?php

/**
 * @var global $arParams
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$arDefaultUrlTemplates404 = [];
$arDefaultVariableAliases404 = [];
$arDefaultVariableAliases = [];
$arComponentVariables = [
    "COURSE_CODE",
    "SECTION_ID",
];

$arVariables = [];

$arUrlTemplates = CComponentEngine::MakeComponentUrlTemplates(
    $arDefaultUrlTemplates404,
    $arParams["SEF_URL_TEMPLATES"]
);
$arVariableAliases = CComponentEngine::MakeComponentVariableAliases(
    $arDefaultVariableAliases404,
    $arParams["VARIABLE_ALIASES"]
);

$componentPage = CComponentEngine::ParseComponentPath($arParams["SEF_FOLDER"], $arUrlTemplates, $arVariables);


if (strlen($componentPage) <= 0) {
    $componentPage = "test_list";
}

CComponentEngine::InitComponentVariables($componentPage, $arComponentVariables, $arVariableAliases, $arVariables);

$arResult = [
    "FOLDER" => $arParams["SEF_FOLDER"],
    "URL_TEMPLATES" => $arUrlTemplates,
    "VARIABLES" => $arVariables,
    "ALIASES" => $arVariableAliases,
];

$this->IncludeComponentTemplate($componentPage);
