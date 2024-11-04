<?php

$arUrlRewrite = array(
    0 =>
        array(
            'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
            'RULE' => 'componentName=$1',
            'ID' => null,
            'PATH' => '/bitrix/services/mobileapp/jn.php',
            'SORT' => 100,
        ),
    2 =>
        [
            'CONDITION' => '#^/test/#',
            'RULE' => '',
            'ID' => 'kolos.studio:tests',
            'PATH' => '/test/index.php',
            'SORT' => 1,
        ],
    3 =>
        array(
            'CONDITION' => '#^/courses/#',
            'RULE' => '',
            'ID' => 'bitrix:news',
            'PATH' => '/courses/index.php',
            'SORT' => 100,
        ),
    1 =>
        array(
            'CONDITION' => '#^/rest/#',
            'RULE' => '',
            'ID' => null,
            'PATH' => '/bitrix/services/rest/index.php',
            'SORT' => 100,
        ),

);
