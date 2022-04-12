<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arCurrentValues */

if(!CModule::IncludeModule("iblock"))
	return;



$arComponentParameters = array(
	"GROUPS" => array(
	),
	"PARAMETERS" => array(
		"AJAX_MODE" => array(),
		"USERS_COUNT" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("T_IBLOCK_DESC_LIST_CONT"),
			"TYPE" => "STRING",
			"DEFAULT" => "20",
		),
        "USERS_PAGINATION" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("T_IBLOCK_DESC_PAGINATION"),
            "TYPE" => "STRING",
            "DEFAULT" => ".default",
        ),

	),
);


CIBlockParameters::Add404Settings($arComponentParameters, $arCurrentValues);
