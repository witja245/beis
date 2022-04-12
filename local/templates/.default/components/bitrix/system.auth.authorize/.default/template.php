<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<?
ShowMessage($arParams["~AUTH_RESULT"]);
ShowMessage($arResult['ERROR_MESSAGE']);
?>
<!-- register_section - start
        ================================================== -->

<section class="register_section sec_ptb_100 clearfix">
    <div class="container">
        <div class="register_card mb_60" data-bg-color="##F2F2F2" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="reg_image" data-aos="fade-up" data-aos-delay="300">
                        <img src="<?= DEFAULT_TEMPLATE_PATH ?>/assets/images/login.jpg" alt="image_not_found">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="reg_form" data-aos="fade-up" data-aos-delay="500">
                        <h3 class="form_title">Авторизоваться:</h3>
                        <p></p>
                        <span class="new_account mb_15">Войти или <a href="<?= $arResult["AUTH_REGISTER_URL"] ?>">Завести аккаунт?</a></span>

                        <form name="form_auth" method="post" target="_top" action="<?= $arResult["AUTH_URL"] ?>">

                            <input type="hidden" name="AUTH_FORM" value="Y"/>
                            <input type="hidden" name="TYPE" value="AUTH"/>
                            <? if ($arResult["BACKURL"] <> ''): ?>
                                <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
                            <? endif ?>
                            <?
                            foreach ($arResult["POST"] as $key => $value) {
                                ?>

                                <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
                                <?
                            }
                            ?>
                            <div class="form_item">
                                <input type="text" name="USER_LOGIN" placeholder="Логин" value="<?= $arResult["LAST_LOGIN"] ?>"/>
                            </div>

                            <div class="form_item">
                                <input type="password" placeholder="Пароль" name="USER_PASSWORD"/>
                                <? if ($arResult["SECURE_AUTH"]): ?>
                                    <span class="bx-auth-secure" id="bx_auth_secure"
                                          title="<? echo GetMessage("AUTH_SECURE_NOTE") ?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
                                    <noscript>
				<span class="bx-auth-secure" title="<? echo GetMessage("AUTH_NONSECURE_NOTE") ?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
                                    </noscript>
                                    <script type="text/javascript">
                                        document.getElementById('bx_auth_secure').style.display = 'inline-block';
                                    </script>
                                <? endif ?>

                            </div>
                            <? if ($arResult["CAPTCHA_CODE"]): ?>
                                <div class="field">
                                    <label class="field-title"><?= GetMessage("AUTH_CAPTCHA_PROMT") ?></label>
                                    <div class="form-input"><input type="text" name="captcha_word" maxlength="50"
                                                                   class="input-field"/></div>
                                    <p style="clear: left;"><input type="hidden" name="captcha_sid"
                                                                   value="<? echo $arResult["CAPTCHA_CODE"] ?>"/><img
                                                src="/bitrix/tools/captcha.php?captcha_sid=<? echo $arResult["CAPTCHA_CODE"] ?>"
                                                width="180" height="40" alt="CAPTCHA"/></p>
                                </div>
                            <? endif; ?>

                            <button type="submit" name="Login" class="custom_btn bg_default_red text-uppercase">
                                <?= GetMessage("AUTH_AUTHORIZE") ?>
                                <img src="<?= DEFAULT_TEMPLATE_PATH ?>/assets/images/icons/icon_01.png"
                                     alt="icon_not_found">
                            </button>
                            <?
                            if ($arParams["NOT_SHOW_LINKS"] != "Y") {
                                ?>
                                <noindex>
                                <span class="reset_pass mb_15">
                                    <a href="<?= $arResult["AUTH_FORGOT_PASSWORD_URL"] ?>" rel="nofollow">
                                        <?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?>
                                    </a>
                                </span>
                                </noindex><?
                            }
                            ?>

                            <?
                            if ($arResult["STORE_PASSWORD"] == "Y") {
                                ?>
                                <div class="checkbox_input mb-0">
                                    <label for="input_save">
                                        <input id="USER_REMEMBER" type="checkbox"  value="Y" for="USER_REMEMBER">
                                        <?= GetMessage("AUTH_REMEMBER_ME") ?>
                                    </label>
                                </div>

                                <?
                            }
                            ?>

                        </form>
                        <script type="text/javascript">
                            <?
                            if ($arResult["LAST_LOGIN"] <> '')
                            {
                            ?>
                            try {
                                document.form_auth.USER_PASSWORD.focus();
                            } catch (e) {
                            }
                            <?
                            }
                            else
                            {
                            ?>
                            try {
                                document.form_auth.USER_LOGIN.focus();
                            } catch (e) {
                            }
                            <?
                            }
                            ?>
                        </script>

                    </div>

                    <? if ($arResult["AUTH_SERVICES"]): ?>
                        <?
                        $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
                            array(
                                "AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
                                "CURRENT_SERVICE" => $arResult["CURRENT_SERVICE"],
                                "AUTH_URL" => $arResult["AUTH_URL"],
                                "POST" => $arResult["POST"],
                            ),
                            $component,
                            array("HIDE_ICONS" => "Y")
                        );
                        ?>
                    <? endif ?>

                </div>
            </div>
        </div>
    </div>

    <!-- register_section - end
    ================================================== -->

<!-- register_section - end
================================================== -->

