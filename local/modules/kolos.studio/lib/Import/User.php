<?php

namespace Kolos\Studio\Import;

use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\Loader;
use Bitrix\Main\Type\DateTime;
use Bitrix\Main\UserTable;
use Kolos\Studio\Helpers\HighloadBlock;

class User
{
    private string $file = '';

    private string $HL_TABLE_NAME = '';
    private HighloadBlock $storeEntity;

    private array $data = [];
    private array $regions = [];
    private array $arPharmacy = [];
    private array $pharmacyChain = [];
    private array $users = [];
    private array $employee = [];

    private array $error = [];

    function __construct(string $file, string $tableName)
    {
        $this->file = $_SERVER['DOCUMENT_ROOT'] . $file;
        $this->HL_TABLE_NAME = $tableName;
        $this->storeEntity = new HighloadBlock($tableName);

        Loader::includeModule('iblock');
    }

    public function import(): void
    {
        $this->process();
        $this->processUser();
    }

    public function processUser(): void
    {

    }

    public function process(): void
    {
        if ($this->checkSettings() === true) {
            if ($this->readFile() !== false && count($this->data) > 0) {
                $this->copyFile();

                $this->getPharmacy();
                $this->getRegions();
                $this->getPharmacyChain();
                $this->getUsers();
                $this->getEmployee();
                $this->store();
            }
        }
    }

    private function store(): void
    {
        foreach ($this->data as $key => $arItem) {
            $TAB_NUM = trim($arItem[0]);

            if (strlen($TAB_NUM) <= 0 || $TAB_NUM == 'б/н') {
                continue;
            }

            $city = trim($arItem[5]);
            $region = trim($arItem[6]);
            $company = trim($arItem[7]);
            $pharmacy = mb_strtolower(trim($arItem[3]));
            $apt_number = trim($arItem[2]) ?? 0;
            $snils = preg_replace('/[^0-9]/', '', $arItem[13]);
            $sMainWork = (trim($arItem[14]) == "Да" || trim($arItem[14]) == "да") ? "Y" : "";


            $nFieldBrand = 16;
            $nFieldAptEmail = 17;
            $nFieldBizEd = 18;
            $nFiledWorkTime = 19;
            $nFieldRegDate = 20;

            $city_id = $this->storeRegion($city, $region);
            $pharmacy_id = $this->storePharmacy($pharmacy, $city_id);
            $company_id = $this->storePharmacyChain($company);

            if ($company_id == 18086665) {// АВТОРА 2000
                $sTabNumTmp = "AVR" . $TAB_NUM;
            } elseif ($company_id == 16006900) {// ООО Самсон-Фарма
                $sTabNumTmp = CUtil::translit(substr($arItem[1], 0, 1), "ru") . $TAB_NUM;
            } else {
                $sTabNumTmp = $TAB_NUM;
            }

            $regDate = "";
            $regDateFromFile = trim($arItem[20]);
            if (strlen($regDateFromFile) >= 10) {
                $regDate = date("d.m.Y", MakeTimeStamp(substr($regDateFromFile, 0, 10), "YYYY-MM-DD"));
            }

            $arSaveData = [
                'UF_NAME' => trim(
                    str_replace(
                        array('(совм.)', '(осн.)', '(вн. совм.)', '(1985 г.р.)', '(совм. ао 14)'),
                        "",
                        $arItem[1]
                    )
                ),
                'UF_XML_ID' => strtoupper($sTabNumTmp),
                'UF_PAHRM_NUMBER' => $apt_number,
                'UF_PHARM_ADDRESS' => trim($arItem[3]),
                'UF_APTECKA_OBJ' => $pharmacy_id,
                'UF_CITY' => $city_id,
                'UF_COMPANY' => $company_id,
                'UF_JOB_TITLE' => trim($arItem[8]),
                'UF_CODE_DEPARTMENT' => trim($arItem[9]),
                'UF_DEPARTMENT_TYPE' => trim($arItem[10]),
                'UF_CODE_EMPLOYEE' => trim($arItem[11]),
                'UF_STATE' => trim($arItem[12]),
                'UF_SNILS' => $snils,
                'UF_IS_MAIN_WORK' => $sMainWork,
                'UF_BRAND' => trim($arItem[$nFieldBrand]),
                'UF_PHARM_EMAIL' => trim($arItem[$nFieldAptEmail]),
                'UF_BUSSINES_MESURE' => trim($arItem[$nFieldBizEd]),
                'UF_SCHEDULE' => trim($arItem[$nFiledWorkTime]),
                "UF_DATE_REGISTRATION" => $regDate,
                'UF_ACTIVE' => (trim($arItem[4]) == 'Да' || trim($arItem[4]) == 'да') ? 1 : 0,
            ];

            if (stripos($arSaveData['UF_DEPARTMENT_TYPE'], 'офис') !== false &&
                (
                    stripos($arSaveData['UF_DEPARTMENT_TYPE'], 'заведующ') !== false ||
                    stripos($arSaveData['UF_DEPARTMENT_TYPE'], 'управляющ') !== false ||
                    stripos($arSaveData['UF_DEPARTMENT_TYPE'], 'провизор') !== false ||
                    stripos($arSaveData['UF_DEPARTMENT_TYPE'], 'фармацевт') !== false ||
                    stripos($arSaveData['UF_DEPARTMENT_TYPE'], 'консультант') !== false
                )
            ) {
                $arSaveData['UF_DEPARTMENT_TYPE'] = '';
            }

            if (strpos($arSaveData['UF_NAME'], 'совм.') !== false) {
                $arSaveData['UF_ACTIVE'] = 1;
            }

            $xml_id = mb_strtolower(trim($arSaveData['UF_XML_ID']), 'UTF-8');
            $arSaveData['UF_USER_ID'] = isset($this->users[$xml_id]) ? $this->users[$xml_id] : 0;


            if (
                stripos($arSaveData['UF_JOB_TITLE'], 'замест') === false
                &&
                (
                    stripos($arSaveData['UF_JOB_TITLE'], 'заведующ') !== false ||
                    stripos($arSaveData['UF_JOB_TITLE'], 'управляющ') !== false
                )
            ) {
                $arSaveData["UF_SORT"] = 400;
            } elseif (
                stripos($arSaveData['UF_JOB_TITLE'], 'замест') !== false
                &&
                (
                    stripos($arSaveData['UF_JOB_TITLE'], 'заведующ') !== false ||
                    stripos($arSaveData['UF_JOB_TITLE'], 'управляющ') !== false
                )

            ) {
                $arSaveData["UF_SORT"] = 450;
            }
            $this->storeEmployee($arSaveData);
        }
    }

