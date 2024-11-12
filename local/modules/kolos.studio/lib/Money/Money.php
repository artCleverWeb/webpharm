<?php

namespace Kolos\Studio\Money;

use Kolos\Studio\Helpers\HighloadBlock;

class Money
{
    private int $userId;
    private int $entityId;
    private int $entityType;
    private int $directionType;
    private int $taxType;

    private $entity = false;

    public const entityCourse = 5; //ИБ “Курсы”
    public const entityEvent = 6; //ИБ “События”
    public const directionCredit = 3; // Направление Начисление
    public const directionDebit = 4; // Направление Списание
    public const taxRouble = 1; //Валюта рубли
    public const taxPoints = 2; //Валюта баллы

    public function setEntityType(int $typeId): void
    {
        if ($typeId != self::entityEvent && $typeId != self::entityCourse) {
            throw new \ErrorException("Не верный тип сущности1");
        }

        $this->entityType = $typeId;
    }

    public function setDirectionType(int $typeId): void
    {
        if ($typeId != self::directionCredit && $typeId != self::directionDebit) {
            throw new \ErrorException("Не верный тип направления");
        }

        $this->directionType = $typeId;
    }

    public function setTaxType(int $typeId): void
    {
        if ($typeId != self::taxRouble && $typeId != self::taxPoints) {
            throw new \ErrorException("Не верный тип валюты");
        }

        $this->taxType = $typeId;
    }

    public function setEntityId(int $id): void
    {
        $this->entityId = $id;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function store(float $amount, string $comment = ''): bool
    {
        if ($amount == 0) {
            return false;
        }

        if ($this->directionType < 1) {
            throw new \ErrorException("Не верный направление");
        }

        if ($this->directionType == self::directionCredit) {
            if ($this->entityId < 1) {
                throw new \ErrorException("Не верный идентификатор сущности");
            }

            if ($this->entityType < 1) {
                throw new \ErrorException("Не верный идентификатор типа сущности");
            }
        }

        if ($this->taxType < 1) {
            throw new \ErrorException("Не верный идентификатор типа валюты");
        }

        if ($this->userId < 0) {
            throw new \ErrorException("Не верный идентификатор пользователя");
        }

        if ($this->directionType == self::directionCredit) {
            $alreadyDo = $this->getCount() > 0;

            if ($alreadyDo === true) {
                return false;
            }
        }

        if ($this->directionType == self::directionDebit) {
            $allCredit = $this->getEntity()->find([
                'filter' => [
                    'UF_USER_ID' => $this->userId,
                    'UF_TAX' => $this->taxType,
                ],
            ]);

            if (count($allCredit) < 1) {
                throw new ErrorException("Не найдено начислений пользователя");
            }

            $allSumm = array_sum(array_column($allCredit['UF_DENIMINATION']));

            if ($allSumm < $amount) {
                throw new \ErrorException(
                    "Баланс пользователя меньше запрашиваемого значения. Баланс пользователя: " . $allSumm
                );
            }
        }

        return $this->getEntity()->add([
                'UF_DATE' => \ConvertTimeStamp(false, 'FULL'),
                'UF_ENTYTI_ID' => $this->entityId,
                'UF_TYPE' => $this->entityType,
                'UF_DIRECTION' => $this->directionType,
                'UF_TAX' => $this->taxType,
                'UF_DENIMINATION' => $amount,
                'UF_USER_ID' => $this->userId,
                'UF_DESCRIPTION' => $comment,
            ]) > 0;
    }

    public function getCount(bool $includeUserId = true): int
    {
        $filter = [
            'UF_ENTYTI_ID' => $this->entityId,
            'UF_TYPE' => $this->entityType,
            'UF_TAX' => $this->taxType,
        ];

        if($includeUserId === true){
            $filter['UF_USER_ID'] = $this->userId;
        }
        
        return $this->getEntity()->getCountRow($filter) ?? 0;
    }

    private function getEntity()
    {
        if (defined('HL_TABLE_TESTS_ACCRUALS')) {
            if ($this->entity instanceof HighloadBlock === false) {
                $this->entity = new HighloadBlock(HL_TABLE_TESTS_ACCRUALS);
            }
        }

        return $this->entity;
    }
}
