<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
    die();
}
foreach ($arResult["ITEMS"] as &$arItem)
{
    if (is_array($arItem["PREVIEW_PICTURE"]))
    {
        $arItem["PREVIEW_PICTURE"] = Image::setWebp($arItem["PREVIEW_PICTURE"], ["width" => 80, "height" => 55]);
    }
}