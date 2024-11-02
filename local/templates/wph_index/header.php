<?php

/** @global $APPLICATION */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<!DOCTYPE HTML>
<html lang="ru">
<head>
    <?php
    $APPLICATION->ShowHead(); ?>
    <title><?php
        $APPLICATION->ShowTitle(); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, maximum-scale=2">

    <link rel="mask-icon" href="/assets/favicon/favicon.png"/>
    <!-- <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png"/> -->
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
          rel="stylesheet">
    <script defer src="/assets/js/runtime.bundle.js"></script>
    <script defer src="/assets/js/vendors.bundle.js"></script>
    <script defer src="/assets/js/main.bundle.js"></script>
    <link href="/assets/css/main.css" rel="stylesheet">
    <?php include_file('/include/header/js_controller_urls.php', true); ?>
</head>

</head>
<body>
<div id="panel">
    <?php
    $APPLICATION->ShowPanel(); ?>
</div>
<div class="page">
    <div class="navbar js-navbar">
        <div class="navbar__header">
            <div class="cnt navbar__header-cnt">
                <div class="navbar__grid navbar__grid_1">
                    <div class="navbar__grid-item navbar__grid-item_1">
                        <button type="button" class="navbar__button-toggle">
                            <span class="navbar__button-toggle-line"></span>
                            <span class="navbar__button-toggle-line"></span>
                            <span class="navbar__button-toggle-line"></span>
                        </button>
                    </div>
                    <div class="navbar__grid-item navbar__grid-item_2">
                        <div class="navbar__header-logo">
                            Центр обучения<br/>
                            <b>Эркафарм</b>
                        </div>
                    </div>
                    <div class="navbar__grid-item navbar__grid-item_3">
                        <?php
                        $APPLICATION->IncludeComponent(
                            "kolos.studio:user.notice",
                            "",
                            [
                            ]
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar__data">
            <a href="/" class="logo-main navbar__logo">
                <img src="/assets/images/logo.png" alt="WebPharm.ru" title="WebPharm.ru" class="logo-main__img"/>
            </a>
            <?php
            if (count(($userInfo = getUserShortInfo())) > 0): ?>
                <a href="#" class="user-mini user-mini_navbar navbar__user">
                    <div class="user-mini__picture">
                        <img src="<?= $userInfo['pict'] ?>" alt="" class="user-mini__picture-img">
                    </div>
                    <div class="user-mini__data">
                        <div class="user-mini__name">
                            <?= $userInfo['name'] ?>
                        </div>
                    </div>
                </a>
            <?php
            endif ?>
            <?php
            $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "main",
                [
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "left",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "1",
                    "MENU_CACHE_GET_VARS" => [""],
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "top",
                    "USE_EXT" => "N",
                    "EXTENDED_MODE" => getUserExperienced(),
                ]
            ); ?>

            <?php
            $APPLICATION->IncludeComponent(
                "kolos.studio:user.mode",
                "",
                [
                ]
            ); ?>
        </div>
    </div>
    <div class="cnt page__cnt">
        <div class="grid grid_layout">
            <div class="grid__item grid__item_1">
                <div class="content">
                    <?php
                    if ($APPLICATION->GetCurPage(false) !== '/'): ?>
                        <div class="header content__header">
                            <div class="header__grid header__grid_1">
                                <div class="header__grid-item header__grid-item_1">
                                    <div class="headline">
                                        <h1 class="title headline__title">
                                            <?= $APPLICATION->ShowTitle(false); ?>
                                        </h1>
                                    </div>
                                    <?php
                                    $APPLICATION->IncludeComponent(
                                        "bitrix:breadcrumb",
                                        ".default",
                                        array(
                                            "PATH" => "",
                                            "SITE_ID" => "s1",
                                            "START_FROM" => "0",
                                        ),
                                        false
                                    ); ?>
                                </div>
                                <div class="header__grid-item header__grid-item_2">
                                    <div class="search-mini">
                                        <form action="#" class="search-mini__form">
                                            <input type="text" class="search-mini__input-text"
                                                   placeholder="Искать курс"/>
                                            <button type="submit" class="search-mini__button-submit">
                                                <svg class="icon search-mini__button-submit-icon">
                                                    <use xlink:href="/assets/images/icons/icons.svg#icon-search"></use>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endif; ?>
