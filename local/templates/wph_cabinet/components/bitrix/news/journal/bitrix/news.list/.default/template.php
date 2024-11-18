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
use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
$this->setFrameMode(true);
if ($arResult["ITEMS"]) : ?>
    <div class="section__part">
        <div class="section__header">
            <h2 class="title section__title"><?=Loc::GetMessage("BNL_J_TITLE_BLOCK");?></h2>
        </div>
        <div class="section__grid section__grid_3 journal__list" data-journal="body">
            <? $index = 1; foreach($arResult["ITEMS"] as $i => $arItem) :
                $this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => Loc::GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
                if ($i == 2) :
                    $APPLICATION->IncludeFile($templateFolder."/promo.php", []);
                endif; ?>
                <div class="section__grid-item" id="<?=$this->GetEditAreaId($arItem["ID"]);?>">
                    <a href="<?=$arItem["DETAIL_PAGE_URL"];?>" class="post-mini-c">
                        <div class="post-mini-c__mark post-mini-c__mark_bg-<?=$index;?>"></div>
                        <? if (isset($arItem["FIELDS"]["PREVIEW_PICTURE"]) && is_array($arItem["PREVIEW_PICTURE"])) : ?>
                            <div class="post-mini-c__picture">
                                <picture class="post-mini-c__picture-inner">
                                    <source media="(max-width: 767px)" srcset="<?=$arItem["PREVIEW_PICTURE"]["WEBP"];?>" type="image/webp">
                                    <source srcset="<?=$arItem["PREVIEW_PICTURE"]["WEBP"];?>, <?=$arItem["PREVIEW_PICTURE"]["WEBP"];?> 2x" type="image/webp">
                                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" srcset="<?=$arItem["PREVIEW_PICTURE"]["WEBP"];?> 2x" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"];?>" title="<?=$arItem["PREVIEW_PICTURE"]["ALT"];?>" class="post-mini-c__picture-img" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"];?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"];?>">
                                </picture>
                            </div>
                        <? endif; ?>
                        <div class="post-mini-c__data">
                            <? if (isset($arItem["FIELDS"]["NAME"])) : ?>
                                <div class="post-mini-c__title"><?=$arItem["NAME"];?></div>
                            <? endif; ?>
                            <? if (isset($arItem["FIELDS"]["PREVIEW_TEXT"])) : ?>
                                <div class="post-mini-c__text"><?=$arItem["PREVIEW_TEXT"];?></div>
                            <? endif; ?>
                        </div>
                    </a>
                </div>
                <?
                $index++;
                if ($index > 3)
                {
                    $index = 1;
                }
                ?>
            <? endforeach; ?>
        </div>
    </div>
    <? if (isset($arResult["NAV_RESULT"])) :
        $nav = $arResult["NAV_RESULT"];
        $strNav = ($nav->NavQueryString != "" ? $nav->NavQueryString."&amp;" : "");
        ?>
        <? if ($nav->NavPageNomer < $nav->NavPageCount):?>
            <a data-journal="nav" href="<?=$arParams["SECTION_URL"];?>?<?=$strNav?>PAGEN_<?=$nav->NavNum;?>=<?=($nav->NavPageNomer + 1);?>"></a>
        <? endif; ?>
    <? endif; ?>
<? endif; ?>