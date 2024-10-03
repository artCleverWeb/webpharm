<?php

namespace Kolos\Studio\Helpers;

use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Data\Cache;
use Kolos\Studio\Main\Helpers\CacheManager;
use Bitrix\Main\Application;

class Sections
{
    const CACHE_PATH = '/kolos.studio/' . __CLASS__ . '/';
    const CACHE_TTL = 86400;

    public static function getSectionInfo(int $id): array
    {
        $res = [];

        $cache = Cache::createInstance();
        $taggedCache = Application::getInstance()->getTaggedCache();
        $cacheKey = 'section_info_' . $id;

        if ($cache->initCache(self::CACHE_TTL, $cacheKey, self::CACHE_PATH)) {
            $res = $cache->getVars();
        } elseif ($cache->startDataCache()) {
            $navChainRes = \CIBlockSection::GetNavChain(
                false,
                $id,
                [
                    'ID',
                    'NAME',
                    'DEPTH_LEVEL',
                    'CODE',
                    'SECTION_PAGE_URL',
                ]
            );


            while ($section = $navChainRes->GetNext()) {
                if ($section['ID'] == $id) {
                    $ipropValues = new \Bitrix\Iblock\InheritedProperty\SectionValues($section['IBLOCK_ID'], $section['ID']);
                    $res['SEO']  = $ipropValues->getValues();
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