    private function storeEmployee(array $arSave): void
    {
        if (!$this->employee[$arSave['UF_XML_ID']]) {
            $id = $this->addEmployee($arSave);

            if ($id > 0) {
                $this->employee[$arSave['UF_XML_ID']] = $id;
            }
        } else {
            $this->storeEntity->update($this->employee[$arSave['UF_XML_ID']], $arSave);
        }
    }

    private function getEmployee(bool $isFull = false): void
    {
        $select = $isFull ? [
            'ID',
            'UF_XML_ID',
        ] : [
            '*',
            'UF_*',
        ];

        $items = $this->storeEntity->find([
            'filter' => [
                '!UF_XML_ID' => false,
            ],
            'select' =>  $select,
        ]);

        foreach ($items as $item) {
            $code = mb_strtoupper(trim($item['UF_XML_ID']), 'UTF-8');
            $this->employee[$code] = $isFull ? $item : $item['ID'];
        }

        unset($items);
    }

    private function addEmployee(array $arSave): int
    {
        return $this->storeEntity->add($arSave) ?? 0;
    }

    private function getUsers(): void
    {
        $items = UserTable::getList([
            'filter' => [
                '!UF_NUMBER' => false,
                'LID' => SITE_ID,
            ],
            'select' => [
                'ID',
                'UF_NUMBER',
            ]
        ])->fetchAll();

        foreach ($items as $item) {
            $code = mb_strtolower(trim($item['UF_NUMBER']), 'UTF-8');
            $this->users[$code] = $item['ID'];
        }

        unset($items);
    }

