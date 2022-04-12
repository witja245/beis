<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$order = array('sort' => 'asc');
$tmp = 'sort'; // параметр проигнорируется методом, но обязан быть
$rsUsers = CUser::GetList($order, $tmp);
while ($arUsers = $rsUsers->Fetch())
{
    $arResult["ITEMS"][]=$arUsers;

}
$count_users = count($arResult["ITEMS"]);

$APPLICATION->SetTitle("Beis социальная сеть");
?>
<!-- banner_section - start
  ================================================== -->
<section class="banner_section parallaxie has_overlay text-white d-flex align-items-center clearfix"
         data-bg-image="<?=DEFAULT_TEMPLATE_MAIN_PATH?>/assets/images/backgrounds/main_background.jpg">
    <div class="overlay"></div>
    <div class="container">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="banner_content">
                    <h1 class="text-white aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" >
                        <strong class="text-uppercase">BEIS</strong>
                        Ресурс системы научно-технической информации
                    </h1>
                    <p class="text-danger" data-aos="fade-up" data-aos-delay="300" >
                        <b>Без Регистрации:</b>
                    </p>
                    <ul class="list-unstyled">
                        <li><i class="fal fa-check"></i>&nbsp; &nbsp; Узнать общественно значимую информацию открытого характера об авторе</li>
                        <li><i class="fal fa-check"></i>&nbsp; &nbsp;  Ознакомиться с метеоданными научных, учебно-методических и иных трудов </li>
                    </ul>
                    <p data-aos="fade-up" data-aos-delay="300" style="color: #EA001E">
                        <b>После регистрации:</b>
                    </p>
                    <ul class="list-unstyled">
                        <li><i class="fal fa-check"></i>&nbsp; &nbsp;  Опубликовать информацию открытого характера об авторе</li>
                        <li><i class="fal fa-check"></i> &nbsp; &nbsp;Опубликовать метеоданные открытых трудов </li>
                        <li><i class="fal fa-check"></i> &nbsp; &nbsp;Осуществлять переписку с зарегистрированными авторами </li>
                        <li><i class="fal fa-check"></i> &nbsp; &nbsp;Осуществлять поиск рецензента для получения внешней рецензии </li>
                        <li><i class="fal fa-check"></i> &nbsp; &nbsp;Осуществлять рецензирование в соответствии с областью свой компетенции </li>
                    </ul>
                    <p ><small>
                            *Возможности ресурса ограничены правилами пользования сайтом, количеством и компетенцией <br/>
                            зарегистрированных пользователей, количеством трудов метеоданные которых опубликованы на сайте.
                        </small>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="funfact_item text-center text-white" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="counter_text text-white mb-0"><span class="counter"><?=$count_users?></span>+</h3>
                        <small class="line bg_default_red"></small>
                        <p class="item_title mb-0">Авторов</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="funfact_item text-center text-white" data-aos="fade-up" data-aos-delay="300">
                        <h3 class="counter_text text-white mb-0"><span class="counter">5</span>+</h3>
                        <small class="line bg_default_red"></small>
                        <p class="item_title mb-0">Рецензентов</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="funfact_item text-center text-white" data-aos="fade-up" data-aos-delay="500">
                        <h3 class="counter_text text-white mb-0"><span class="counter">100</span>+</h3>
                        <small class="line bg_default_red"></small>
                        <p class="item_title mb-0">Метеоданных</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- banner_section - end
================================================== -->

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
