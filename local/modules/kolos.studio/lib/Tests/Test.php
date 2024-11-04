<?php

namespace Kolos\Studio\Tests;

class Test
{
    private int $testId;
    private const IBLOCK_ID = IBLOCK_ID_COURSES_TEST;
    private $questionEntity;
    private $resultEntity;


    public function getQuestionEntity(): Question
    {
        if ($this->questionEntity instanceof Question === false) {
            $this->questionEntity = new Question($this->testId);
        }

        return $this->questionEntity;
    }

    public function getResultEntity(): Result
    {
        if ($this->resultEntity instanceof Result === false) {
            $this->resultEntity = new Result($this->testId, user_id());
        }

        return $this->resultEntity;
    }

    public function setTestId(int $testId): bool
    {
        $this->testId = \Bitrix\Iblock\SectionTable::getRow([
                'filter' => [
                    'ACTIVE' => 'Y',
                    'ID' => $testId,
                    'IBLOCK_ID' => self::IBLOCK_ID,
                    'DEPTH_LEVEL' => 1,
                ],
                'select' => [
                    'ID',
                ],
                'cache' => [
                    'ttl' => 3600,
                    'cache_joins' => true
                ],
            ])['ID'] ?? 0;

        return $this->testId > 0;
    }

    public function setTestIdByCode(string $code): bool
    {
        $this->testId = \Bitrix\Iblock\SectionTable::getRow([
                'filter' => [
                    'ACTIVE' => 'Y',
                    'CODE' => $code,
                    'IBLOCK_ID' => self::IBLOCK_ID,
                    'DEPTH_LEVEL' => 1,
                ],
                'select' => [
                    'ID',
                ],
                'cache' => [
                    'ttl' => 3600,
                    'cache_joins' => true
                ],
            ])['ID'] ?? 0;

        return $this->testId > 0;
    }

    public function isFinish(): bool
    {
        $allCount = $this->getQuestionEntity()->getCount();
        $userCount = $this->getResultEntity()->getCount();

        return $allCount <= $userCount;
    }

    public function getInfo()
    {
        $testEntity = \Bitrix\Iblock\Model\Section::compileEntityByIblock(self::IBLOCK_ID);

        return $testEntity::getRow([
                'filter' => [
                    'ACTIVE' => 'Y',
                    'ID' => $this->testId,
                    'IBLOCK_ID' => self::IBLOCK_ID,
                    'DEPTH_LEVEL' => 1,
                ],
                'select' => [
                    'NAME',
                    'ID',
                    'UF_COMPLETED_SCORE',
                ],
                'cache' => [
                    'ttl' => 3600,
                    'cache_joins' => true
                ],
            ]) ?? [];
    }
}