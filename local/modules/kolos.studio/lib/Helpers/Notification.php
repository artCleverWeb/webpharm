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
    
    private static function getEntity()
    {
        if(defined('HL_TABLE_NOTIFICAION') && !is_null(HL_TABLE_NOTIFICAION)){
            return new HighloadBlock(HL_TABLE_NOTIFICAION);
        }
        
        return false;
    }
}
