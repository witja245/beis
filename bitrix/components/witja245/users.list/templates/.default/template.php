<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */

/** @var CBitrixComponent $component */

use Bitrix\Main\UI\Extension;

$this->addExternalJS($templateFolder . '/plagin/tablesort/dist/tablesort.min.js');


//printr($arResult['ITEMS']);
Extension::load('ui.bootstrap4');
$this->setFrameMode(true);

global $USER;
$user_id = $USER->GetID();
?>





<?php foreach ($arResult["ITEMS"] as $user): ?>
    <?php if ($user['ID'] != $user_id): ?>
        <div class="row feature_vehicle_item" data-aos="fade-up" data-aos-delay="100">
            <?php $user_photo = CFile::GetPath($user['PERSONAL_PHOTO']);
            $age = '';
            if (!empty($user['PERSONAL_BIRTHDAY'])) {
                $age = '(' . getAge($user['PERSONAL_BIRTHDAY']) . ')';
            }
            ?>
            <div class="col-md-3 img">
                <?php if (!empty($user['PERSONAL_BIRTHDAY'])) { ?>
                    <img src="<?= $user_photo ?>" class="card-img"
                         alt="<?php echo $user['LAST_NAME'] . ' ' . $user['NAME'] . ' ' . $user['SECOND_NAME']; ?>">
                <?php } else { ?>
                    <img src="<?= DEFAULT_TEMPLATE_PATH ?>/assets/images/users/no-foto_users.jpg" class="card-img"
                         alt="<?php echo $user['LAST_NAME'] . ' ' . $user['NAME'] . '' . $user['SECOND_NAME']; ?>">
                <?php } ?>
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h5 class="card-title"><a href="detail.php?id=<?= $user['ID'] ?>" style="color:#000;">
                            <?php echo $user['LAST_NAME'] . ' ' . $user['NAME'] . ' ' . $user['SECOND_NAME']; ?>
                        </a>
                    </h5>
                    <p class="card-text">
                        <small class="text-muted">
                            <?= $user['PERSONAL_BIRTHDAY'] ?><?php echo $age; ?>
                        </small>
                    </p>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional
                        content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="btn-group" role="group" aria-label="Third group">
                        <button type="button" class="btn btn-danger">Написать</button>
                    </div>
                    <div class="btn-group" role="group" aria-label="Third group">
                        <button type="button" class="btn btn-danger">В закладки</button>
                    </div>
                    <div class="btn-group" role="group" aria-label="Third group">
                        <button type="button" class="btn btn-danger">Подписаться</button>
                    </div>

                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>



<?php
echo $arResult['NAV_STRING'];
?>


