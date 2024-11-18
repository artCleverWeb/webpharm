<?php

namespace Kolos\Studio\Users;

use google\protobuf\DescriptorProto;
use Kolos\Studio\Helpers\HighloadBlock;

class Employee
{

    public static function getByFio(string $fio): int
    {
        if (strlen($fio) < 2) {
            return 0;
        }

        return self::getEntity()->getRow([
                'filter' => [
                    'UF_NAME' => $fio,
                    'UF_ACTIVE' => 1
                ],
                'select' => [
                    'ID',
                ],
            ])['ID'] ?? 0;
    }

    public static function store(int $userId, int $entityId): void
    {
        if ($userId < 1) {
            throw new \ErrorException(
                "Не передан идентификатор пользователя"
            );
        }

        if ($entityId < 1) {
            throw new \ErrorException(
                "Не передан идентификатор объекта"
            );
        }

        $row = self::getEntity()->getRow([
            'filter' => [
                'ID' => $entityId,
            ]
        ]);

        if (count($row) < 1) {
            throw new \ErrorException(
                "Запись в табельных номерах не найдена"
            );
        }

        $fio = explode(" ", $row['UF_NAME']);

        $arSave = [
            'ACTIVE' => $row['UF_ACTIVE'] == 1 ? 'Y' : 'N',
            'LAST_NAME' => $fio[0] ?? '',
            'NAME' => $fio[1] ?? '',
            'SECOND_NAME' => $fio[2] ?? '',
            'UF_SNILS' => $row['UF_SNILS'],
            'UF_DATE_REGISTRATION' => $row['UF_DATE_REGISTRATION'],
            'UF_NUMBER' => $row['UF_XML_ID'],
            'UF_APTECKA' => $row['UF_PAHRM_NUMBER'],
            'UF_BRAND' => $row['UF_BRAND'],
            'UF_COMPANY2' => $row['UF_COMPANY'],
            'UF_PHARM_ADDRESS' => $row['UF_PHARM_ADDRESS'],
            'UF_JOB_TITLE' => $row['UF_JOB_TITLE'],
            'UF_CODE_DEPARTMENT' => $row['UF_CODE_DEPARTMENT'],
            'UF_DEPARTMENT_TYPE' => $row['UF_DEPARTMENT_TYPE'],
            'UF_APTECKA_OBJ' => $row['UF_APTECKA_OBJ'],
            'UF_STATE' => $row['UF_STATE'],
            'UF_PHARM_EMAIL' => $row['UF_PHARM_EMAIL'],
            'UF_BUSSINES_MESURE' => $row['UF_BUSSINES_MESURE'],
            'UF_SCHEDULE' => $row['UF_SCHEDULE'],
        ];

        $cUser = new \CUser();

        $cUser->Update($userId, $arSave);

        if ($row['UF_USER_ID'] < 1) {
            self::getEntity()->update($row['ID'], ['UF_USER_ID' => $userId]);
        }
    }

    private static function getEntity()
    {
        if (defined('HL_TABLE_USERS') && !is_null(HL_TABLE_USERS)) {
            return new HighloadBlock(HL_TABLE_USERS);
        }

        return false;
    }
}
