<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var global $APPLICATION
 * @var $arResult
 */

if ($arResult["LAST_LOGIN"]) {
    $loginStr = substr($arResult["LAST_LOGIN"], 1, strlen($arResult["LAST_LOGIN"]) - 1);
}
?>
<div class="grid grid_layout-1">
    <div class="grid__item grid__item_1">
        <div class="authorization js-authorization">
            <form action="<?= $APPLICATION->GetCurPageParam("forgotpasswd=yes", ["login", "forgot_password", "mobile"]
            ) ?>" class="form authorization__form" name="form_auth" method="post">
                <div class="logo-a form__logo">
                    <img src="/assets/images/logo-1.png" alt="WebPharm.ru" class="logo-a__img"/>
                </div>
                <div class="form__head">
                    <div class="title title_size-2 form__title">
                        Восстановление пароля
                    </div>
                </div>
                <?php
                if (!empty($arResult['MESS'])):?>
                    <div class="form-wrap"><?php
                        ShowNote(implode('<br />', $arResult['MESS'])) ?></div>
                <?php
                endif; ?>
                <?php
                if (!empty($arResult['ERRORS'])):?>
                    <div class="form-wrap"><?php
                        ShowError(implode('<br />', $arResult['ERRORS'])) ?></div>
                <?php
                endif; ?>
                <?php
                if ($_GET['mobile']):?>
                    <div class="form-wrap"><?= ShowNote('Вам отправлено SMS с логином и паролем.') ?></div>
                <?php
                endif; ?>
                <input type="hidden" name="AUTH_FORM" value="Y"/>
                <input type="hidden" name="TYPE" value="AUTH"/>
                <?php
                if (strlen($arResult['BACKURL']) > 0):?>
                    <input type="hidden" name="backurl" value="<?= $arResult['BACKURL'] ?>"/>
                <?php
                endif ?>

                <?php
                foreach ($arResult['POST'] as $key => $value):?>
                    <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
                <?php
                endforeach ?>

                <div class="form__fields">
                    <div class="form__item"> <!-- form__item invalid -->
                        <div class="form__caption">
                            Телефон
                        </div>
                        <div class="field-form form__field-form">
                            <input type="text" class="input-text field-form__input-text" name="USER_LOGIN"
                                   value="<?= $loginStr ?>" placeholder="+7 (9 -- ) --- -- -- "
                                   data-mask="+7 (000) 000-00-00"/>
                        </div>
                        <div class="form__info form__info_error">
                            Поле заполнено неверно
                        </div>
                    </div>
                    <div class="form__item form__item_submit">
                        <button type="submit" class="button-a button-a_size-1 button-a_wide form__button-submit">
                            Востановить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="grid__item grid__item_2">
        <div class="menu-a">
            <div class="menu-a__list">
                <div class="menu-a__item">
                    <a href="/login/" class="link link_type-1 link_color-1 menu-a__item-link">
                        Авторизоваться
                    </a>
                </div>
                <!--            <div class="menu-a__item">-->
                <!--                <a href="/change-number/" class="link link_type-1 link_color-1 menu-a__item-link">-->
                <!--                    Изменился номер телефона?-->
                <!--                </a>-->
                <!--            </div>-->
                <div class="menu-a__item">
                    <a href="/registration/" class="link link_type-1 link_color-1 menu-a__item-link">
                        Зарегистрироваться
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>