<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/**
 * @var global $APPLICATION
 */

$APPLICATION->SetTitle("Обучение / тестирование");
?>

<?php
$APPLICATION->IncludeComponent(
    "kolos.studio:tests",
    ".default",
    array(
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "IBLOCK_ID" => "6",
        "IBLOCK_TYPE" => "content",
        "COMPONENT_TEMPLATE" => ".default",
        "SEF_MODE" => "Y",
        "SEF_FOLDER" => "/courses/tests/",
        "SEF_URL_TEMPLATES" => array(
            "test_list" => "attempts/",
            "detail_test" => "#SECTION_ID#/",
            "attempt_list" => "attempts/#TEST_ID#/",
            "detail_attempt" => "attempts/#TEST_ID#/#SECTION_ID#/",
        )
    ),
    false
); ?>

<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
