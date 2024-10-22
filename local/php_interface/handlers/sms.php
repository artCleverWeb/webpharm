<?php

use Kolos\Studio\Helpers\HighloadBlock;

function beforeSmsSend(string $phone): bool
{
    if (defined('HL_TABLE_SMS_LOGS') && strlen(HL_TABLE_SMS_LOGS) > 0) {
        $phone = phone_int($phone);
        $logsEntity = new HighloadBlock(HL_TABLE_SMS_LOGS);

        $count = $logsEntity->getCountRow(
            [
                'UF_PHONE' => $phone,
                'UF_DATE' => date('d.m.Y H:i:s', strtotime("-1 minutes")),
            ]
        );

        if ($count >= 3) {
            return false;
        }

        $count = $logsEntity->getCountRow(
            [
                'UF_PHONE' => $phone,
                'UF_DATE' => date('d.m.Y H:i:s', strtotime("-1 day")),
            ]
        );

        if ($count >= 3) {
            return false;
        }
    }

    return true;
}

function afterSmsSend(string $phone, string $message): void
{
    if (defined('HL_TABLE_SMS_LOGS') && strlen(HL_TABLE_SMS_LOGS) > 0) {
        $logsEntity = new HighloadBlock(HL_TABLE_SMS_LOGS);
        $phone = phone_int($phone);
        $ip = get_ip();

        $logsEntity->add([
            'UF_IP' => $ip ?? '',
            'UF_PHONE' => $phone,
            'UF_TEXT' => $message,
        ]);
    }
}

