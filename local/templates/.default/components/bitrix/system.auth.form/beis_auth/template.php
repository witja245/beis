<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init();
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
                        <h3 class="form_title">Авторизоваться</h3>
                        <hr>
                        <? if ($arResult["NEW_USER_REGISTRATION"] == "Y"): ?>
                            <noindex>
                                <span class="new_account mb_15">
                                    Войти или
                                    <a href="<?= $arResult["AUTH_REGISTER_URL"] ?>" rel="nofollow"><?= GetMessage("AUTH_REGISTER") ?></a>
                                </span>
                            </noindex>
                        <? endif ?>
                        <?
                        if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
                            ShowMessage($arResult['ERROR_MESSAGE']);
                        ?>

                        <? if ($arResult["FORM_TYPE"] == "login"): ?>

                            <form class="1111" name="system_auth_form<?= $arResult["RND"] ?>" method="post"
                                  target="_top"
                                  action="<?= $arResult["AUTH_URL"] ?>">
                                <? if ($arResult["BACKURL"] <> ''): ?>
                                    <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
                                <? endif ?>
                                <? foreach ($arResult["POST"] as $key => $value): ?>
                                    <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
                                <? endforeach ?>
                                <input type="hidden" name="AUTH_FORM" value="Y"/>
                                <input type="hidden" name="TYPE" value="AUTH"/>
                                <div class="form_item">
                                    <h5><?= GetMessage("AUTH_LOGIN") ?>:</h5>
                                    <input type="text" name="USER_LOGIN" placeholder="<?= GetMessage("AUTH_LOGIN") ?>"
                                           value=""/>
                                    <script>
                                        BX.ready(function () {
                                            var loginCookie = BX.getCookie("<?=CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"])?>");
                                            if (loginCookie) {
                                                var form = document.forms["system_auth_form<?=$arResult["RND"]?>"];
                                                var loginInput = form.elements["USER_LOGIN"];
                                                loginInput.value = loginCookie;
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="form_item">
                                    <h5><?= GetMessage("AUTH_PASSWORD") ?>:</h5>
                                    <input type="password" name="USER_PASSWORD"
                                           placeholder="<?= GetMessage("AUTH_PASSWORD") ?>"
                                           autocomplete="off"/>
                                    <? if ($arResult["SECURE_AUTH"]): ?>
                                        <span class="bx-auth-secure" id="bx_auth_secure<?= $arResult["RND"] ?>"
                                              title="<? echo GetMessage("AUTH_SECURE_NOTE") ?>"
                                              style="display:none">
                                            <div class="bx-auth-secure-icon"></div>
                                        </span>
                                        <noscript>
                                            <span class="bx-auth-secure"
                                                  title="<? echo GetMessage("AUTH_NONSECURE_NOTE") ?>">
                                                <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
                                            </span>
                                        </noscript>
                                        <script type="text/javascript">
                                            document.getElementById('bx_auth_secure<?=$arResult["RND"]?>').style.display = 'inline-block';
                                        </script>
                                    <? endif ?>
                                </div>

                                <? if ($arResult["CAPTCHA_CODE"]): ?>
                                    <div class="form_item">
                                        <? echo GetMessage("AUTH_CAPTCHA_PROMT") ?>:<br/>
                                        <input type="hidden" name="captcha_sid"
                                               value="<? echo $arResult["CAPTCHA_CODE"] ?>"/>
                                        <img src="/bitrix/tools/captcha.php?captcha_sid=<? echo $arResult["CAPTCHA_CODE"] ?>"
                                             width="180" height="40" alt="CAPTCHA"/><br/><br/>
                                    </div>
                                <? endif ?>
                                <button type="submit" name="Login" class="custom_btn bg_default_red text-uppercase">
                                    <?= GetMessage("AUTH_LOGIN_BUTTON") ?>
                                    <img src="<?= DEFAULT_TEMPLATE_PATH ?>/assets/images/icons/icon_01.png" alt="icon_not_found">
                                </button>
                                <noindex>
                                    <span class="reset_pass mb_15">
                                        <a href="<?= $arResult["AUTH_FORGOT_PASSWORD_URL"] ?>" rel="nofollow">
                                            <?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?>
                                        </a>
                                    </span>
                                </noindex>
                                <? if ($arResult["STORE_PASSWORD"] == "Y"): ?>
                                    <div class="checkbox_input mb-2">
                                        <label for="input_save">
                                            <input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER"
                                                   value="Y"/>
                                            <? echo GetMessage("AUTH_REMEMBER_SHORT") ?>
                                        </label>
                                    </div>

                                <? endif ?>

                                <? if ($arResult["AUTH_SERVICES"]): ?>
                                    <tr>
                                        <td colspan="2">
                                            <div class="bx-auth-lbl"><?= GetMessage("socserv_as_user_form") ?></div>
                                            <?
                                            $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "icons",
                                                array(
                                                    "AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
                                                    "SUFFIX" => "form",
                                                ),
                                                $component,
                                                array("HIDE_ICONS" => "Y")
                                            );
                                            ?>
                                        </td>
                                    </tr>
                                <? endif ?>
                                </table>
                            </form>

                            <? if ($arResult["AUTH_SERVICES"]): ?>
                                <?
                                $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
                                    array(
                                        "AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
                                        "AUTH_URL" => $arResult["AUTH_URL"],
                                        "POST" => $arResult["POST"],
                                        "POPUP" => "Y",
                                        "SUFFIX" => "form",
                                    ),
                                    $component,
                                    array("HIDE_ICONS" => "Y")
                                );
                                ?>
                            <? endif ?>

                        <?
                        elseif ($arResult["FORM_TYPE"] == "otp"):
                            ?>

                            <form class="22222" name="system_auth_form<?= $arResult["RND"] ?>" method="post"
                                  target="_top"
                                  action="<?= $arResult["AUTH_URL"] ?>">
                                <? if ($arResult["BACKURL"] <> ''): ?>
                                    <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
                                <? endif ?>
                                <input type="hidden" name="AUTH_FORM" value="Y"/>
                                <input type="hidden" name="TYPE" value="OTP"/>
                                <table width="95%">
                                    <tr>
                                        <td colspan="2">
                                            <? echo GetMessage("auth_form_comp_otp") ?><br/>
                                            <input type="text" name="USER_OTP" maxlength="50" value="" size="17"
                                                   autocomplete="off"/>
                                        </td>
                                    </tr>
                                    <? if ($arResult["CAPTCHA_CODE"]): ?>
                                        <tr>
                                            <td colspan="2">
                                                <? echo GetMessage("AUTH_CAPTCHA_PROMT") ?>:<br/>
                                                <input type="hidden" name="captcha_sid"
                                                       value="<? echo $arResult["CAPTCHA_CODE"] ?>"/>
                                                <img src="/bitrix/tools/captcha.php?captcha_sid=<? echo $arResult["CAPTCHA_CODE"] ?>"
                                                     width="180" height="40" alt="CAPTCHA"/><br/><br/>
                                                <input type="text" name="captcha_word" maxlength="50" value=""/></td>
                                        </tr>
                                    <? endif ?>
                                    <? if ($arResult["REMEMBER_OTP"] == "Y"): ?>
                                        <tr>
                                            <td valign="top"><input type="checkbox" id="OTP_REMEMBER_frm"
                                                                    name="OTP_REMEMBER"
                                                                    value="Y"/></td>
                                            <td width="100%"><label for="OTP_REMEMBER_frm"
                                                                    title="<? echo GetMessage("auth_form_comp_otp_remember_title") ?>"><? echo GetMessage("auth_form_comp_otp_remember") ?></label>
                                            </td>
                                        </tr>
                                    <? endif ?>
                                    <tr>
                                        <td colspan="2"><input type="submit" name="Login"
                                                               value="<?= GetMessage("AUTH_LOGIN_BUTTON") ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <noindex><a href="<?= $arResult["AUTH_LOGIN_URL"] ?>"
                                                        rel="nofollow"><? echo GetMessage("auth_form_comp_auth") ?></a>
                                            </noindex>
                                            <br/></td>
                                    </tr>
                                </table>
                            </form>

                        <?
                        else:
                            ?>

                            <form class="3333" action="<?= $arResult["AUTH_URL"] ?>">
                                <table width="95%">
                                    <tr>
                                        <td align="center">
                                            <?= $arResult["USER_NAME"] ?><br/>
                                            [<?= $arResult["USER_LOGIN"] ?>]<br/>
                                            <a href="<?= $arResult["PROFILE_URL"] ?>"
                                               title="<?= GetMessage("AUTH_PROFILE") ?>"><?= GetMessage("AUTH_PROFILE") ?></a><br/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <? foreach ($arResult["GET"] as $key => $value): ?>
                                                <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
                                            <? endforeach ?>
                                            <?= bitrix_sessid_post() ?>
                                            <input type="hidden" name="logout" value="yes"/>
                                            <input type="submit" name="logout_butt"
                                                   value="<?= GetMessage("AUTH_LOGOUT_BUTTON") ?>"/>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        <? endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
