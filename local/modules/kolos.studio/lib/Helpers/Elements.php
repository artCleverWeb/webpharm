<?php

namespace Kolos\Studio\Helpers;

use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Data\Cache;
use Kolos\Studio\Main\Helpers\CacheManager;
use Bitrix\Main\Application;

class Elements
{
    const CACHE_PATH = '/kolos.studio/' . __CLASS__ . '/';
    const CACHE_TTL = 86400;

    public static function isActive($elementId, $iblockId = false)
    {
        $filter = [
            'ID' => $elementId,
            'ACTIVE' => 'Y',
            'ACTIVE_DATE' => 'Y',
        ];

        if ($iblockId) {
            $filter['IBLOCK_ID'] = $iblockId;
        }

        $res = \CIBlockElement::GetList([], $filter, false, false, ['ID']);

        return $res->fetch();
    }

    public static function getNameById(int $id): string
    {
        $element = ElementTable::getRow([
            'filter' => ['ID' => $id],
            'select' => ['NAME', 'ID'],
            "cache" => ["ttl" => 36000],
        ]);

        return isset($element['NAME']) ? $element['NAME'] : '';
    }

    public static function filterOnlyActiveIds($ids, $iblockId = false)
    {
        $ids = array_wrap($ids);

        if (empty($ids)) {
            return [];
        }

        $filter = [
            'ID' => array_wrap($ids),
            'ACTIVE' => 'Y',
            'ACTIVE_DATE' => 'Y',
        ];

        if ($iblockId) {
            $filter['IBLOCK_ID'] = $iblockId;
        }

        $res = \CIBlockElement::GetList([], $filter, false, false, ['ID']);

        $resIds = [];

        while ($el = $res->Fetch()) {
            $resIds[] = $el['ID'];
        }

        return $resIds;
    }

    public static function filterOnlyActive($iblockId = false, int $limit = 0)
    {
        $filter = [
            'ACTIVE' => 'Y',
            'ACTIVE_DATE' => 'Y',
        ];

        if ($iblockId) {
            $filter['IBLOCK_ID'] = $iblockId;
        }

        $res = \CIBlockElement::GetList(
            ["ACTIVE_FROM" => "ASC", "SORT" => "DESC"],
            $filter,
            false,
            ($limit > 0 ? ["nTopCount" => $limit] : false),
            ['ID', 'SORT', 'NAME']
        );

        $resIds = [];

        while ($el = $res->Fetch()) {
            $resIds[] = [
                'ID' => $el['ID'],
                'NAME' => $el['NAME'],
            ];
        }

        return $resIds;
    }

    public static function getByXmlCode(string $xml_id, $iblockId = false): array
    {
        $filter = [
            'XML_ID' => $xml_id,

        ];

        if ($iblockId) {
            $filter['IBLOCK_ID'] = $iblockId;
        }

        $res = \CIBlockElement::GetList([], $filter, false, false, ['ID']);

        $result = $res->fetch();

        return is_array($result) ? $result : [];
    }

    public static function getXmlCodeById(int $id, $iblockId = false): string
    {
        $filter = [
            'ID' => $id,
        ];

        if ($iblockId) {
            $filter['IBLOCK_ID'] = $iblockId;
        }

        $res = \CIBlockElement::GetList([], $filter, false, false, ['XML_ID']);

        if ($item = $res->fetch()) {
            return $item['XML_ID'];
        }

        return $id;
    }

    public static function getSectionInfo(int $id): array
    {
        $res = [];
        
        $cache = Cache::createInstance();
        $taggedCache = Application::getInstance()->getTaggedCache();
        $cacheKey = 'element_first_section_info_' . $id;

        if ($cache->initCache(self::CACHE_TTL, $cacheKey, self::CACHE_PATH)) {
            $res = $cache->getVars();
        } elseif ($cache->startDataCache()) {
            $element = ElementTable::getRow([
                'filter' => ['ID' => $id],
                'select' => ['ID', 'IBLOCK_SECTION_ID', 'IBLOCK_ID'],
                "cache" => ["ttl" => self::CACHE_TTL],
            ]);

            $res['CURRENT_SECTION'] = \CIBlockSection::GetByID($element['IBLOCK_SECTION_ID'])->Fetch();
            $navChainRes = \CIBlockSection::GetNavChain(
                $element['IBLOCK_ID'],
                $element['IBLOCK_SECTION_ID'],
                [
                    'ID',
                    'NAME',
                    'DEPTH_LEVEL',
                    'CODE',
                    'SECTION_PAGE_URL',
                ]
            );

            while ($section = $navChainRes->GetNext()) {
                if ($section['DEPTH_LEVEL'] == 1) {
                    $sectionInfo = \CIBlockSection::GetList(
                        [],
                        [
                            'ID' => $section['ID'],
                            'IBLOCK_ID' => $element['IBLOCK_ID'],
                        ],
                        false,
                        [
                            'ID',
                            'IBLOCK_ID',
                            'UF_*',
                        ]
                    )->GetNext();

                    $section = array_merge($section, $sectionInfo);
                    $res['FIRST'] = $section;
                }

                $res['PATH_TO'][] = $section;
            }
            $taggedCache->startTagCache(self::CACHE_PATH);
            $taggedCache->registerTag('element_id_' . $id);
            $taggedCache->endTagCache();
            $cache->endDataCache($res);
        }

        return $res;
    }
}
