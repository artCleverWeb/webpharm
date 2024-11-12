<?php
$arUrlRewrite=array (
  4 => 
  array (
    'CONDITION' => '#^/test/#',
    'RULE' => '',
    'ID' => 'kolos.studio:tests',
    'PATH' => '/test/index.php',
    'SORT' => 1,
  ),
  0 => 
  array (
    'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => NULL,
    'PATH' => '/bitrix/services/mobileapp/jn.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/courses/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/courses/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/journal/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/journal/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
);
