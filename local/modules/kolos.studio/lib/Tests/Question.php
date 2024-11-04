<?php

namespace Kolos\Studio\Tests;


use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\SectionTable;

class Question
{
    private const IBLOCK_ID = IBLOCK_ID_COURSES_TEST;
    private int $testId = 0;
    private int $userId = 0;

   // private $resultEntity;

    public function __construct(int $testId, $userId = 0)
    {
        $this->testId = $testId;

        if ($userId == 0) {
            $this->userId = user_id();
        }
    }

    public function getAllQuestion($isCorrect = true): array
    {
        if (is_authorized() == false) {
            return [
                'error' => "Пользователь не авторизован",
            ];
        }

        if ($this->testId < 1) {
            return [
                'error' => "Не выбран тест",
            ];
        }

        $questions = SectionTable::getList([
                'filter' => [
                    'IBLOCK_ID' => self::IBLOCK_ID,
                    'DEPTH_LEVEL' => 2,
                    'ACTIVE' => 'Y',
                    'IBLOCK_SECTION_ID' => $this->testId,
                ],
                'select' => [
                    'ID',
                    'NAME',
                ],
                'order' => [
                    'SORT' => 'ASC',
                    'ID' => 'DESC',
                ],
                'cache' => [
                    'ttl' => 3600,
                    'cache_joins' => true
                ],
            ])->fetchAll() ?? [];

        $questionsIds = array_column($questions, 'ID');

        if (!isset($questionsIds)) {
            return [];
        }

        $entityClass = \Bitrix\Iblock\Iblock::wakeUp(self::IBLOCK_ID)->getEntityDataClass();
        $answerObj = $entityClass::getList([
                'filter' => [
                    'IBLOCK_SECTION_ID' => $questionsIds,
                ],
                'select' => [
                    'ID',
                    'NAME',
                    'CORRECT',
                    'IBLOCK_SECTION_ID',
                ],
                'cache' => [
                    'ttl' => 3600,
                    'cache_joins' => true
                ],
            ])->fetchAll() ?? [];

        foreach($answerObj as $item)
        {
            if($isCorrect === true && $item['IBLOCK_ELEMENTS_ELEMENT_CORPORATE_TESTS_CORRECT_ID'] < 1){
                continue;
            }

            $answer[$item['IBLOCK_SECTION_ID']][] = [
                'ID' => $item['ID'],
                'NAME' => $item['NAME'],
                'IS_CORRECT' => $item['IBLOCK_ELEMENTS_ELEMENT_CORPORATE_TESTS_CORRECT_ID'] > 0,
            ];
        }

        return [
            'questions' => $questions,
            'answers' => $answer,
        ];
    }

    public function getNextQuestion(): array
    {
        if (is_authorized() == false) {
            return [
                'error' => "Пользователь не авторизован",
            ];
        }

        if ($this->testId < 1) {
            return [
                'error' => "Не выбран тест",
            ];
        }

        $answeredIds = $this->getResultEntitty()->getIdsApplyQuestions();

        $question = SectionTable::getRow([
                'filter' => [
                    'IBLOCK_ID' => self::IBLOCK_ID,
                    'DEPTH_LEVEL' => 2,
                    'ACTIVE' => 'Y',
                    'IBLOCK_SECTION_ID' => $this->testId,
                    "!ID" => $answeredIds,
                ],
                'select' => [
                    'ID',
                    'NAME',
                ],
                'order' => [
                    'SORT' => 'ASC',
                    'ID' => 'DESC',
                ],
            ]) ?? [];

        if (!isset($question['ID'])) {
            return [];
        }

        $answers = ElementTable::getList([
            'filter' => [
                'IBLOCK_ID' => self::IBLOCK_ID,
                'ACTIVE' => 'Y',
                'IBLOCK_SECTION_ID' => $question['ID'],
            ],
            'select' => [
                'ID',
                'NAME',
            ]
        ])->fetchAll();

        shuffle($answers);
        $question['list'] = $answers;
        $question['numQuestion'] = count($answeredIds) + 1;

        return $question;
    }

    public function getCount(): int
    {
        if ($this->testId < 1) {
            return 0;
        }

        return \Bitrix\Iblock\SectionTable::getCount([
                'IBLOCK_ID' => self::IBLOCK_ID,
                'DEPTH_LEVEL' => 2,
                'ACTIVE' => 'Y',
                'IBLOCK_SECTION_ID' => $this->testId,
            ]) ?? 0;
    }

    private function getResultEntitty(): Result
    {
        if ($this->resultEntity instanceof Result === false) {
            $this->resultEntity = new Result($this->testId, $this->userId);
        }

        return $this->resultEntity;
    }
}
