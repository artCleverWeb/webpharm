<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

\Bitrix\Main\Loader::includeModule('kolos.studio');

use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\Response\AjaxJson;
use Bitrix\Main\Engine\Response\Component;
use Bitrix\Main\Error;
use Bitrix\Main\Result;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Engine\UrlManager;

class UserMode extends \CBitrixComponent implements Controllerable
{
    public function configureActions()
    {
        return [
            'getState' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod(
                        [ActionFilter\HttpMethod::METHOD_POST]
                    ),
                    new ActionFilter\Csrf(),
                ],
            ],
            'saveState' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod(
                        [ActionFilter\HttpMethod::METHOD_POST]
                    ),
                    new ActionFilter\Csrf(),
                ],
            ],
        ];
    }

    public function saveStateAction($fields)
    {
        try {
            if (is_authorized()) {
                return AjaxJson::createSuccess(
                    [
                        'status' => \Kolos\Studio\Helpers\Users::setExperienced(user_id(), $fields['state'] == 1),
                    ]
                );
            } else {
                return AjaxJson::createSuccess(
                    [
                        'status' => false,
                    ]
                );
            }
        } catch (\Exception $e) {
            $result = new Result();
            $result->addError(new Error($e->getMessage(), $e->getCode()));

            return AjaxJson::createError($result->getErrorCollection());
        }
    }

    public function getStateAction()
    {
        try {
            return AjaxJson::createSuccess(
                [
                    'is_experienced' => getUserExperienced() ? 1 : 0,
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
        return [
            'is_experienced' => getUserExperienced() ? 1 : 0,
        ];
    }

    public function executeComponent()
    {
        try {
            parent::executeComponent();

            $this->arResult = [];
            $this->arResult = array_merge($this->arResult, $this->getResult());
            $this->includeComponentTemplate();
        } catch (\Exception $exception) {
            ShowError($exception->getMessage());
        }
    }
}
