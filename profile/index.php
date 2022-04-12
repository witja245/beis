<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

if (is_string($_REQUEST["backurl"]) && mb_strpos($_REQUEST["backurl"], "/") === 0)
{
    LocalRedirect($_REQUEST["backurl"]);
}

$APPLICATION->SetTitle("Профиль");
?> <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
