<?php

namespace Kolos\Studio\Import;

use Bitrix\Iblock\SectionTable;
use Bitrix\Main\Loader;
use Kolos\Studio\Helpers\HighloadBlock;

class User
{
    private string $fileName = '';

    private string $HL_TABLE_NAME = '';
    private HighloadBlock $storeEntity;

    private array $data = [];
    private array $regions = [];

    private array $error = [];

    function __construct(string $file, string $tableName)
    {
        $this->HL_TABLE_NAME = $tableName;
        $this->storeEntity = new HighloadBlock($tableName);

        Loader::includeModule('iblock');
    }

    public function process(): void
    {
        if ($this->checkSettings() === true) {
            if ($this->readFile() !== false && count($this->data) > 0) {
                $this->copyFile();
            }
        }
    }

    private function readFile(): bool
    {
        if (($handle = fopen($this->file, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ";", '"')) !== false) {
                foreach ($data as &$v) {
                    $v = iconv('windows-1251', 'utf-8', $v);
                    $v = str_replace(";", " ", $v);
                    $v = str_replace(['"', "\n", "\r", "\t"], '', $v);
                    $v = preg_replace('/\s+/', ' ', $v);
                }
                $this->data[] = $data;
            }
            fclose($handle);

            return true;
        }

        return false;
    }

    private function copyFile(): void
    {
        $arPath = pathinfo($this->file);
        $new_file = $arPath['dirname'] . '/' . $arPath['filename'] . '_' . date('Y-m-d') . '.' . $arPath['extension'];

        if (!file_exists($new_file)) {
            copy($this->file, $new_file);
        }
    }

    private function getRegions(): void
    {
        $regions = SectionTable::getList([
            'filter' => [
                'IBLOCK_ID' => IBLOCK_ID_NUM_CITIES,
                '!XML_ID' => false,
            ],
            'select' => [
                'ID',
                'IBLOCK_ID',
                'IBLOCK_SECTION_ID',
                'NAME',
                'XML_ID',
                'DEPTH_LEVEL',
            ]
        ])->fetchAll();

        foreach ($regions as $region){
            $code = mb_strtolower(trim($region['XML_ID']), 'UTF-8');
            $this->regions[$code] = $region['ID'];
        }
    }

    private function checkSettings(): bool
    {
        if (!defined('IBLOCK_ID_NUM_CITIES') || IBLOCK_ID_NUM_CITIES < 1) {
            $this->error[] = 'Не задана константа с ID ИБ Городов';
            return false;
        }

        return true;
    }
}
