<?php
/** @global $arResult */

/** @global $arParams */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

?>
<nav class="menu-main navbar__menu-main">
    <div class="menu-main__list">
        <?php
        foreach ($arResult as $item): ?>
            <?php
            if (($arParams['EXTENDED_MODE'] != 1 && !is_null(
                    $item['PARAMS']['is_extended']
                ) && $item['PARAMS']['is_extended'] == 1) ||
                $arParams['EXTENDED_MODE'] == 1 && !is_null(
                    $item['PARAMS']['is_not_extended']
                ) && $item['PARAMS']['is_not_extended'] == 1
            ) {
                continue;
            }
            ?>
            <div class="menu-main__item <?= ($item['SELECTED'] ? 'active' : '') ?>">
                <a href="<?= $item['LINK'] ?>" class="menu-main__item-link">
                    <?php
                    if (!is_null($item['PARAMS']['icon'])): ?>
                        <div class="menu-main__item-link-icon">
                            <svg class="icon menu-main__item-link-icon-canvas">
                                <use xlink:href="/assets/images/icons/icons.svg#<?=$item['PARAMS']['icon']?>"></use>
                            </svg>
                        </div>
                    <?php
                    endif ?>
                    <div class="menu-main__item-link-text">
                        <?= $item['TEXT'] ?>
                    </div>
                </a>
            </div>
        <?php
        endforeach; ?>
    </div>
</nav>
