<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Авторы");
global $USER;
$obEnum = new \CUserFieldEnum;
$ACADEMY_CATEGORIES_ID = 28;
$ACADEMY_SCIENCES_ID = 27;
$ACADEMIC_TITLE_ID = 26;
$ACADEMIC_DEGREE_ID = 25;
$rsEnum_sciences = $obEnum->GetList(array(), array("USER_FIELD_ID" => $ACADEMY_SCIENCES_ID));

while ($arEnum = $rsEnum_sciences->Fetch()) {
    $academy_sciences[$arEnum["ID"]] = $arEnum["VALUE"];
}
$rsEnum_title = $obEnum->GetList(array(), array("USER_FIELD_ID" => $ACADEMIC_TITLE_ID));

while ($arEnum = $rsEnum_title->Fetch()) {
    $academy_title[$arEnum["ID"]] = $arEnum["VALUE"];
}
$rsEnum_degree = $obEnum->GetList(array(), array("USER_FIELD_ID" => $ACADEMIC_DEGREE_ID));

while ($arEnum = $rsEnum_degree->Fetch()) {
    $academy_degree[$arEnum["ID"]] = $arEnum["VALUE"];
}
$rsEnum_categories = $obEnum->GetList(array(), array("USER_FIELD_ID" => $ACADEMY_CATEGORIES_ID));

while ($arEnum = $rsEnum_categories->Fetch()) {
    $academy_categories[$arEnum["ID"]] = $arEnum["VALUE"];
}
if ($_GET['UF_ACADEMIC_DEGREE'] != 'Нет') {
    $value_degree = $_GET['UF_ACADEMIC_DEGREE'];
}
$fillter = array_diff($_GET, array(''));
printr($fillter);
$arrFilter = $fillter;

?>


<!-- author_section - start
            ================================================== -->
<div class="car_section sec_ptb_100 clearfix">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">
            <!--Фильтр-->
            <div class="col-lg-12">
                <aside class="filter_sidebar sidebar_section" data-bg-color="#F2F2F2">
                    <div class="sidebar_header" data-bg-gradient="linear-gradient(90deg, #0C0C0F, #292D45)">
                        <h3 class="text-white mb-0">Фильтр</h3>
                    </div>
                    <div class="sb_widget">
                        <form action="/author/index.php">
                            <div class="row sb_widget car_picking">
                                <div class="col-lg-4">
                                    <div class="form_item">
                                        <h4 class="input_title">Имя</h4>
                                        <div class="position-relative">
                                            <input id="location_two" type="text" name="NAME" placeholder="Имя">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form_item">
                                        <h4 class="input_title">Фамилия</h4>
                                        <div class="position-relative">
                                            <input id="location_two" type="text" name="LAST" placeholder="Фамилия">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form_item">
                                        <h4 class="input_title">Отчество</h4>
                                        <div class="position-relative">
                                            <input id="location_two" type="text" name="FIRST" placeholder="Отчество">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row sb_widget">
                                <div class="form_item col-lg-4">
                                    <h4 class="input_title">Ученая степень</h4>
                                    <select class="form-select mb-3" id="select" name="UF_ACADEMIC_DEGREE">
                                        <option data-display="Нет">Нет</option>
                                        <?php foreach ($academy_degree as $key => $degree): ?>
                                            <option value="<?= $key ?>" <?php if ($_GET['UF_ACADEMIC_DEGREE'] == $key) echo 'selected'; ?>>
                                                <?= $degree ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form_item col-lg-4">
                                    <h4 class="input_title">Ученое звание</h4>
                                    <select class="form-select  mb-3" id="select" name="UF_ACADEMIC_TITLE">
                                        <option data-display="Нет">Нет</option>
                                        <?php foreach ($academy_title as $key => $title): ?>
                                            <option value="<?= $key ?>" <?php if ($_GET['UF_ACADEMIC_TITLE'] == $key) echo 'selected'; ?>>
                                                <?= $title ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form_item col-lg-4">
                                    <h4 class="input_title">В академии наук</h4>
                                    <select class="form-select  mb-3" id="select" name="UF_ACADEMY_SCIENCES">
                                        <option data-display="Нет">Нет</option>
                                        <?php foreach ($academy_sciences as $key => $sciences): ?>
                                            <option value="<?= $key ?>" <?php if ($_GET['UF_ACADEMY_SCIENCES'] == $key) echo 'selected'; ?>>
                                                <?= $sciences ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>

                            <div class="row sb_widget">

                                <div class="form_item col-lg-12">
                                    <h4>Рубрика по Государственному рубрикатору научно-технической информации
                                        (ГРНТИ)
                                    </h4>
                                    <select class="form-select  mb-3" id="select" name="UF_CATEGORIES">
                                        <option data-display="Нет">Нет</option>
                                        <?php foreach ($academy_categories as $key => $categories): ?>
                                            <option value="<?= $key ?>" <?php if ($_GET['UF_CATEGORIES'] == $key) echo 'selected'; ?>>
                                                <?= $categories ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>

                            <div class="row sb_widget car_picking">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="checkbox_input">
                                            <label for="passengers_radio1">
                                                <input type="radio" value="1" id="passengers_radio1" name="passengers">
                                                Кандидат наук
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="checkbox_input">
                                            <label for="passengers_radio2">
                                                <input type="radio" value="2" id="passengers_radio2" name="passengers">
                                                Доктор наук
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="checkbox_input">
                                            <label for="passengers_radio3">
                                                <input type="radio" value="3" id="passengers_radio3" name="passengers">
                                                Рецензент
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row sb_widget car_picking">

                                <div class="form_item col-lg-12">
                                    <h4 class="input_title">Ключевые слова сферы научных интересов</h4>
                                    <div class="position-relative">
                                        <input id="location_two" type="text" name="NAME"
                                               placeholder="Ключевые слова сферы научных интересов">
                                    </div>
                                </div>
                            </div>

                            <hr data-aos="fade-up" data-aos-delay="100">

                            <div data-aos="fade-up" data-aos-delay="100">
                                <button type="submit" class="custom_btn bg_default_red text-uppercase">Применить фильтр
                                    <img
                                            src="<?= DEFAULT_TEMPLATE_PATH ?>/assets/images/icons/icon_01.png"
                                            alt="icon_not_found"></button>
                            </div>
                        </form>
                    </div>
                </aside>
            </div>
            <!--Список авторов-->
            <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
                <? $APPLICATION->IncludeComponent(
                    "witja245:users.list",
                    ".default",
                    array(
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "DISPLAY_DATE" => "Y",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "MESSAGE_404" => "",
                        "SET_STATUS_404" => "N",
                        "SHOW_404" => "N",
                        "USERS_COUNT" => "3",
                        "FILTER" => $arrFilter,
                        "USERS_PAGINATION" => "beis_pagination",
                        "COMPONENT_TEMPLATE" => ".default"
                    ),
                    false
                ); ?>
            </div>
        </div>
    </div>
</div>

<!-- author_section - end
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
