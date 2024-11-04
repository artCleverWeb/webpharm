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

    public function startTest():void
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

        if($resultId < 1){
            $r = $questionEntity::add(
                [
                    'ACTIVE' => 'Y',
                    'UF_TEST' => $this->testId,
                    'UF_USER' => $this->userId,
                    'NAME' => "Тест #" . $this->testId . " пользователя " .  $this->userId,
                    'IBLOCK_ID' => self::IBLOCK_ID,
                    'TIMESTAMP_X' => DateTime::createFromTimestamp(time()),
                ]
            );
            var_dump($r->getErrorMessages());
            die();
        }
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
        $answer =  $entityClass::getList([
            'filter' => [
                'IBLOCK_SECTION_ID' => $resultId,
            ],
            'select' => [
                'ID',
                'QUESTION',
            ],
        ])->fetchAll();
        //print_r($answer);
        return [];
    }
}
