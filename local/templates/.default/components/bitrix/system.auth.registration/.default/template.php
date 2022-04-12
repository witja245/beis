<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if ($arResult["SHOW_SMS_FIELD"] == true) {
    CJSCore::Init('phone_auth');
}
?>

<!-- register_section - start
================================================== -->
<section class="register_section sec_ptb_100 clearfix">
    <div class="container">
        <div class="register_card mb-0" data-bg-color="##F2F2F2" data-aos="fade-up" data-aos-delay="100">
            <div class="section_title mb_30 text-center">
                <h2 class="title_text mb-0" data-aos="fade-up" data-aos-delay="300">
                    <span><?= GetMessage("AUTH_REGISTER") ?></span>
                </h2>
            </div>
            <?
            ShowMessage($arParams["~AUTH_RESULT"]);
            ?>
            <? if ($arResult["SHOW_EMAIL_SENT_CONFIRMATION"]): ?>
                <p><? echo GetMessage("AUTH_EMAIL_SENT") ?></p>
            <? endif; ?>

            <? if (!$arResult["SHOW_EMAIL_SENT_CONFIRMATION"] && $arResult["USE_EMAIL_CONFIRMATION"] === "Y"): ?>
                <p><? echo GetMessage("AUTH_EMAIL_WILL_BE_SENT") ?></p>
            <? endif ?>
            <noindex>

                <? if ($arResult["SHOW_SMS_FIELD"] == true): ?>

                    <form method="post" class="11111" action="<?= $arResult["AUTH_URL"] ?>" name="regform">
                        <input type="hidden" name="SIGNED_DATA"
                               value="<?= htmlspecialcharsbx($arResult["SIGNED_DATA"]) ?>"/>
                        <table class="data-table bx-registration-table">
                            <tbody>
                            <tr>
                                <td><span class="starrequired">*</span><? echo GetMessage("main_register_sms_code") ?>
                                </td>
                                <td><input size="30" type="text" name="SMS_CODE"
                                           value="<?= htmlspecialcharsbx($arResult["SMS_CODE"]) ?>" autocomplete="off"/>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="code_submit_button"
                                           value="<? echo GetMessage("main_register_sms_send") ?>"/></td>
                            </tr>
                            </tfoot>
                        </table>
                    </form>

                    <script>
                        new BX.PhoneAuth({
                            containerId: 'bx_register_resend',
                            errorContainerId: 'bx_register_error',
                            interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
                            data:
                                <?=CUtil::PhpToJSObject([
                                    'signedData' => $arResult["SIGNED_DATA"],
                                ])?>,
                            onError:
                                function (response) {
                                    var errorDiv = BX('bx_register_error');
                                    var errorNode = BX.findChildByClassName(errorDiv, 'errortext');
                                    errorNode.innerHTML = '';
                                    for (var i = 0; i < response.errors.length; i++) {
                                        errorNode.innerHTML = errorNode.innerHTML + BX.util.htmlspecialchars(response.errors[i].message) + '<br>';
                                    }
                                    errorDiv.style.display = '';
                                }
                        });
                    </script>

                    <div id="bx_register_error" style="display:none"><? ShowError("error") ?></div>

                    <div id="bx_register_resend"></div>

                <? elseif (!$arResult["SHOW_EMAIL_SENT_CONFIRMATION"]): ?>

                    <form method="post" class="22222" action="<?= $arResult["AUTH_URL"] ?>" name="bform"
                          enctype="multipart/form-data">
                        <input type="hidden" name="AUTH_FORM" value="Y"/>
                        <input type="hidden" name="TYPE" value="REGISTRATION"/>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="500">
                            <div class="form_item">
                                <h5><?= GetMessage("AUTH_NAME") ?><span class="text-danger">*</span></h5>
                                <input type="text" name="USER_NAME" maxlength="50" value="<?= $arResult["USER_NAME"] ?>"
                                       placeholder="<?= GetMessage("AUTH_NAME") ?>"/>
                            </div>
                            <div class="form_item">
                                <h5><?= GetMessage("AUTH_LAST_NAME") ?><span class="text-danger">*</span></h5>
                                <input type="text" name="USER_LAST_NAME" maxlength="50"
                                       value="<?= $arResult["USER_LAST_NAME"] ?>"
                                       placeholder="<?= GetMessage("AUTH_LAST_NAME") ?>"/>
                            </div>
                            <div class="form_item">
                                <h5><?= GetMessage("AUTH_SECOND_NAME") ?><span class="text-danger">*</span></h5>
                                <input type="text" name="USER_SECOND_NAME" maxlength="50"
                                       value="<?= $arResult["USER_SECOND_NAME"] ?>"
                                       placeholder="<?= GetMessage("AUTH_SECOND_NAME") ?>"/>
                            </div>
                            <div class="form_item">
                                <h5><?= GetMessage("AUTH_LOGIN_MIN") ?><span class="text-danger">*</span></h5>
                                <input type="text" name="USER_LOGIN" maxlength="50"
                                       value="<?= $arResult["USER_LOGIN"] ?>"
                                       placeholder="<?= GetMessage("AUTH_LOGIN_MIN") ?>"/>
                            </div>
                            <div class="form_item">
                                <h5><?= GetMessage("AUTH_PASSWORD_REQ") ?><span class="text-danger">*</span></h5>
                                <input type="password" name="USER_PASSWORD"
                                       placeholder="<?= GetMessage("AUTH_PASSWORD_REQ") ?>"
                                       value="<?= $arResult["USER_PASSWORD"] ?>"
                                       autocomplete="off"/>
                            </div>
                            <div class="form_item">
                                <h5><?= GetMessage("AUTH_LOGIN_MIN") ?><span class="text-danger">*</span></h5>
                                <input type="text" name="USER_LOGIN" maxlength="50"
                                       value="<?= $arResult["USER_LOGIN"] ?>"
                                       placeholder="<?= GetMessage("AUTH_LOGIN_MIN") ?>"/>
                            </div>
                        </div>

                               <span class="starrequired">*</span><?= GetMessage("AUTH_PASSWORD_REQ") ?>
                                <input type="password" name="USER_PASSWORD" maxlength="255"
                                           value="<?= $arResult["USER_PASSWORD"] ?>" class="bx-auth-input"
                                           autocomplete="off"/>
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


                        <span class="starrequired">*</span><?= GetMessage("AUTH_CONFIRM") ?>
                                <input type="password" name="USER_CONFIRM_PASSWORD" maxlength="255"
                                           value="<?= $arResult["USER_CONFIRM_PASSWORD"] ?>" class="bx-auth-input"
                                           autocomplete="off"/>


                            <? if ($arResult["EMAIL_REGISTRATION"]): ?>

                                    <? if ($arResult["EMAIL_REQUIRED"]): ?><span
                                                class="starrequired">*</span><? endif ?><?= GetMessage("AUTH_EMAIL") ?>

                                   <input type="text" name="USER_EMAIL" maxlength="255"
                                               value="<?= $arResult["USER_EMAIL"] ?>" class="bx-auth-input"/>

                            <? endif ?>

                            <? if ($arResult["PHONE_REGISTRATION"]): ?>

                                    <? if ($arResult["PHONE_REQUIRED"]): ?><span
                                                class="starrequired">*</span><? endif ?><? echo GetMessage("main_register_phone_number") ?>

                                    <input type="text" name="USER_PHONE_NUMBER" maxlength="255"
                                               value="<?= $arResult["USER_PHONE_NUMBER"] ?>" class="bx-auth-input"/>

                            <? endif ?>

                            <? // ********************* User properties ***************************************************?>
                            <? if ($arResult["USER_PROPERTIES"]["SHOW"] == "Y"): ?>
                                <?= trim($arParams["USER_PROPERTY_NAME"]) <> '' ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB") ?>

                                <? foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField): ?>
                                  <? if ($arUserField["MANDATORY"] == "Y"): ?>
                                        <span class="starrequired">*</span><?endif; ?>
                                    <?= $arUserField["EDIT_FORM_LABEL"] ?>:


                                            <? $APPLICATION->IncludeComponent(
                                                "bitrix:system.field.edit",
                                                $arUserField["USER_TYPE"]["USER_TYPE_ID"],
                                                array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "bform"), null, array("HIDE_ICONS" => "Y")); ?>

                                <? endforeach; ?>
                            <? endif; ?>
                            <? // ******************** /User properties ***************************************************

                            /* CAPTCHA */
                            if ($arResult["USE_CAPTCHA"] == "Y") {
                                ?>

                                <b><?= GetMessage("CAPTCHA_REGF_TITLE") ?></b>
                                <input type="hidden" name="captcha_sid"
                                       value="<?= $arResult["CAPTCHA_CODE"] ?>"/>
                                <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>"
                                     width="180" height="40" alt="CAPTCHA"/>
                                <span class="starrequired">*</span><?= GetMessage("CAPTCHA_REGF_PROMT") ?>:
                                <input type="text" name="captcha_word" maxlength="50" value=""
                                       autocomplete="off"/>
                                <?
                            }
                            /* CAPTCHA */
                            ?>

                            <? $APPLICATION->IncludeComponent("bitrix:main.userconsent.request", "",
                                array(
                                    "ID" => COption::getOptionString("main", "new_user_agreement", ""),
                                    "IS_CHECKED" => "Y",
                                    "AUTO_SAVE" => "N",
                                    "IS_LOADED" => "Y",
                                    "ORIGINATOR_ID" => $arResult["AGREEMENT_ORIGINATOR_ID"],
                                    "ORIGIN_ID" => $arResult["AGREEMENT_ORIGIN_ID"],
                                    "INPUT_NAME" => $arResult["AGREEMENT_INPUT_NAME"],
                                    "REPLACE" => array(
                                        "button_caption" => GetMessage("AUTH_REGISTER"),
                                        "fields" => array(
                                            rtrim(GetMessage("AUTH_NAME"), ":"),
                                            rtrim(GetMessage("AUTH_LAST_NAME"), ":"),
                                            rtrim(GetMessage("AUTH_LOGIN_MIN"), ":"),
                                            rtrim(GetMessage("AUTH_PASSWORD_REQ"), ":"),
                                            rtrim(GetMessage("AUTH_EMAIL"), ":"),
                                        )
                                    ),
                                )
                            ); ?>

                            <input type="submit" name="Register" value="<?= GetMessage("AUTH_REGISTER") ?>"/
                    </form>

                    <p><? echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"]; ?></p>
                    <p><span class="starrequired">*</span><?= GetMessage("AUTH_REQ") ?></p>

                    <p><a href="<?= $arResult["AUTH_AUTH_URL"] ?>" rel="nofollow"><b><?= GetMessage("AUTH_AUTH") ?></b></a>
                    </p>

                    <script type="text/javascript">
                        document.bform.USER_NAME.focus();
                    </script>

                <? endif ?>

            </noindex>
        </div>
    </div>
</section>
<!-- register_section - end
================================================== -->
