<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\Response\AjaxJson;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Result;
use Bitrix\Main\Error;

class TestsForm extends \CBitrixComponent implements Controllerable
{

    public function configureActions()
    {
        return [
            'getQuestion' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod(
                        [ActionFilter\HttpMethod::METHOD_POST]
                    ),
                    new ActionFilter\Csrf(),
                ],
            ],
            'startTest' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod(
                        [ActionFilter\HttpMethod::METHOD_POST]
                    ),
                    new ActionFilter\Csrf(),
                ],
            ],
        ];
    }

    public function startTestAction(array $fields)
    {
        try {
            if (is_authorized() === true) {
                if (($testId = intval($fields['testId'])) > 0) {
                    \Bitrix\Main\Loader::includeModule('kolos.studio');
                    $testEntity = new Kolos\Studio\Tests\Test;
                    if ($testEntity->setTestId($fields['testId']) === true) {
                        $result = $testEntity->getResultEntity()->startTest();
                        return AjaxJson::createSuccess($result);
                    } else {
                        $result = new Result();
                        $result->addError(new Error("Тест не найден или не активен", 404));

                        return AjaxJson::createError($result->getErrorCollection());
                    }
                } else {
                    $result = new Result();
                    $result->addError(new Error("Тест не найден или не активен", 404));

                    return AjaxJson::createError($result->getErrorCollection());
                }
            } else {
                $result = new Result();
                $result->addError(new Error("Пользователь не авторизован", 403));

                return AjaxJson::createError($result->getErrorCollection());
            }
        } catch (\Exception $e) {
            $result = new Result();
            $result->addError(new Error($e->getMessage(), $e->getCode()));

            return AjaxJson::createError($result->getErrorCollection());
        }
    }

    public function getQuestionAction(array $arParams, array $fields): AjaxJson
    {
        try {
            if (is_authorized() === true) {
                if (($testId = intval($fields['testId'])) > 0) {
                    \Bitrix\Main\Loader::includeModule('kolos.studio');
                    $testEntity = new Kolos\Studio\Tests\Test;
                    if ($testEntity->setTestId($fields['testId']) === true) {
                        $result = $testEntity->getQuestionEntity()->getNextQuestion();
                        return AjaxJson::createSuccess($result);
                    } else {
                        $result = new Result();
                        $result->addError(new Error("Тест не найден или не активен", 404));

                        return AjaxJson::createError($result->getErrorCollection());
                    }
                } else {
                    $result = new Result();
                    $result->addError(new Error("Тест не найден или не активен", 404));

                    return AjaxJson::createError($result->getErrorCollection());
                }
            } else {
                $result = new Result();
                $result->addError(new Error("Пользователь не авторизован", 403));

                return AjaxJson::createError($result->getErrorCollection());
            }
        } catch (\Exception $e) {
            $result = new Result();
            $result->addError(new Error($e->getMessage(), $e->getCode()));

            return AjaxJson::createError($result->getErrorCollection());
        }
    }

    private function getResult()
    {
        if (strlen($this->arParams['SECTION_CODE']) > 1) {
            \Bitrix\Main\Loader::includeModule('kolos.studio');
            $testEntity = new Kolos\Studio\Tests\Test;

            if ($testEntity->setTestIdByCode($this->arParams['SECTION_CODE']) === true) {
                $this->arResult['testInfo'] = $testEntity->getInfo();
                if ($this->arResult['testInfo']) {
                    global $APPLICATION;
                    $APPLICATION->SetTitle($this->arResult['testInfo']['NAME']);
                    $APPLICATION->SetPageProperty('title', $this->arResult['testInfo']['NAME']);

                    $this->arResult['countQuestions'] = $testEntity->getQuestionEntity()->getCount();
                } else {
                    CHTTP::SetStatus("404 Not Found");
                    @define("ERROR_404", "Y");
                }
            } else {
                CHTTP::SetStatus("404 Not Found");
                @define("ERROR_404", "Y");
            }
        } else {
            CHTTP::SetStatus("404 Not Found");
            @define("ERROR_404", "Y");
        }
    }

    public function executeComponent()
    {
        try {
            \Bitrix\Main\Loader::includeModule('iblock');
            parent::executeComponent();
            $this->getResult();

            $this->includeComponentTemplate();
        } catch (\Exception $exception) {
            ShowError($exception->getMessage());
        }
    }
}