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

        ];
    }

    public function getQuestionAction($arParams)
    {
        try {
            print_r($arParams);
            die();
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
