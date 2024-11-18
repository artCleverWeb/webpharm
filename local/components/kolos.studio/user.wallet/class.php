<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

\Bitrix\Main\Loader::includeModule('kolos.studio');

use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\Response\AjaxJson;
use Bitrix\Main\Engine\ActionFilter;
use Kolos\Studio\Helpers\Notification;

class UserWallet extends \CBitrixComponent implements Controllerable
{
    public function configureActions()
    {
        return [
            'getInfo' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod(
                        [ActionFilter\HttpMethod::METHOD_POST]
                    ),
                    new ActionFilter\Csrf(),
                ],
            ],

        ];
    }

    public function getInfoAction(array $fields)
    {
        try {
            if (is_authorized()) {
                $page = intval($fields['page']) ?? 1;
                $count = intval($fields['count']) ?? 1;
                $type = $fields['type'] ?? 'all';

                $moneyClass = new \Kolos\Studio\Money\Money;
                $moneyClass->setUserId(user_id());
                return AjaxJson::createSuccess($moneyClass->getUserWallet($type, $page, $count));
            } else {
                return AjaxJson::createSuccess(
                    [
                        'status' => false,
                        'errors' => ['Необходимо авторизоваться'],
                    ]
                );
            }
        } catch (\Exception $exception) {
            $result = new \Bitrix\Main\Result();
            $result->addError(new \Bitrix\Main\Error($exception->getMessage()), $exception->getCode());

            return AjaxJson::createError($result->getErrorCollection());
        }
    }

    public function executeComponent()
    {
        try {
            parent::executeComponent();
            $this->arResult = [];
            $this->includeComponentTemplate();
        } catch (\Exception $exception) {
            ShowError($exception->getMessage());
        }
    }
}
