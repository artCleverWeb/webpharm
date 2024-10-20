<?php
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * @var global $APPLICATION
 * @var $arResult
 */
?>

<div class="grid__item grid__item_1">
    <div class="registration js-registration">
        <form action="#" class="form registration__form">
            <div class="logo-a form__logo">
                <img src="/assets/images/logo-1.png" alt="WebPharm.ru" class="logo-a__img" />
            </div>
            <div class="form__head">
                <div class="title title_size-2 form__title">
                    Регистрация
                </div>
            </div>
            <div class="form__fields">
                <div class="form__item">
                    <div class="form__caption">
                        Телефон
                    </div>
                    <div class="field-form form__field-form">
                        <input type="text" class="input-text field-form__input-text" placeholder="+7 (9 -- ) --- -- -- " data-mask="+7 (000) 000-00-00" />
                    </div>
                    <div class="form__info form__info_error">
                        Поле заполнено неверно
                    </div>
                </div>
                <div class="form__item form__item_submit">
                    <button type="submit" class="button-a button-a_size-1 button-a_wide form__button-submit">
                        Зарегистрироваться
                    </button>
                </div>
                <div class="form__item form__item_submit">
                    <label class="input-button">
                        <input type="checkbox" class="input-button__input" checked />
                        <div class="input-button__icon"></div>
                        <div class="input-button__text">
                            Я ознакомлен с <a href="/pages/conf_policies.php" target="_blank">Политикой<br/> конфиденциальности</a> и <a href="/pages/user_agreements.php" target="_blank">Пользовательским соглашением</a>.
                        </div>
                    </label>
                </div>
                <div class="form__item form__item_padding-1">
                    <a href="/login/" class="button-a button-a_bg-1 button-a_size-1 button-a_wide">
                        Вход
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="grid__item grid__item_2">
    <div class="menu-a">
        <div class="menu-a__text">
            Если вы уже зарегистрированы, пройдите на форму авторизации
        </div>
        <div class="menu-a__list">
            <div class="menu-a__item">
                <a href="/login/" class="link link_type-1 link_color-1 menu-a__item-link">
                    Авторизоваться
                </a>
            </div>
        </div>
    </div>
</div>