<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\Response\AjaxJson;
use Bitrix\Main\Engine\ActionFilter;

class ElementsList extends \CBitrixComponent implements Controllerable
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
                "INCLUDE_SUBSECTIONS" => 'Y',
            ];

            if (!is_null($arParams['SECTION_CODE'])) {
                $arFilter['SECTION_CODE'] = $arParams['SECTION_CODE'];
            }

            if (is_array($arParams['FILTER'])) {
                $arFilter = array_merge($arParams['FILTER'], $arFilter);
            }

            $arSort = [
                $arParams['SORT_1'] ?? 'SORT' => $arParams['ORDER_1'] ?? 'desc',
                $arParams['SORT_2'] ?? 'ID' => $arParams['ORDER_2'] ?? 'asc',
            ];

            $res = CIBlockElement::GetList(
                $arSort,
                $arFilter,
                false,
                ["nPageSize" => $arParams['COUNT'] ?? 10],
                $arSelect
            );


            while ($ob = $res->GetNextElement()) {
                $item = $ob->GetFields();
                $item['props'] = $ob->GetProperties();

                $item['section'] = \Kolos\Studio\Helpers\Elements::getSectionInfo($item['ID']);

                $list[] = $item;
            }

            return AjaxJson::createSuccess(
                [
                    'list' => $list,
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