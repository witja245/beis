<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?><?$APPLICATION->IncludeComponent(
	"bitrix:socialnetwork.user_menu",
	"",
	Array(
		"ID" => $id,
		"PAGE_VAR" => "",
		"PATH_TO_MESSAGES_INPUT" => "",
		"PATH_TO_MESSAGE_FORM" => "",
		"PATH_TO_SEARCH" => "",
		"PATH_TO_USER" => "",
		"PATH_TO_USER_BLOG" => "",
		"PATH_TO_USER_CALENDAR" => "",
		"PATH_TO_USER_EDIT" => "",
		"PATH_TO_USER_FILES" => "",
		"PATH_TO_USER_FORUM" => "",
		"PATH_TO_USER_FRIENDS" => "",
		"PATH_TO_USER_FRIENDS_ADD" => "",
		"PATH_TO_USER_FRIENDS_DELETE" => "",
		"PATH_TO_USER_GROUPS" => "",
		"PATH_TO_USER_GROUPS_ADD" => "",
		"PATH_TO_USER_PHOTO" => "",
		"PATH_TO_USER_TASKS" => "",
		"USER_VAR" => ""
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>