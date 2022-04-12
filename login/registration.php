<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");



$APPLICATION->SetTitle("Регистрация");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.register", 
	".default", 
	array(
		"AUTH" => "Y",
		"REQUIRED_FIELDS" => array(
			0 => "EMAIL",
			1 => "NAME",
			2 => "SECOND_NAME",
			3 => "LAST_NAME",
			4 => "PERSONAL_BIRTHDAY",
			5 => "PERSONAL_PHOTO",
			6 => "PERSONAL_PHONE",
		),
		"SET_TITLE" => "Y",
		"SHOW_FIELDS" => array(
			0 => "EMAIL",
			1 => "NAME",
			2 => "SECOND_NAME",
			3 => "LAST_NAME",
			4 => "PERSONAL_BIRTHDAY",
			5 => "PERSONAL_PHOTO",
			6 => "PERSONAL_PHONE",
		),
		"SUCCESS_PAGE" => "/",
		"USER_PROPERTY" => array(
			0 => "UF_ACADEMIC_DEGREE",
			1 => "UF_ACADEMIC_TITLE",
			2 => "UF_ACADEMY_SCIENCES",
			3 => "UF_CATEGORIES",
		),
		"USER_PROPERTY_NAME" => "",
		"USE_BACKURL" => "Y",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>