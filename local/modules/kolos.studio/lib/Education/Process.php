<?php

namespace Kolos\Studio\Education;

use Kolos\Studio\Helpers\HighloadBlock;

class Process
{
    private $entity = false;

    private int $userId;

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function finish(int $entityId): bool
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

        $needAdd = $this->getEntity()->getCountRow([
            'UF_USER_ID' => $this->userId,
            'UF_ENTITY_ID' => $entityId,
        ]) > 0;

        if($needAdd === true){
            $isAdd = $this->getEntity()->add([
                    'UF_USER_ID' => $this->userId,
                    'UF_ENTITY_ID' => $entityId,
                    'UF_DESCR' => "Прохождение пользователем #{$this->userId} программы обучения #$entityId",
                ]) > 0;

            return $isAdd;
        }

        return true;
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
