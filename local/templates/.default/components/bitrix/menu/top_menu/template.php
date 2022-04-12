<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
//список месяцев с названиями для замены
$_monthsList = array(".01." => "января", ".02." => "февраля",
    ".03." => "марта", ".04." => "апреля", ".05." => "мая", ".06." => "июня",
    ".07." => "июля", ".08." => "августа", ".09." => "сентября",
    ".10." => "октября", ".11." => "ноября", ".12." => "декабря");

//текущая дата
$currentDate = date("d.m.Y H:i");
//переменная $currentDate теперь хранит текущую дату в формате 22.07.2015

//но так как наша задача - вывод русской даты,
//заменяем число месяца на название:
$_mD = date(".m."); //для замены
$currentDate = str_replace($_mD, " ".$_monthsList[$_mD]." ", $currentDate);

//теперь в переменной $currentDate хранится дата в формате 22 июня 2015
?>
<? if (!empty($arResult)): ?>
    <nav class="main_menu clearfix">
        <ul class="ul_li_center clearfix">
            <li class="last_li"><?php echo $currentDate; ?></li>
            <li class="has_child">
                <a href="#!">Язык: Русский</a>
                <ul class="submenu">
                    <li><a href="index_1.html">Русский</a></li>
                    <li><a href="index_2.html">Английский</a></li>
                </ul>
            </li>

            <?
            foreach ($arResult as $arItem):
                if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                    continue;
                ?>
                <? if ($arItem["SELECTED"]):?>
                <li class="top_li"><a href="<?= $arItem["LINK"] ?>" class="selected"><?= $arItem["TEXT"] ?></a></li>
            <? else:?>
                <li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
            <? endif ?>
            <? endforeach ?>
        </ul>
    </nav>
<? endif ?>
