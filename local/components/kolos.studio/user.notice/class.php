<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

\Bitrix\Main\Loader::includeModule('kolos.studio');

use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\Response\AjaxJson;
use Bitrix\Main\Engine\ActionFilter;
use Kolos\Studio\Helpers\Notification;

class UserNotice extends \CBitrixComponent implements Controllerable
{
    public function configureActions()
    {
        return [
            'getNoticeList' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod(
                        [ActionFilter\HttpMethod::METHOD_POST]
                    ),
                    new ActionFilter\Csrf(),
                ],
            ],
        ];
    }

    public function getNoticeListAction(array $params = [])
    {
        try {
            if (is_authorized() === true) {
                return AjaxJson::createSuccess(
                    [
                        'status' => Notification::getCountUnread(user_id()) > 0,
                        'list' => Notification::getList(user_id(), intval($params['count']) ?? 30),
                    ]
                );
            } else {
                return AjaxJson::createSuccess(
                    [
                        'status' => 0,
                        'list' => [],
                    ]
                );
            }
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

            $this->arResult = [];
            $this->arResult = array_merge($this->arResult, $this->getResult());
            $this->includeComponentTemplate();
        } catch (\Exception $exception) {
            ShowError($exception->getMessage());
        }
    }
}
