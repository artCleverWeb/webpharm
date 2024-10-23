<?php

namespace Kolos\Studio\Helpers;

use Bitrix\Main\Engine\UrlManager;

class AjaxHelper
{
    public static function getComponentActionUrl(\CBitrixComponent $componentClass, string $action): string
    {
        return UrlManager::getInstance()->createByBitrixComponent($componentClass, $action, [
            'sessid' => bitrix_sessid()
        ]);
    }

    public static function getControllerActionUrl(\Bitrix\Main\Engine\Controller $controllerClass, string $action): string
    {
        return UrlManager::getInstance()->createByController($controllerClass, $action, [
            'sessid' => bitrix_sessid()
        ]);
    }
}