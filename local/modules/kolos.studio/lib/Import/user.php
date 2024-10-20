<?php

namespace Kolos\Studio\Import;

use Bitrix\Iblock\ElementTable;
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
    private array $arPharmacy = [];
    private array $pharmacyChain = [];
    
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
                
                $this->getPharmacy();
                $this->getRegions();
                $this->getPharmacyChain();
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

        unset($regions);
    }

    private function getPharmacy(): void
    {
        $items = ElementTable::getList([
            'filter' => [
                'IBLOCK_ID' => IBLOCK_ID_NUM_CITIES,
                '!XML_ID' => false
            ],
            'select' => [
                'ID',
                'IBLOCK_ID',
                'NAME',
                'XML_ID',
            ],
        ])->fetchAll();

        foreach ($items as $item){
            $code = mb_strtolower(trim($item['XML_ID']), 'UTF-8');
            $this->arPharmacy[$code] = $item['ID'];
        }

        unset($items);
    }
    
    private function getPharmacyChain(): void
    {
        $pharmacyChainEntity = new HighloadBlock(HL_TABLE_PHARMACY_CHAIN);
        $items = $pharmacyChainEntity->find([
            'filter' => [
                '!UF_XML_ID' => false,
            ],
            'select' => [
                'ID',
                'UF_XML_ID',
            ],
        ]);

        foreach ($items as $item){
            $code = mb_strtolower(trim($item['XML_ID']), 'UTF-8');
            $this->pharmacyChain[$code] = $item['ID'];
        }

        unset($items);
    }

    private function checkSettings(): bool
    {
        if (!defined('IBLOCK_ID_NUM_CITIES') || IBLOCK_ID_NUM_CITIES < 1) {
            $this->error[] = 'Не задана константа с ID ИБ Городов';
            return false;
        }

        if(!defined('HL_TABLE_PHARMACY_CHAIN') || strlen(HL_TABLE_PHARMACY_CHAIN) < 0){
            $this->error[] = 'Не задана константа с ID HL Табельные номера: Аптечная сеть';
            return false;
        }

        return true;
    }
}
