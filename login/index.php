<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

if (is_string($_REQUEST["backurl"]) && mb_strpos($_REQUEST["backurl"], "/") === 0)
{
	LocalRedirect($_REQUEST["backurl"]);
}

$APPLICATION->SetTitle("Вход на сайт");
?><?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "beis_auth", Array(
	"FORGOT_PASSWORD_URL" => "/login/",	// Страница забытого пароля
		"PROFILE_URL" => "/profile/index.php",	// Страница профиля
		"REGISTER_URL" => "/login/registration.php",	// Страница регистрации
		"SHOW_ERRORS" => "Y",	// Показывать ошибки
	),
	false
);?> <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>