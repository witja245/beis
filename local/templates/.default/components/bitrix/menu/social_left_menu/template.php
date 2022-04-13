<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>



<ul class="list-group">

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a>
            <span class="badge bg-primary rounded-pill">1</span>
        </li>
	<?else:?>
		<li class="list-group-item d-flex justify-content-between align-items-center" >
            <a href="<?=$arItem["LINK"]?>" ><?=$arItem["TEXT"]?></a>
            <span class="badge bg-danger rounded-pill"></span>
        </li>
	<?endif?>

<?endforeach?>

</ul>
<?endif?>
