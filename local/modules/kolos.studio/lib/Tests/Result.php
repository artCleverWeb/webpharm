<?php

namespace Kolos\Studio\Tests;

use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\Type\DateTime;

class Result
{
    private const IBLOCK_ID = IBLOCK_ID_COURSES_RESULTS;
    protected $testId = 0;
    protected $userId = 0;

    function __construct(int $testId, int $userId)
    {
        $this->testId = $testId;
        $this->userId = $userId;
    }

    public function getUserResults(): array
    {
        return [];
    }

    public function setUserAnswer(int $question, int $answer): bool
    {
        return false;
    }

    public function startTest(): int
    {
        $resultId = 0;

        $questionEntity = \Bitrix\Iblock\Model\Section::compileEntityByIblock(self::IBLOCK_ID);

        $resultId = $questionEntity::getRow([
                'filter' => [
                    'ACTIVE' => 'Y',
                    'UF_TEST' => $this->testId,
                    'UF_USER' => $this->userId,
                ],
                'select' => ['ID']
            ])['ID'] ?? 0;

        if ($resultId < 1) {
            $resultAdd = $questionEntity::add(
                [
                    'ACTIVE' => 'Y',
                    'UF_TEST' => $this->testId,
                    'UF_USER' => $this->userId,
                    'NAME' => "Тест #" . $this->testId . " пользователя " . $this->userId,
                    'IBLOCK_ID' => self::IBLOCK_ID,
                    'TIMESTAMP_X' => DateTime::createFromTimestamp(time()),
                ]
            );

            if ($resultAdd->isSuccess()) {
                $resultId = $resultAdd->getId();
            }
        }

        return $resultId;
    }

    public function saveAnswer(int $questionId, int $answerId): array
    {
        if ($questionId < 1 || $answerId < 1) {
            return [
                'status' => false,
                'error' => 'Не переданы значения идентификатора вопроса или ответа',
            ];
        }

        if ($this->userId < 1) {
            return [
                'status' => false,
                'error' => 'Пользователь не авторизован',
            ];
        }

        if ($this->testId < 1) {
            return [
                'status' => false,
                'error' => 'Не передан идентификатор теста',
            ];
        }

        $sectionId = $this->startTest();

        if ($sectionId < 1) {
            return [
                'status' => false,
                'error' => 'Не удалось сохранить результат тестирования. Код: 001',
            ];
        }

        $entityClass = new \CIBlockElement();

        $resultAdd = $entityClass->Add([
            'IBLOCK_ID' => self::IBLOCK_ID,
            'IBLOCK_SECTION_ID' => $sectionId,
            'IBLOCK_SECTION' => [$sectionId],
            'NAME' => "Ответ на вопрос #" . $questionId . " пользователя " . $this->userId,
            'PROPERTY_VALUES' => [
                'QUESTION' => $questionId,
                'ANSWER' => $answerId,
            ]
        ]);

        if ($resultAdd > 0) {
            $isFinish = $this->isFinish();

            if ($isFinish === true) {
                //TODO: Рассчитать результат теста
            }

            return [
                'status' => true,
                'isFinish' => $isFinish,
            ];
        }

        return [
            'status' => false,
            'error' => 'Не удалось сохранить результат тестирования. Код: 002',
            'errors' => $resultAdd->LAST_ERROR,
        ];
    }

    public function getIdsApplyQuestions(): array
    {
        $questionEntity = \Bitrix\Iblock\Model\Section::compileEntityByIblock(self::IBLOCK_ID);

        $resultId = $questionEntity::getRow([
                'filter' => [
                    'ACTIVE' => 'Y',
                    'UF_TEST' => $this->testId,
                    'UF_USER' => $this->userId,
                ],
                'select' => ['ID']
            ])['ID'] ?? 0;

        if ($resultId < 1) {
            return [];
        }

        $entityClass = \Bitrix\Iblock\Iblock::wakeUp(self::IBLOCK_ID)->getEntityDataClass();
        $answer = $entityClass::getList([
                'filter' => [
                    'IBLOCK_SECTION_ID' => $resultId,
                ],
                'select' => [
                    'QUESTION',
                ],
            ])->fetchAll() ?? [];

        return array_unique(
                array_column($answer, 'IBLOCK_ELEMENTS_ELEMENT_CORPORATE_TESTS_RESULTS_QUESTION_IBLOCK_GENERIC_VALUE')
            ) ?? [];
    }

    public function getCount(): int
    {
        $questionEntity = \Bitrix\Iblock\Model\Section::compileEntityByIblock(self::IBLOCK_ID);

        $resultId = $questionEntity::getRow([
                'filter' => [
                    'ACTIVE' => 'Y',
                    'UF_TEST' => $this->testId,
                    'UF_USER' => $this->userId,
                ],
                'select' => ['ID']
            ])['ID'] ?? 0;

        if ($resultId < 1) {
            return 0;
        }

        $entityClass = \Bitrix\Iblock\Iblock::wakeUp(self::IBLOCK_ID)->getEntityDataClass();
        $answer = $entityClass::getList([
                'filter' => [
                    'IBLOCK_SECTION_ID' => $resultId,
                ],
                'select' => [
                    'QUESTION',
                ],
            ])->fetchAll() ?? [];

        return count(
                array_unique(
                    array_column(
                        $answer,
                        'IBLOCK_ELEMENTS_ELEMENT_CORPORATE_TESTS_RESULTS_QUESTION_IBLOCK_GENERIC_VALUE'
                    )
                )
            ) ?? 0;
    }

    public function getAnswers(): array
    {
        $questionEntity = \Bitrix\Iblock\Model\Section::compileEntityByIblock(self::IBLOCK_ID);

        $resultId = $questionEntity::getRow([
                'filter' => [
                    'ACTIVE' => 'Y',
                    'UF_TEST' => $this->testId,
                    'UF_USER' => $this->userId,
                ],
                'select' => ['ID']
            ])['ID'] ?? 0;

        if ($resultId < 1) {
            return [];
        }

        $entityClass = \Bitrix\Iblock\Iblock::wakeUp(self::IBLOCK_ID)->getEntityDataClass();
        $answerObj = $entityClass::getList([
                'filter' => [
                    'IBLOCK_SECTION_ID' => $resultId,
                ],
                'select' => [
                    'QUESTION',
                    'ANSWER',
                ],
            ])->fetchAll() ?? [];

        $answer = [];
        foreach ($answerObj as $item) {
            $answer[$item['IBLOCK_ELEMENTS_ELEMENT_CORPORATE_TESTS_RESULTS_QUESTION_IBLOCK_GENERIC_VALUE']] =
                $item['IBLOCK_ELEMENTS_ELEMENT_CORPORATE_TESTS_RESULTS_ANSWER_IBLOCK_GENERIC_VALUE'];
        }

        return $answer ?? [];
    }

    private function isFinish(): bool
    {
        $testEntity = new Test;
        if ($testEntity->setTestId($this->testId) === true) {
            return $testEntity->isFinish();
        }

        return false;
    }
}
