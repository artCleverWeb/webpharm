<?php

namespace Kolos\Studio\Helpers;

class Notification
{
    public static function getCountUnread(int $userId): int
    {
        if(($entityClass = self::getEntity()) !== false){
            return $entityClass->getCountRow([
                'UF_USER_ID' => $userId,
                'UF_IS_READ' => 0,
            ]);
        }

        return 0;
    }

    public static function getList(int $userId, int $count = 30): array
    {
        if(($entityClass = self::getEntity()) !== false){
            return $entityClass->find([
                'filter' => [
                        'UF_USER_ID' => $userId,
                    ],
                'limit' => $count,
                'order' => [
                    'UF_IS_READ' => 'asc',
                    'UF_DATE_ADD' => 'desc',
                ],
                'select' => [
                    'noticeId' => 'ID',
                    'fullText' => 'UF_TEXT',
                    'isRead' => 'UF_IS_READ',
                    'descr' => 'UF_DESCRIPION',
                    'link' => 'UF_LINK',
                ],
            ]);
        }

        return [];
    }

    private static function getEntity()
    {
        if(defined('HL_TABLE_NOTIFICAION') && !is_null(HL_TABLE_NOTIFICAION)){
            return new HighloadBlock(HL_TABLE_NOTIFICAION);
        }
        
        return false;
    }
}
