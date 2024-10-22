<?php
use Bitrix\Main\Loader;

/**
 * @var global $APPLICATION
 */

Loader::includeModule('sale');
Loader::includeModule('catalog');

CModule::IncludeModule("imaginweb.sms");

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/userTypeProperty/usertypeyesno.php';
require_once __DIR__ . '/userTypeProperty/usertypeuser.php';

require_once __DIR__ . '/handlers/user.php';
require_once __DIR__ . '/handlers/sms.php';

Loader::includeModule('iblock');
Loader::includeModule('kolos.studio');

Loader::registerAutoLoadClasses(null, [
    'CUserTypeYesNo' => __DIR__ . '/userTypeProperty/usertypeyesno.php',
    'CUserTypeUser' => __DIR__ . '/userTypeProperty/usertypeuser.php',
]);

AddEventHandler('iblock', 'OnIBlockPropertyBuildList', ['CUserTypeYesNo', 'GetUserTypeDescription']);
AddEventHandler('main', 'OnUserTypeBuildList', ['CUserTypeUser', 'GetUserTypeDescription']);
