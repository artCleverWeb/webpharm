<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
    die();
}
/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 */
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
$this->setFrameMode(true);
if ($arResult["ITEM"]) : ?>
    <div class="section__part section__part_post">
        <div class="post-mini-c post-mini-c_type-1">
            <? if (isset($arResult["ITEM"]["FIELDS"]["PREVIEW_PICTURE"]) && is_array($arResult["ITEM"]["PREVIEW_PICTURE"])) : ?>
                <a href="<?=$arResult["ITEM"]["DETAIL_PAGE_URL"]?>" class="post-mini-c__picture">
                    <picture class="post-mini-c__picture-inner">
                        <source media="(max-width: 767px)" srcset="<?=$arResult["ITEM"]["PREVIEW_PICTURE"]["WEBP"];?>" type="image/webp">
                        <source srcset="<?=$arResult["ITEM"]["PREVIEW_PICTURE"]["WEBP"];?>, <?=$arResult["ITEM"]["PREVIEW_PICTURE"]["WEBP"];?> 2x" type="image/webp">
                        <img src="<?=$arResult["ITEM"]["PREVIEW_PICTURE"]["SRC"];?>" srcset="<?=$arResult["ITEM"]["PREVIEW_PICTURE"]["WEBP"];?> 2x" alt="<?=$arResult["ITEM"]["PREVIEW_PICTURE"]["ALT"];?>" title="<?=$arResult["ITEM"]["PREVIEW_PICTURE"]["ALT"];?>" class="post-mini-c__picture-img" width="<?=$arResult["ITEM"]["PREVIEW_PICTURE"]["WIDTH"];?>" height="<?=$arResult["ITEM"]["PREVIEW_PICTURE"]["HEIGHT"];?>">
                    </picture>
                </a>
            <? endif; ?>
            <div class="post-mini-c__data">
                <? if (isset($arResult["ITEM"]["FIELDS"]["NAME"])) : ?>
                    <div class="post-mini-c__title">
                        <a href="<?=$arResult["ITEM"]["DETAIL_PAGE_URL"]?>" class="post-mini-c__title-link"><?=$arResult["ITEM"]["NAME"]?></a>
                    </div>
                <? endif; ?>
                <? if (isset($arResult["ITEM"]["FIELDS"]["PREVIEW_TEXT"])) : ?>
                    <div class="post-mini-c__text"><?=$arResult["ITEM"]["PREVIEW_TEXT"]?></div>
                <? endif; ?>
                <div class="post-mini-c__button post-mini-c__button_more">
                    <a href="<?=$arResult["ITEM"]["DETAIL_PAGE_URL"]?>" class="button-a button-a_bg-1 post-mini-c__button-more-element">
                        <?= Loc::GetMessage("BNI_BTN_DETAIL_PAGE"); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
<? endif; ?>