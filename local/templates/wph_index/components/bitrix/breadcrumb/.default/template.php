<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

if(empty($arResult)) {
    return "";
}

$strReturn = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
$arrow ='<span class="breadcrumbs__separator">/</span>' ;
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
    
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '<a href="'.$arResult[$index]["LINK"].'" class="breadcrumbs__item" itemprop="item">
					<span itemprop="name">'.$title.'</span>
				</a>' .$arrow;
	}
	else
	{
		$strReturn .= '
			<span class="breadcrumbs__item">'.$title.'</span>';
	}
}

$strReturn .= "</div>";
return $strReturn;
