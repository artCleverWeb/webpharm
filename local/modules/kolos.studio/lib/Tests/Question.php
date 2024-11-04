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
        $question = SectionTable::getRow([
                'filter' => [
                    'IBLOCK_ID' => self::IBLOCK_ID,
                    'DEPTH_LEVEL' => 2,
                    'ACTIVE' => 'Y',
                    'IBLOCK_SECTION_ID' => $this->testId,
                    "!ID" => $this->getResultEntitty()->getIdsApplyQuestions(),
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
