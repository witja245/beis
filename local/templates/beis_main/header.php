<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
use Bitrix\Main\Page\Asset;
use Bitrix\Main\DB;
global $USER;
$asset = Asset::getInstance();

?>
<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php $APPLICATION->ShowTitle(); ?></title>
    <? $APPLICATION->ShowHead(); ?>
    <link rel="shortcut icon" href="<?=DEFAULT_TEMPLATE_PATH?>/assets/images/logo/favourite_icon.png">
    <?php
        //fraimwork - css include
        $asset->addCss(DEFAULT_TEMPLATE_PATH . "/assets/css/bootstrap.min.css");
        //icon - css include
        $asset->addCss(DEFAULT_TEMPLATE_PATH . "/assets/css/fontawesome.css");
        //animation - css include
        $asset->addCss(DEFAULT_TEMPLATE_PATH . "/assets/css/aos.css");
        $asset->addCss(DEFAULT_TEMPLATE_PATH . "/assets/css/animate.css");
        // carousel - css include
        $asset->addCss(DEFAULT_TEMPLATE_PATH . "/assets/css/slick.css");
        $asset->addCss(DEFAULT_TEMPLATE_PATH . "/assets/css/slick-theme.css");
        // popup - css include
        $asset->addCss(DEFAULT_TEMPLATE_PATH . "/assets/css/magnific-popup.css");
        // select options - css include
        $asset->addCss(DEFAULT_TEMPLATE_PATH . "/assets/css/nice-select.css");
        // pricing range - css include
        $asset->addCss(DEFAULT_TEMPLATE_PATH . "/assets/css/jquery-ui.css");
        // custom - css include
        $asset->addCss(DEFAULT_TEMPLATE_PATH . "/assets/css/style.css");
    ?>

</head>


<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<!-- backtotop - start -->
<div id="thetop"></div>
<div class="backtotop">
    <a href="#" class="scroll">
        <i class="far fa-arrow-up"></i>
    </a>
</div>
<!-- backtotop - end -->

<!-- preloader - start -->
<!--<div class="preloader">-->
<!--    <div class="animation_preloader">-->
<!--        <div class="spinner"></div>-->
<!--        <p class="text-center">Loading</p>-->
<!--    </div>-->
<!--    <div class="loader">-->
<!--        <div class="row vh-100">-->
<!--            <div class="col-3 loader_section section-left">-->
<!--                <div class="bg"></div>-->
<!--            </div>-->
<!--            <div class="col-3 loader_section section-left">-->
<!--                <div class="bg"></div>-->
<!--            </div>-->
<!--            <div class="col-3 loader_section section-right">-->
<!--                <div class="bg"></div>-->
<!--            </div>-->
<!--            <div class="col-3 loader_section section-right">-->
<!--                <div class="bg"></div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- preloader - end -->


<!-- header_section - start
================================================== -->
<header class="header_section secondary_header sticky text-white clearfix">
    <div class="header_bottom clearfix">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="brand_logo">
                        <a href="/">
                            <img src="<?= DEFAULT_TEMPLATE_PATH ?>/assets/images/logo/logo_1.png"
                                 srcset="<?= DEFAULT_TEMPLATE_PATH ?>/assets/images/logo/logo_01_2x.png 2x"
                                 alt="logo_not_found1">

                            <img src="<?= DEFAULT_TEMPLATE_PATH ?>/assets/images/logo/logo_2.png"
                                 srcset="<?= DEFAULT_TEMPLATE_PATH ?>/assets/images/logo/logo_02_2x.png 2x"
                                 alt="logo_not_found2">
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-6 order-last">
                    <?php if ($USER->IsAuthorized()){ ?>
                        <a class="custom_btn bg_default_red float-right" href="/login/"><?=$USER->GetFullName();?></a>
                    <?php }else {?>
                        <a class="custom_btn bg_default_red float-right" href="/login/">Вход</a>
                    <?php } ?>


                </div>

                <div class="col-lg-6 col-md-12">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu", Array(
                        "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                        "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                        "DELAY" => "N",	// Откладывать выполнение шаблона меню
                        "MAX_LEVEL" => "1",	// Уровень вложенности меню
                        "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                            0 => "",
                        ),
                        "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                        "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                        "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                        "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                        "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                    ),
                        false
                    );?>
                </div>

            </div>
        </div>
    </div>

    <div id="collapse_search_body" class="collapse_search_body collapse">
        <div class="search_body">
            <div class="container">
                <form action="#">
                    <div class="form_item">
                        <input type="search" name="search" placeholder="Type here...">
                        <button type="submit"><i class="fal fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
