<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\Response\AjaxJson;
use Bitrix\Main\Engine\ActionFilter;

class IblockDouuble extends \CBitrixComponent implements Controllerable
{
    public function configureActions()
    {
        return [
            'getList' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod(
                        [ActionFilter\HttpMethod::METHOD_POST]
                    ),
                    new ActionFilter\Csrf(),
                ],
            ],
        ];
    }

    public function getListAction($arParams)
    {
        try {
            $list = [];

            $arSelect = [
                "ID",
                "NAME",
                "DETAIL_PAGE_URL",
                "IBLOCK_ID",
                "PREVIEW_TEXT",
            ];

            $arFilter = [
                "IBLOCK_ID" => IntVal($arParams['IBLOCK_ID']),
                "ACTIVE_DATE" => "Y",
                "ACTIVE" => "Y",
              //  "INCLUDE_SUBSECTIONS" => 'Y',
            ];

            if (!is_null($arParams['SECTION_CODE'])) {
                $arFilter['SECTION_CODE'] = $arParams['SECTION_CODE'];
            }

            if (!is_null($arParams['SECTION_ID'])) {
                $arFilter['SECTION_ID'] = $arParams['SECTION_ID'];
            }

            if (is_array($arParams['ELEMENT_FILTER'])) {
                $arFilter = array_merge($arParams['ELEMENT_FILTER'], $arFilter);
            }

            $arSort = [
                $arParams['ELEMENT_SORT_1'] ?? 'SORT' => $arParams['ELEMENT_ORDER_1'] ?? 'desc',
                $arParams['ELEMENT_SORT_2'] ?? 'ID' => $arParams['ELEMENT_ORDER_2'] ?? 'asc',
            ];

            $res = CIBlockElement::GetList(
                $arSort,
                $arFilter,
                false,
                ["nPageSize" => $arParams['ELEMENT_COUNT'] ?? 10],
                $arSelect
            );


            while ($ob = $res->GetNextElement()) {
                $item = $ob->GetFields();
                $item['props'] = $ob->GetProperties();

                $item['section'] = \Kolos\Studio\Helpers\Elements::getSectionInfo($item['ID']);

                $list[] = $item;
            }

            $sections = [];

            $arSortSection = [
                $arParams['SECTION_SORT_1'] ?? 'SORT' => $arParams['SECTION_ORDER_1'] ?? 'desc',
                $arParams['SECTION_SORT_2'] ?? 'ID' => $arParams['SECTION_ORDER_2'] ?? 'asc',
            ];

            $arSelectSection = [
                "ID",
                "NAME",
                "SECTION_PAGE_URL",
                "IBLOCK_ID",
                "DESCRIPTION",
                "PICTURE",
                "UF_*",
            ];

            $arFilterSection = [
                "IBLOCK_ID" => IntVal($arParams['IBLOCK_ID']),
                "ACTIVE_DATE" => "Y",
                "ACTIVE" => "Y",
            ];

            if (!is_null($arParams['SECTION_CODE'])) {
                $arFilterSection['SECTION_CODE'] = $arParams['SECTION_CODE'];
            }

            if (!is_null($arParams['SECTION_ID'])) {
                $arFilterSection['SECTION_ID'] = $arParams['SECTION_ID'];
            }

            if (is_array($arParams['SECTION_FILTER'])) {
                $arFilterSection = array_merge($arParams['SECTION_FILTER'], $arFilter);
            }

            $sectionsRes = \CIBlockSection::GetList(
                $arSortSection,
                $arFilterSection,
                false,
                $arSelectSection,
                ["nPageSize" => $arParams['SECTION_COUNT'] ?? 10],
            );

            while ($ob = $sectionsRes->GetNext()) {
                $sections[] = $ob;
            }

            return AjaxJson::createSuccess(
                [
                    'list' => $list,
                    'sections' => $sections,
                ]
            );
        } catch (\Exception $e) {
            $result = new Result();
            $result->addError(new Error($e->getMessage(), $e->getCode()));

            return AjaxJson::createError($result->getErrorCollection());
        }
    }

    protected function getResult()
    {
        return [];
    }

    public function executeComponent()
    {
        try {
            parent::executeComponent();

            $this->arResult = [
                'BLOCK_ID' => md5(implode('.', $this->arParams)),
            ];

            $this->arResult = array_merge($this->arResult, $this->getResult());
            $this->includeComponentTemplate();
        } catch (\Exception $exception) {
            ShowError($exception->getMessage());
        }
    }
}