    private function storeRegion(string $city, string $region): int
    {
        $city_id = 0;

        if ($city || $region) {
            $xml_id = '';
            $parent_xml_id = '';

            foreach (array($region, $city) as $name) {
                $xml_id = md5($xml_id . mb_strtolower($name, 'UTF-8'));

                if ($name) {
                    if (!isset($this->regions[$xml_id])) {
                        $id = $this->addRegion(
                            [
                                'IBLOCK_SECTION_ID' => ($parent_xml_id && isset($arLocationId[$parent_xml_id]) ? $arLocationId[$parent_xml_id] : 0),
                                'ACTIVE' => 'Y',
                                'NAME' => $name,
                                'XML_ID' => $xml_id,
                                'IBLOCK_ID' => IBLOCK_ID_NUM_CITIES,
                                'TIMESTAMP_X' => DateTime::createFromTimestamp(time()),
                            ]
                        );

                        if ($id > 0) {
                            $this->regions[$xml_id] = $id;
                        }
                    }

                    if (isset($this->regions[$xml_id])) {
                        $city_id = $this->regions[$xml_id];
                    }
                }
                $parent_xml_id = $xml_id;
            }
        }

        return $city_id;
    }

    private function getRegions(): void
    {
        $items = SectionTable::getList([
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

        foreach ($items as $item) {
            $code = mb_strtolower(trim($item['XML_ID']), 'UTF-8');
            $this->regions[$code] = $item['ID'];
        }

        unset($regions);
    }

    private function addRegion(array $data): int
    {

        $data['DATE_CREATE'] = DateTime::createFromTimestamp(time());
        $state = SectionTable::add($data);
        if ($state->isSuccess()) {
            return $state->getId();
        } else {
            $this->error[] = implode(', ', $state->getErrorMessages());
        }

        return 0;
    }

    private function storePharmacy(string $pharmacy, int $city_id): int
    {
        $id = 0;

        if ($pharmacy) {
            $xml_id = md5($pharmacy);

            if (!isset($this->arPharmacy[$xml_id])) {
                $pharmacyId = $this->addPharmacy([
                    'IBLOCK_ID' => IBLOCK_ID_NUM_CITIES,
                    'IBLOCK_SECTION_ID' => $city_id,
                    'ACTIVE' => 'Y',
                    'NAME' => $pharmacy,
                    'XML_ID' => $xml_id,
                ]);

                if ($pharmacyId > 0) {
                    $this->arPharmacy[$xml_id] = $pharmacyId;
                }
            }

            if (isset($this->arPharmacy[$xml_id])) {
                $id = $this->arPharmacy[$xml_id];
            }
        }

        return $id;
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

        foreach ($items as $item) {
            $code = mb_strtolower(trim($item['XML_ID']), 'UTF-8');
            $this->arPharmacy[$code] = $item['ID'];
        }

        unset($items);
    }

    private function addPharmacy(array $data): int
    {
        $state = ElementTable::add($data);
        if ($state->isSuccess()) {
            return $state->getId();
        } else {
            $this->error[] = implode(', ', $state->getErrorMessages());
        }

        return 0;
    }

    private function storePharmacyChain(string $company): int
    {
        $id = 0;

        if ($company) {
            $xml_id = md5($company);

            if (!isset($this->pharmacyChain[$xml_id])) {
                $pharmacyChainId = $this->addPharmacyChain([
                    'UF_NAME' => $company,
                    'UF_XML_ID' => $xml_id,
                ]);

                if ($pharmacyChainId > 0) {
                    $this->pharmacyChain[$xml_id] = $pharmacyChainId;
                }
            }

            if (isset($this->pharmacyChain[$xml_id])) {
                $id = $this->pharmacyChain[$xml_id];
            }
        }

        return $id;
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

        foreach ($items as $item) {
            $code = mb_strtolower(trim($item['XML_ID']), 'UTF-8');
            $this->pharmacyChain[$code] = $item['ID'];
        }

        unset($items);
    }

    private function addPharmacyChain(array $data): int
    {
        $pharmacyChainEntity = new HighloadBlock(HL_TABLE_PHARMACY_CHAIN);

        return $pharmacyChainEntity->add($data);
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
          //  unlink($this->file);
        }
    }

    private function checkSettings(): bool
    {
        if (!defined('IBLOCK_ID_NUM_CITIES') || IBLOCK_ID_NUM_CITIES < 1) {
            $this->error[] = 'Не задана константа с ID ИБ Городов';
            return false;
        }

        if (!defined('HL_TABLE_PHARMACY_CHAIN') || strlen(HL_TABLE_PHARMACY_CHAIN) < 0) {
            $this->error[] = 'Не задана константа с ID HL Табельные номера: Аптечная сеть';
            return false;
        }

        if (!defined('HL_TABLE_USERS') || strlen(HL_TABLE_USERS) < 0) {
            $this->error[] = 'Не задана константа с ID HL Табельные номера сотрудников';
            return false;
        }

        return true;
    }
}
