<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}
?>


<?php
$strNavQueryString = ($arResult['strNavQueryString'] != "" ?
$arResult['strNavQueryString']."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] !="" ? "?"
.$arResult["NavQueryString"]: "");
//printr($arResult);
?>
<?php if ($arResult['NavPageCount'] > 1) :?>
<div class="pagination_wrap clearfix" data-aos="fade-up" data-aos-delay="100">
    <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12">
            <span class="page_number">Страница <?=$arResult['NavPageNomer']?> из <?=$arResult['NavPageCount']?></span>
        </div>

        <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12">
            <ul class="pagination_nav ul_li_right clearfix">
<!--            Prev-->
            <?php if ($arResult['NavPageNomer'] > 1) : ?>
                <?php if ($arResult['NavPageNomer'] > 2) : ?>
                    <li class="prev">
                        <a href="<?=$arResult['sUrlPath']?>?<?=$strNavQueryString?>PAGEN_<?=$arResult['NavNum']?>=<?= ($arResult['NavPageNomer'] - 1)?>" aria-label="Previos">
                            <i class="fa fa-angle-left"></i>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="prev">
                        <a href="<?=$arResult['sUrlPath']?>?<?=$strNavQueryStringFull?>PAGEN_<?=$arResult['NavNum']?>=<?= ($arResult['NavPageNomer'] - 1)?>" aria-label="Previos">
                            <i class="fa fa-angle-left"></i>
                        </a>
                    </li>
                <?php endif;?>
            <?php endif;?>
            <!--End Prev-->
            <!--Nums-->
            <?php while ($arResult['nStartPage'] <= $arResult['nEndPage']) :?>
                <?php if ($arResult['nStartPage'] == $arResult['NavPageNomer']) :
//                Если текущая страница
                ?>
                <li class="active"><a><?=$arResult['nStartPage']?></a></li>
            <?php elseif ($arResult['nStartPage'] == 1 && $arResult['bSavePage'] == false): //если ссылка на первую страницу ?>

                <li>
                    <a href="<?=$arResult['sUrlPath']?><?=$strNavQueryStringFull?>"><?=$arResult['nStartPage']?></a>
                </li>
            <?php else: ?>
            <li>
                <a href="<?=$arResult['sUrlPath']?>?<?=$strNavQueryString?>PAGEN_<?=$arResult['NavNum']?>=<?=$arResult['nStartPage']?>"><?=$arResult['nStartPage']?></a>
            </li>
            <?php endif; ?>
            <?php $arResult['nStartPage']++?>
            <?php endwhile; ?>
            <!--Nums-->
            <!--NEXT-->
            <?php if($arResult['NavPageNomer'] < $arResult['NavPageCount']) : ?>
            <li class="next">
                <a href="<?=$arResult['sUrlPath']?>?<?=$arResult["NavQueryString"]?>PAGEN_<?=$arResult['NavNum']?>=<?=($arResult['NavPageNomer'] + 1) ?>"  aria-label="Next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
            <?php endif;?>
            </ul>
        </div>
    </div>
</div>
<?php endif; ?>
