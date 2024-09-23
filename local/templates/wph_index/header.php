<?php
/** @global $APPLICATION */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>

<!DOCTYPE HTML>
<html lang="ru">
<head>
    <?php $APPLICATION->ShowHead(); ?>
    <title><?php $APPLICATION->ShowTitle(); ?></title>
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
    <link href="/assets/css/main.css" rel="stylesheet"></head>

</head>
<body>
<div id="panel">
    <?php $APPLICATION->ShowPanel(); ?>
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
                        <div class="notices notices_navbar navbar__notices">
                            <div class="notices__icon">
                                <svg class="icon notices__icon-canvas"><use xlink:href="images/icons/icons.svg#icon-bell"></use></svg>
                                <div class="notices__indicator"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar__data">
            <a href="/" class="logo-main navbar__logo">
                <img src="/assets/images/logo.png" alt="WebPharm.ru" title="WebPharm.ru" class="logo-main__img" />
            </a>
            <a href="#" class="user-mini user-mini_navbar navbar__user">
                <div class="user-mini__picture">
                    <img src="/assets/upload/images/1-1.png" alt="" class="user-mini__picture-img">
                </div>
                <div class="user-mini__data">
                    <div class="user-mini__name">
                        Михаил
                    </div>
                </div>
            </a>
            <nav class="menu-main navbar__menu-main">
                <div class="menu-main__list">
                    <div class="menu-main__item active">
                        <a href="#" class="menu-main__item-link">
                            <div class="menu-main__item-link-icon">
                                <svg class="icon menu-main__item-link-icon-canvas"><use xlink:href="images/icons/icons.svg#icon-study"></use></svg>
                            </div>
                            <div class="menu-main__item-link-text">
                                Как начать работать
                            </div>
                        </a>
                    </div>
                    <div class="menu-main__item">
                        <a href="#" class="menu-main__item-link">
                            <div class="menu-main__item-link-icon">
                                <svg class="icon menu-main__item-link-icon-canvas"><use xlink:href="images/icons/icons.svg#icon-ruble"></use></svg>
                            </div>
                            <div class="menu-main__item-link-text">
                                Заработать больше
                            </div>
                        </a>
                    </div>
                </div>
            </nav>

            <div class="navbar__footer">
                <label class="input-button-a navbar__option">
                    <input type="checkbox" class="input-button-a__input" disabled />
                    <span class="input-button-a__icon"></span>
                    <span class="input-button-a__text">
					Опытный сотрудник
				</span>
                </label>
            </div>
        </div>
    </div>
    <div class="cnt page__cnt">