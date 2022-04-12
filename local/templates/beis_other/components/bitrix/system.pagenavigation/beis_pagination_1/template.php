<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}
?>

<?

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>
<?php if ($arResult['NavPageCount'] > 1) :?>
<div class="pagination_wrap clearfix" data-aos="fade-up" data-aos-delay="100">
    <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12">
            <span class="page_number">Page 1 of 3</span>
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
                <li><a href="#!"><i class="fal fa-angle-double-left"></i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li><a href="#!">2</a></li>
                <li><a href="#!">3</a></li>
                <li><a href="#!"><i class="fal fa-angle-double-right"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<?php endif;?>
