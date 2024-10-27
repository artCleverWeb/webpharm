<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="post-card">
    <?php
    if ($arResult['DISPLAY_PROPERTIES']['PRESENTATION']['VALUE']): ?>
        <div class="presentation js-presentation presentation_margin-1"
             data-pdf="<?= $arResult['DISPLAY_PROPERTIES']['PRESENTATION']['FILE_VALUE']['SRC'] ?>">
            <div class="preloader presentation__preloader">
                <div class="preloader__spinner"></div>
            </div>
            <div class="presentation__nav">
                <button type="button" class="presentation__nav-button presentation__nav-button_prev">
                    <svg class="icon presentation__nav-button-icon">
                        <use xlink:href="images/icons/icons.svg#icon-arrow-2"></use>
                    </svg>
                    <span class="presentation__nav-button-text">
											Предыдущая страница
										</span>
                </button>

                <div class="presentation__pages">
                    <span class="presentation__pages-number presentation__pages-number_current"></span>
                    страница из
                    <span class="presentation__pages-number presentation__pages-number_total"></span>
                </div>

                <button type="button" class="presentation__nav-button presentation__nav-button_next">
										<span class="presentation__nav-button-text">
											Следующая страница
										</span>
                    <svg class="icon presentation__nav-button-icon">
                        <use xlink:href="images/icons/icons.svg#icon-arrow-2"></use>
                    </svg>
                </button>
            </div>
            <div class="presentation__data">
                <canvas class="presentation__canvas"></canvas>
            </div>
            <div class="presentation__link">
                <a href="upload/documents/1-1.pdf" target="_blank">
                    Скачать презентацию
                </a>
            </div>

            <script src="/assets/pdfjs/build/pdf.min.js" type="module"></script>
            <script src="/assets/pdfjs/presentation.js" type="module"></script>
        </div>
    <?php
    endif; ?>
    <?php
    echo $arResult['DETAIL_TEXT'] ?>
</div>
