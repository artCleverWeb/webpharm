<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

\Bitrix\Main\Loader::includeModule('kolos.studio');

use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\Response\AjaxJson;
use Bitrix\Main\Engine\ActionFilter;
use Kolos\Studio\Helpers\Notification;

class UserProfile extends \CBitrixComponent implements Controllerable
{
    public function configureActions()
    {
        return [
            'getNoticeStatus' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod(
                        [ActionFilter\HttpMethod::METHOD_POST]
                    ),
                    new ActionFilter\Csrf(),
                ],
            ],
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

    public function getNoticeStatusAction()
    {
        if (is_authorized() === true) {
            return AjaxJson::createSuccess(
                [
                    'status' => Notification::getCountUnread(user_id()) > 0,
                ]
            );
        } else {
            return AjaxJson::createError([]);
        }
    }

    protected function getResult()
    {
        return [
            'USER_INFO' => getUserShortInfo() ?? [],
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
