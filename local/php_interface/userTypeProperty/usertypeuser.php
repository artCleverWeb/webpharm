<?php

IncludeModuleLangFile(__FILE__);


class CUserTypeUser
{
    public static function GetUserTypeDescription()
    {
        return [
            "USER_TYPE_ID" => "usertypeuser",
            "CLASS_NAME" => "CUserTypeUser",
            "DESCRIPTION" => "Привязка к пользователю",
            "BASE_TYPE" => "int",
        ];
    }

    public static function GetDBColumnType($arUserField)
    {
        global $DB;

        switch (strtolower($DB->type)) {
            case "mysql":
                return "int(1)";
            case "oracle":
                return "number(1)";
            case "mssql":
                return "int";
        }
    }

    function PrepareSettings($arUserField)
    {
        return [];
    }

    public static function GetSettingsHTML($arUserField = false, $arHtmlControl, $bVarsFromForm)
    {
        return "";
    }

    public static function GetEditFormHTML($arUserField, $arHtmlControl)
    {
        $sField = FindUserID(
            $arUserField["FIELD_NAME"],
            $arUserField["VALUE"],
            "",
            "hlrow_edit_2_form",
            "5",
            "",
            " ... ",
            "",
            ""
        );

        return $sField;
    }

    public static function GetFilterHTML($arUserField, $arHtmlControl)
    {
        return '';
    }

    public static function GetAdminListViewHTML($arUserField, $arHtmlControl)
    {
        preg_match("/FIELDS\[([0-9]+)\]/", $arHtmlControl["NAME"], $a);

        if ($a[1] > 0) {
            require_once $_SERVER["DOCUMENT_ROOT"] . '/bitrix/modules/main/tools/prop_userid.php';

            return CIBlockPropertyUserID::GetAdminListViewHTML([], $arHtmlControl, "");
        }

        return "&nbsp;";
    }

    public static function GetAdminListEditHTML($arUserField, $arHtmlControl)
    {
        print_r($arHtmlControl);
        die();
        $sField = FindUserID(
            $arHtmlControl["NAME"],
            $arHtmlControl["VALUE"],
            "",
            "form_tbl_user",
            "5",
            "",
            " ... ",
            "",
            ""
        );

        return $sField;
    }

    function CheckFields($arUserField, $value)
    {
        return [];
    }

    function OnSearchIndex($arUserField)
    {
        return "";
    }
}