<!-- header_section - end
================================================== -->


<!-- main body - start
================================================== -->
<main>


    <!-- mobile menu - start
    ================================================== -->
    <div class="sidebar-menu-wrapper">
        <div class="mobile_sidebar_menu">
            <button type="button" class="close_btn"><i class="fal fa-times"></i></button>

            <div class="about_content mb_60">
                <div class="brand_logo mb_15">
                    <a href="index.html">
                        <img src="<?=DEFAULT_TEMPLATE_PATH?>/<?=DEFAULT_TEMPLATE_PATH?>/assets/images/logo/logo_01_1x.png" srcset="<?=DEFAULT_TEMPLATE_PATH?>/assets/images/logo/logo_01_2x.png 2x" alt="logo_not_found">
                    </a>
                </div>
                <p class="mb-0">
                    Nullam id dolor auctor, dignissim magna eu, mattis ante. Pellentesque tincidunt, elit a facilisis efficitur, nunc nisi scelerisque enim, rhoncus malesuada est velit a nulla. Cras porta mi vitae dolor tristique euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit
                </p>
            </div>

            <div class="menu_list mb_60 clearfix">
                <h3 class="title_text text-white">Menu List</h3>
                <ul class="ul_li_block clearfix">
                    <li class="active dropdown">
                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>
                        <ul class="dropdown-menu">
                            <li><a href="index_1.html">Home Page V.1</a></li>
                            <li><a href="index_2.html">Home Page V.2</a></li>
                        </ul>
                    </li>
                    <li><a href="gallery.html">Our Cars</a></li>
                    <li><a href="review.html">Reviews</a></li>
                    <li><a href="about.html">About</a></li>
                    <li class="dropdown">
                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                        <ul class="dropdown-menu">
                            <li><a href="service.html">Our Service</a></li>
                            <li><a href="gallery.html">Car Gallery</a></li>
                            <li><a href="account.html">My Account</a></li>
                            <li><a href="reservation.html">Reservation</a></li>
                            <li class="dropdown">
                                <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blogs</a>
                                <ul class="dropdown-menu">
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog_details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Our Cars</a>
                                <ul class="dropdown-menu">
                                    <li><a href="car.html">Cars</a></li>
                                    <li><a href="car_details.html">Car Details</a></li>
                                </ul>
                            </li>
                            <li><a href="cart.html">Shopping Cart</a></li>
                            <li><a href="faq.html">F.A.Q.</a></li>
                            <li><a href="login.html">Login</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact Us</a>
                        <ul class="dropdown-menu">
                            <li><a href="contact.html">Contact Default</a></li>
                            <li><a href="contact_wordwide.html">Contact Wordwide</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="booking_car_form">
                <h3 class="title_text text-white mb-2">Book A Car</h3>
                <p class="mb_15">
                    Nullam id dolor auctor, dignissim magna eu, mattis ante. Pellentesque tincidunt, elit a facilisis efficitur.
                </p>
                <form action="#">
                    <div class="form_item">
                        <h4 class="input_title text-white">Pick Up Location</h4>
                        <div class="position-relative">
                            <input id="location_one" type="text" name="location" placeholder="City, State or Airport Code">
                            <label for="location_one" class="input_icon"><i class="fas fa-map-marker-alt"></i></label>
                        </div>
                    </div>
                    <div class="form_item">
                        <h4 class="input_title text-white">Pick A Date</h4>
                        <input type="date" name="date">
                    </div>
                    <button type="submit" class="custom_btn bg_default_red btn_width text-uppercase">Book A Car <img src="<?=DEFAULT_TEMPLATE_PATH?>/assets/images/icons/icon_01.png" alt="icon_not_found"></button>
                </form>
            </div>

        </div>
        <div class="overlay"></div>
    </div>
    <!-- mobile menu - end
    ================================================== -->




