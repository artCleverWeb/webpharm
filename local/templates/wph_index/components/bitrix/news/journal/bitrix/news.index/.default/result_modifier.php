<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
    die();
}
$arResult["ID"]   = [];
$arResult["ITEM"] = [];
foreach ($arResult["IBLOCKS"] as $arIBlock)
{
    foreach ($arIBlock["ITEMS"] as $arItem)
    {
        $arResult["ID"][] = $arItem["ID"];
        if (is_array($arItem["PREVIEW_PICTURE"]))
        {
            $arItem["PREVIEW_PICTURE"] = Image::setWebp($arItem["PREVIEW_PICTURE"], ["width" => 596, "height" => 320]);
        }
        $arResult["ITEM"] = $arItem;
        break;
    }
    break;
}
$cp = $this->getComponent();
$cp->SetResultCacheKeys(
    [
        "ID"
    ]
);