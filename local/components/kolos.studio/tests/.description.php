<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$arComponentDescription = [
    'NAME' => GetMessage('NAME'),
    'DESCRIPTION' => GetMessage('DESCRIPTION'),
    'ICON' => '/images/icon.gif',
    'SORT' => 30,
    'CACHE_PATH' => 'Y',
    'PATH' => [
        'ID' => 'kolos.studio',
        'CHILD' => [
            'ID' => 'tests',
            'NAME' => GetMessage('CHILD_NAME'),
        ],
    ],
];
