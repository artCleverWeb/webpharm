<?php

namespace Sprint\Migration;


class Version20241112200405 extends Version
{
    protected $author = "admin";

    protected $description = "Добавление пользовательских полей в сущность пользователей";

    protected $moduleVersion = "4.12.6";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'USER',
  'FIELD_NAME' => 'UF_POINTS',
  'USER_TYPE_ID' => 'double',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'I',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'PRECISION' => 2,
    'SIZE' => 20,
    'MIN_VALUE' => 0.0,
    'MAX_VALUE' => 0.0,
    'DEFAULT_VALUE' => NULL,
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Баланс баллов',
    'ru' => 'Баланс баллов',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Баланс баллов',
    'ru' => 'Баланс баллов',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Баланс баллов',
    'ru' => 'Баланс баллов',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
        $helper->UserTypeEntity()->saveUserTypeEntity(array (
  'ENTITY_ID' => 'USER',
  'FIELD_NAME' => 'UF_MONEY',
  'USER_TYPE_ID' => 'double',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'I',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'PRECISION' => 2,
    'SIZE' => 20,
    'MIN_VALUE' => 0.0,
    'MAX_VALUE' => 0.0,
    'DEFAULT_VALUE' => NULL,
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Баланс рублей',
    'ru' => 'Баланс рублей',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Баланс рублей',
    'ru' => 'Баланс рублей',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Баланс рублей',
    'ru' => 'Баланс рублей',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
    }

}
