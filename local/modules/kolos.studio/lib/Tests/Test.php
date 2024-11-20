<?php

namespace Kolos\Studio\Tests;

use Bitrix\Iblock\ElementPropertyTable;
use Bitrix\Iblock\PropertyTable;

class Test
{
    private int $testId;
    private const IBLOCK_ID = IBLOCK_ID_COURSES_TEST;
    private $questionEntity;
    private $resultEntity;

    public function retryTest(): bool
    {
        return $this->getResultEntity()->deactivate();
    }

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
                    'UF_POINTS',
                    'UF_COUNT_PEOPLE',
                    'UF_MONEY',
                ],
                'cache' => [
                    'ttl' => 3600,
                    'cache_joins' => true
                ],
            ]) ?? [];
    }

    public function getParent(): array
    {
        $parentInfo = \Bitrix\Iblock\ElementTable::getRow([
            'filter' => [
                'PROPERTY.CODE' => 'TEST',
                'PROPERTY_VALUE.VALUE' => $this->testId,
            ],
            'select' => [
                'ID',
                'IBLOCK_ID',
                'CODE',
                'IBLOCK_PROPERTY_ID' => 'PROPERTY_VALUE.IBLOCK_PROPERTY_ID',
                'IBLOCK_SECTION_ID',
                'DETAIL_PAGE_URL' => 'IBLOCK.DETAIL_PAGE_URL',
            ],
            'runtime' => [
                new \Bitrix\Main\ORM\Fields\Relations\Reference(
                    'PROPERTY_VALUE',
                    \Bitrix\Iblock\ElementPropertyTable::class,
                    \Bitrix\Main\Entity\Query\Join::on('this.ID', 'ref.IBLOCK_ELEMENT_ID')
                ),
                new \Bitrix\Main\ORM\Fields\Relations\Reference(
                    'PROPERTY',
                    \Bitrix\Iblock\PropertyTable::class,
                    \Bitrix\Main\Entity\Query\Join::on('ref.ID', 'this.IBLOCK_PROPERTY_ID')
                )
            ],
            'cache' => [
                'ttl' => 360000,
                'cache_joins' => true
            ],
        ]);


        if (count($parentInfo) > 0) {
            $parentInfo['DETAIL_PAGE_URL'] = \CIBlock::ReplaceDetailUrl(
                $parentInfo['DETAIL_PAGE_URL'],
                $parentInfo,
                false,
                'E'
            );

            return $parentInfo;
        }

        return [];
    }
}
