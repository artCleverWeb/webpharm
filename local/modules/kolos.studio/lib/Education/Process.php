<?php

namespace Kolos\Studio\Education;

use Bitrix\Iblock\ElementTable;
use Kolos\Studio\Helpers\HighloadBlock;

class Process
{
    private $entity = false;

    private int $userId;

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function finish(int $entityId, bool $finishTest = false): bool
    {
        if ($this->userId < 1) {
            throw new \ErrorException(
                "Не передан идентификатор пользователя"
            );
        }

        if ($entityId < 1) {
            throw new \ErrorException(
                "Не передан идентификатор объекта"
            );
        }

        if ($finishTest === false) {
            $finishTest = $this->hasTest($entityId);
        }

        $resultId = $this->getEntity()->getCountRow([
                'UF_USER_ID' => $this->userId,
                'UF_ENTITY_ID' => $entityId,
            ]) ?? 0;

        if ($resultId > 0) {
            $addData = [
                'UF_USER_ID' => $this->userId,
                'UF_ENTITY_ID' => $entityId,
                'UF_DESCR' => "Прохождение пользователем #{$this->userId} программы обучения #$entityId",
            ];

            if ($finishTest === true) {
                $addData['UF_DATE_FINISH'] = ConvertDateTime(time(), "FULL");
            }

            return $this->getEntity()->add($addData) > 0;
        } else {
            if ($finishTest === true) {
                return $this->getEntity()->update($resultId,
                        [
                            'UF_DATE_FINISH' => ConvertDateTime(time(), "FULL"),
                        ]
                    ) > 0;
            }
        }

        return true;
    }

    private function hasTest(int $entityId): bool
    {
        $iblockId = ElementTable::getRow([
                'filter' => [
                    'ID' => $entityId,
                ],
                'select' => [
                    'ID',
                    'IBLOCK_ID',
                ],
                'cache' => [
                    'ttl' => 360000,
                    'cache_joins' => true
                ],
            ])['IBLOCK_ID'] ?? 0;

        if ($iblockId < 1) {
            return false;
        }

        $entityClass = \Bitrix\Iblock\Iblock::wakeUp($iblockId)->getEntityDataClass();
        $testId = $entityClass::getRow([
                'filter' => [
                    'ID' => $entityId,
                ],
                'select' => [
                    'ID',
                    'TEST_' => 'TEST',
                ],
            ])['TEST_IBLOCK_GENERIC_VALUE'] ?? 0;

        return $testId > 0;
    }

    private function getEntity()
    {
        if (defined('HL_TABLE_USER_PROCESS_EDUCATION')) {
            if ($this->entity instanceof HighloadBlock === false) {
                $this->entity = new HighloadBlock(HL_TABLE_USER_PROCESS_EDUCATION);
            }
        }

        return $this->entity;
    }
}
