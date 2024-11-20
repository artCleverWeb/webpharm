<?php

namespace Sprint\Migration;


class Version20241120190839 extends Version
{
    protected $author = "admin";

    protected $description = "HL Прохождение Обучения: новые поля";

    protected $moduleVersion = "4.12.6";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
    $hlblockId = $helper->Hlblock()->getHlblockIdIfExists('UserProcessEducation');
        $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_DATE',
  'USER_TYPE_ID' => 'datetime',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'DEFAULT_VALUE' => 
    array (
      'TYPE' => 'NOW',
      'VALUE' => '',
    ),
    'USE_SECOND' => 'Y',
    'USE_TIMEZONE' => 'N',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Дата ознакомления',
    'ru' => 'Дата ознакомления',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Дата ознакомления',
    'ru' => 'Дата ознакомления',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Дата ознакомления',
    'ru' => 'Дата ознакомления',
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
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_USER_ID',
  'USER_TYPE_ID' => 'usertypeuser',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'Y',
  'SHOW_FILTER' => 'I',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => NULL,
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'ID пользователя',
    'ru' => 'ID пользователя',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'ID пользователя',
    'ru' => 'ID пользователя',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'ID пользователя',
    'ru' => 'ID пользователя',
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
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_DESCR',
  'USER_TYPE_ID' => 'string',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'SIZE' => 20,
    'ROWS' => 1,
    'REGEXP' => '',
    'MIN_LENGTH' => 0,
    'MAX_LENGTH' => 0,
    'DEFAULT_VALUE' => '',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Описание',
    'ru' => 'Описание',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Описание',
    'ru' => 'Описание',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Описание',
    'ru' => 'Описание',
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
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_ENTITY_ID',
  'USER_TYPE_ID' => 'integer',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'Y',
  'SHOW_FILTER' => 'I',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'SIZE' => 20,
    'MIN_VALUE' => 0,
    'MAX_VALUE' => 0,
    'DEFAULT_VALUE' => NULL,
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'ID объекта',
    'ru' => 'ID объекта',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'ID объекта',
    'ru' => 'ID объекта',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'ID объекта',
    'ru' => 'ID объекта',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => 'ID объекта',
    'ru' => 'ID объекта',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_DATE_FINISH',
  'USER_TYPE_ID' => 'datetime',
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
    'DEFAULT_VALUE' => 
    array (
      'TYPE' => 'NONE',
      'VALUE' => '',
    ),
    'USE_SECOND' => 'Y',
    'USE_TIMEZONE' => 'N',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Дата завершения курса',
    'ru' => 'Дата завершения курса',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Дата завершения курса',
    'ru' => 'Дата завершения курса',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Дата завершения курса',
    'ru' => 'Дата завершения курса',
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
