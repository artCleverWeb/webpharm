<?php
define('NEED_AUTH', 'Y');
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?>
<div class="header content__header u-md-hidden">
    <div class="title headline">
        <h1 class="headline__title">
            Центр обучения <b>Эркафарм</b>
        </h1>
    </div>
</div>

<?php if(getUserExperienced() === false):?>
    <?php
    $APPLICATION->IncludeComponent(
        "kolos.studio:elements.list",
        "",
        [
            'IBLOCK_ID' => IBLOCK_ID_COURSES,
            'SECTION_CODE' => IBLOCK_SECTION_CODE_START_WORK,
            'COUNT' => 9,
            'SORT_1' => 'SORT',
            'ORDER_1' => 'desc',
            'SORT_2' => 'ACTIVE_FROM',
            'ORDER_2' => 'desc',
            'CACHE_TIME' => 3600,
            'FILTER' => [
                '>PROPERTY_ON_MAIN' => 1,
            ],
            'BLOCK_TITLE' => 'Как начать работать',
            'LINK_MORE' => '/courses/' . IBLOCK_SECTION_CODE_START_WORK . "/",
        ]
    );
    ?>
<?php endif;?>

<?php
$APPLICATION->IncludeComponent(
    "kolos.studio:elements.list",
    "",
    [
        'IBLOCK_ID' => IBLOCK_ID_COURSES,
        'SECTION_CODE' => IBLOCK_SECTION_CODE_CAREER,
        'COUNT' => 9,
        'SORT_1' => 'SORT',
        'ORDER_1' => 'desc',
        'SORT_2' => 'ACTIVE_FROM',
        'ORDER_2' => 'desc',
        'CACHE_TIME' => 3600,
        'FILTER' => [
            '>PROPERTY_ON_MAIN' => 1,
        ],
        'BLOCK_TITLE' => 'Карьера',
        'LINK_MORE' => '/courses/' . IBLOCK_SECTION_CODE_CAREER . "/",
    ]
);
?>

<?php
$APPLICATION->IncludeComponent(
    "kolos.studio:elements.list",
    "",
    [
        'IBLOCK_ID' => IBLOCK_ID_COURSES,
        'SECTION_CODE' => IBLOCK_SECTION_CODE_WE_CARE,
        'COUNT' => 9,
        'SORT_1' => 'SORT',
        'ORDER_1' => 'desc',
        'SORT_2' => 'ACTIVE_FROM',
        'ORDER_2' => 'desc',
        'CACHE_TIME' => 3600,
        'FILTER' => [
            '>PROPERTY_ON_MAIN' => 1,
        ],
        'BLOCK_TITLE' => 'Мы заботимся о вас',
        'LINK_MORE' => '/courses/' . IBLOCK_SECTION_CODE_WE_CARE . "/",
    ]
);
?>

<?php
$APPLICATION->IncludeComponent(
    "kolos.studio:elements.list",
    "",
    [
        'IBLOCK_ID' => IBLOCK_ID_COURSES,
        'SECTION_CODE' => IBLOCK_SECTION_CODE_EARN_MORE,
        'COUNT' => 9,
        'SORT_1' => 'SORT',
        'ORDER_1' => 'desc',
        'SORT_2' => 'ACTIVE_FROM',
        'ORDER_2' => 'desc',
        'CACHE_TIME' => 3600,
        'FILTER' => [
            '>PROPERTY_ON_MAIN' => 1,
        ],
        'BLOCK_TITLE' => 'Заработать больше',
        'LINK_MORE' => '/courses/' . IBLOCK_SECTION_CODE_EARN_MORE . "/",
    ]
);
?>

<?php
$APPLICATION->IncludeComponent(
    "kolos.studio:elements.list",
    "",
    [
        'IBLOCK_ID' => IBLOCK_ID_COURSES,
        'SECTION_CODE' => IBLOCK_SECTION_CODE_EARN_EVEN_MORE,
        'COUNT' => 9,
        'SORT_1' => 'SORT',
        'ORDER_1' => 'desc',
        'SORT_2' => 'ACTIVE_FROM',
        'ORDER_2' => 'desc',
        'CACHE_TIME' => 3600,
        'FILTER' => [
            '>PROPERTY_ON_MAIN' => 1,
        ],
        'BLOCK_TITLE' => 'Заработать ещё больше',
        'LINK_MORE' => '/courses/' . IBLOCK_SECTION_CODE_EARN_EVEN_MORE . "/",
    ]
);
?>

<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>