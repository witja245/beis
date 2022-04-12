<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 * @global CUser $USER
 * @global CMain $APPLICATION
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if ($arResult["SHOW_SMS_FIELD"] == true) {
    CJSCore::Init('phone_auth');
}
?>
<!-- register_section - start
			================================================== -->
<section class="register_section sec_ptb_100 clearfix">
    <div class="container">


        <div class="register_card mb-0" data-bg-color="##F2F2F2" data-aos="fade-up" data-aos-delay="100">


            <? if ($USER->IsAuthorized()): ?>

                <p><? echo GetMessage("MAIN_REGISTER_AUTH") ?></p>

            <? else: ?>
            <?
            if (count($arResult["ERRORS"]) > 0):
                foreach ($arResult["ERRORS"] as $key => $error)
                    if (intval($key) == 0 && $key !== 0)
                        $arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;" . GetMessage("REGISTER_FIELD_" . $key) . "&quot;", $error);

                ShowError(implode("<br />", $arResult["ERRORS"]));

            elseif ($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
            ?>
                <p><? echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT") ?></p>
            <? endif ?>

            <? if ($arResult["SHOW_SMS_FIELD"] == true): ?>

                <form method="post" action="<?= POST_FORM_ACTION_URI ?>" name="regform">
                    <?
                    if ($arResult["BACKURL"] <> ''):
                        ?>
                        <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
                    <?
                    endif;
                    ?>
                    <input type="hidden" name="SIGNED_DATA"
                           value="<?= htmlspecialcharsbx($arResult["SIGNED_DATA"]) ?>"/>
                    <table>
                        <tbody>
                        <tr>
                            <td><? echo GetMessage("main_register_sms") ?><span class="text-danger">*</span></td>
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

            <? else: ?>
                <div class="section_title mb_30 text-center">
                    <h2 class="title_text mb-0" data-aos="fade-up" data-aos-delay="300">
                        <span><? echo GetMessage("AUTH_REGISTER") ?></span>
                    </h2>
                </div>
                <form method="post" action="<?= POST_FORM_ACTION_URI ?>" name="regform" enctype="multipart/form-data">
                    <div class="row justify-content-lg-between">
                        <?
                        if ($arResult["BACKURL"] <> ''):
                            ?>
                            <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
                        <?
                        endif;
                        ?>
                        <?php
                        $count_field = count($arResult["SHOW_FIELDS"]);
                        $half_summ = round($count_field / 2);
                        $two_fields = array_chunk($arResult["SHOW_FIELDS"], $half_summ);
                        //printr($two_fields);

                        ?>
                        <?php foreach ($two_fields as $fields): ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 aos-init aos-animate" data-aos="fade-up"
                                 data-aos-delay="500">
                                <? foreach ($fields as $key => $FIELD): ?>

                                    <? if ($FIELD == "AUTO_TIME_ZONE" && $arResult["TIME_ZONE_ENABLED"] == true): ?>

                                        <? echo GetMessage("main_profile_time_zones_auto") ?>

                                        <? if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"): ?>
                                            <span class="text-danger">*</span>
                                        <? endif ?>
                                        <select name="REGISTER[AUTO_TIME_ZONE]"
                                                onchange="this.form.elements['REGISTER[TIME_ZONE]'].disabled=(this.value != 'N')">
                                            <option value="">
                                                <? echo GetMessage("main_profile_time_zones_auto_def") ?>
                                            </option>
                                            <option value="Y"<?= $arResult["VALUES"][$FIELD] == "Y" ? " selected=\"selected\"" : "" ?>>
                                                <? echo GetMessage("main_profile_time_zones_auto_yes") ?>
                                            </option>
                                            <option value="N"<?= $arResult["VALUES"][$FIELD] == "N" ? " selected=\"selected\"" : "" ?>>
                                                <? echo GetMessage("main_profile_time_zones_auto_no") ?>
                                            </option>
                                        </select>
                                        <? echo GetMessage("main_profile_time_zones_zones") ?>
                                        <select name="REGISTER[TIME_ZONE]"<? if (!isset($_REQUEST["REGISTER"]["TIME_ZONE"])) echo 'disabled="disabled"' ?>>
                                            <? foreach ($arResult["TIME_ZONE_LIST"] as $tz => $tz_name): ?>
                                                <option value="<?= htmlspecialcharsbx($tz) ?>"
                                                    <?= $arResult["VALUES"]["TIME_ZONE"] == $tz ? " selected=\"selected\"" : "" ?>>
                                                    <?= htmlspecialcharsbx($tz_name) ?>
                                                </option>
                                            <? endforeach ?>
                                        </select>
                                    <? else: ?>

                                        <? switch ($FIELD) {
                                            case "PASSWORD": ?>
                                                <div class=" form_item">
                                                    <h5><?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>:
                                                        <? if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"): ?>
                                                            <span class="text-danger">*</span>
                                                        <? endif ?>
                                                    </h5>
                                                    <input type="password" name="REGISTER[<?= $FIELD ?>]"
                                                           value="<?= $arResult["VALUES"][$FIELD] ?>" autocomplete="off"
                                                           placeholder="<?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>"
                                                    />
                                                    <? if ($arResult["SECURE_AUTH"]): ?>
                                                        <span class="bx-auth-secure" id="bx_auth_secure"
                                                              title="<? echo GetMessage("AUTH_SECURE_NOTE") ?>"
                                                              style="display:none"
                                                        >
                                            <div class="bx-auth-secure-icon"></div>
                                        </span>
                                                        <noscript>
				                            <span class="bx-auth-secure"
                                                  title="<? echo GetMessage("AUTH_NONSECURE_NOTE") ?>">
					                            <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				                            </span>
                                                        </noscript>
                                                        <script type="text/javascript">
                                                            document.getElementById('bx_auth_secure').style.display = 'inline-block';
                                                        </script>
                                                    <? endif ?>
                                                </div>
                                                <? break;
                                            case "CONFIRM_PASSWORD": ?>
                                                <div class=" form_item">
                                                    <h5><?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>:
                                                        <? if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"): ?>
                                                            <span class="text-danger">*</span>
                                                        <? endif ?>
                                                    </h5>
                                                    <input type="password" name="REGISTER[<?= $FIELD ?>]"
                                                           value="<?= $arResult["VALUES"][$FIELD] ?>"
                                                           autocomplete="off"
                                                           placeholder="<?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>"
                                                    />
                                                </div>

                                                <? break;
                                            case "PERSONAL_GENDER": ?>
                                                <div class="form-group">
                                                    <h5><?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>:</h5>
                                                    <select class="form-control" id="select"
                                                            name="REGISTER[<?= $FIELD ?>]">
                                                        <option value=""><?= GetMessage("USER_DONT_KNOW") ?></option>
                                                        <option value="M"<?= $arResult["VALUES"][$FIELD] == "M" ? " selected=\"selected\"" : "" ?>>
                                                            <?= GetMessage("USER_MALE") ?>
                                                        </option>
                                                        <option value="F"<?= $arResult["VALUES"][$FIELD] == "F" ? " selected=\"selected\"" : "" ?>>
                                                            <?= GetMessage("USER_FEMALE") ?>
                                                        </option>
                                                    </select>
                                                </div>

                                                <? break;
                                            case "PERSONAL_COUNTRY":
                                            case "WORK_COUNTRY": ?>
                                                <div class="form-group">
                                                    <h5><?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>:</h5>
                                                    <select class="form-control" id="select"
                                                            name="REGISTER[<?= $FIELD ?>]">
                                                        <?
                                                        foreach ($arResult["COUNTRIES"]["reference_id"] as $key => $value) {
                                                            ?>
                                                            <option value="<?= $value ?>"
                                                                <? if ($value == $arResult["VALUES"][$FIELD]): ?>
                                                                    selected="selected"<? endif ?>
                                                            >
                                                                <?= $arResult["COUNTRIES"]["reference"][$key] ?>
                                                            </option>
                                                            <?
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <?
                                                break;

                                            case "PERSONAL_PHOTO":
                                            case "WORK_LOGO":
                                                ?>
                                                <div class="form-group">
                                                    <h5><?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>:</h5>
                                                    <input type="file" class="form-control-file btn btn-light"
                                                           name="REGISTER_FILES_<?= $FIELD ?>">
                                                </div>
                                                <?
                                                break;
                                            case "PERSONAL_NOTES":
                                            case "WORK_NOTES":
                                                ?>
                                                <div class="form_item">
                                                    <h5><?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>:</h5>
                                                    <textarea name="REGISTER[<?= $FIELD ?>]">
                                                        <?= $arResult["VALUES"][$FIELD] ?>
                                                    </textarea>
                                                </div>

                                                <?
                                                break;
                                            default:
                                                ?>
                                                <? if ($FIELD != "PERSONAL_BIRTHDAY"): ?>
                                                <div class="form_item">
                                                    <h5><?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>:</h5>
                                                    <input type="text" name="REGISTER[<?= $FIELD ?>]"
                                                           value="<?= $arResult["VALUES"][$FIELD] ?>"
                                                           placeholder="<?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>"
                                                    />
                                                </div>
                                            <?php endif; ?>


                                                <? if ($FIELD == "PERSONAL_BIRTHDAY"): ?>
                                                <div class="form_item">
                                                    <h5><?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>:</h5>
                                                    <input type="date" name="REGISTER[<?= $FIELD ?>]"
                                                           value="<?= $arResult["VALUES"][$FIELD] ?>"
                                                           placeholder="<?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>"
                                                    />
                                                </div>
                                            <?php endif; ?><?
                                        } ?>
                                    <? endif ?>
                                <? endforeach ?>
                            </div>
                        <?php endforeach; ?>

                        <? // ********************* User properties ***************************************************?>

                        <? if ($arResult["USER_PROPERTIES"]["SHOW"] == "Y"): ?>

                            <?php
                            $count_field_users = count($arResult["USER_PROPERTIES"]["DATA"]);
                            $half_summ_users = round($count_field_users / 2);
                            $two_fields_users = array_chunk($arResult["USER_PROPERTIES"]["DATA"], $half_summ_users);

                            ?>
                            <?php foreach ($two_fields_users as $USER_PROPERTIES): ?>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 aos-init aos-animate" data-aos="fade-up"
                                     data-aos-delay="500">
                                    <? foreach ($USER_PROPERTIES as $FIELD_NAME => $arUserField): ?>
                                        <div class="form-group">
                                            <h5><?= $arUserField["EDIT_FORM_LABEL"] ?>
                                                :<? if ($arUserField["MANDATORY"] == "Y"): ?>
                                                    <span class="text-danger">*</span>
                                                <? endif; ?></h5>

                                            <? $APPLICATION->IncludeComponent(
                                                "bitrix:system.field.edit",
                                                $arUserField["USER_TYPE"]["USER_TYPE_ID"],
                                                array("bVarsFromForm" => $arResult["bVarsFromForm"],
                                                    "arUserField" => $arUserField, "form_name" => "regform"), null, array("HIDE_ICONS" => "Y"));
                                            ?>
                                        </div>
                                    <? endforeach; ?>
                                </div>
                            <?php endforeach;?>

                        <? endif; ?>
                        <? // ******************** /User properties ***************************************************?>
                        <?
                        /* CAPTCHA */
                        if ($arResult["USE_CAPTCHA"] == "Y") {
                            ?>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 aos-init aos-animate" data-aos="fade-up"
                             data-aos-delay="500">
                            <div class="form-group">
                                <h5><?= GetMessage("REGISTER_CAPTCHA_TITLE") ?></h5>
                                <input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>"/>
                                <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>"
                                     width="180" height="40" alt="CAPTCHA"/>
                            </div>
                            <div class="form-group">
                                <h5><?= GetMessage("REGISTER_CAPTCHA_PROMT") ?>:<span class="text-danger">*</span></h5>
                                <input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off"/>
                            </div>

                        </div>
                            <?
                        }
                        /* !CAPTCHA */
                        ?>
                        <input type="submit" name="register_submit_button" class="custom_btn bg_default_red text-uppercase mb-0"
                               value="<?=GetMessage("AUTH_REGISTER")?>" />
                    </div>
                </form>

                <p><? echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"]; ?></p>

            <? endif //$arResult["SHOW_SMS_FIELD"] == true ?>

                <p><span class="text-danger">*</span><?= GetMessage("AUTH_REQ") ?></p>

            <? endif ?>
        </div>


    </div>
</section>
<!-- register_section - end
================================================== -->
