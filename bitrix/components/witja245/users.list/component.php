<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

/** @global CIntranetToolbar $INTRANET_TOOLBAR */
global $INTRANET_TOOLBAR;

use Bitrix\Main\Context,
	Bitrix\Main\Type\DateTime,
	Bitrix\Main\Loader,
	Bitrix\Iblock;
// массив результата работы компонента
$by = 'date_register ';
$order = array('sort' => 'asc');
$tmp = 'sort'; // параметр проигнорируется методом, но обязан быть
$arFilter = $arParams['FILTER'];
$rsUsers = CUser::GetList($by, $order, $tmp, $arFilter);
$rsUsers->NavStart($arParams['USERS_COUNT']); // разбиваем постранично по 50 записей
$NAV_STRING = $rsUsers->GetPageNavStringEx($navComponentObject, 'Заголовок', $arParams['USERS_PAGINATION'], 'Y');
$arResult['NAV_STRING'] = $NAV_STRING;
while ($arUsers = $rsUsers->Fetch())
{
    $arResult["ITEMS"][]=$arUsers;

}


// подключаем шаблон компонента
$this->IncludeComponentTemplate();
