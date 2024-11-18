<?php

namespace Kolos\Studio\Helpers;

class Notification
{
    public static function getCountUnread(int $userId): int
    {
        if (($entityClass = self::getEntity()) !== false) {
            return $entityClass->getCountRow([
                'UF_USER_ID' => $userId,
                'UF_IS_READ' => 0,
            ]);
        }

        return 0;
    }

    public static function getList(int $userId, int $count = 30): array
    {
        if (($entityClass = self::getEntity()) !== false) {
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

    public static function markAsRead(int $userId, int $entityId): void
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

        $itemId = self::getEntity()->getRow([
                'filter' => [
                    'UF_ENTITY_ID' => $entityId,
                    'UF_USER_ID' => $userId,
                ],
                'select' => [
                    'ID',
                ]
            ])['ID'] ?? 0;

        if ($itemId > 0) {
            self::getEntity()->update($itemId, ['UF_IS_READ' => 1]);
        }
    }

    private static function getEntity()
    {
        if (defined('HL_TABLE_NOTIFICAION') && !is_null(HL_TABLE_NOTIFICAION)) {
            return new HighloadBlock(HL_TABLE_NOTIFICAION);
        }

        return false;
    }
}
