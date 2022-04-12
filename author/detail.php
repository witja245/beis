<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$id = $_GET[id];
$psUser = CUser::GetByID($id);
$apUser = $psUser->Fetch();


$user_photo = CFile::GetPath($apUser['PERSONAL_PHOTO']);
$age = '';
if (!empty($apUser['PERSONAL_BIRTHDAY'])) {
    $age = '(' . getAge($apUser['PERSONAL_BIRTHDAY']) . ')';
}

//printr($apUser);
$APPLICATION->SetTitle(""); ?>
<div class="car_section sec_ptb_100 clearfix">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">
            <div class="col-lg-12">
                <h3><?= $apUser['LAST_NAME'] ?> <?= $apUser['NAME'] ?> <?= $apUser['SECOND_NAME'] ?></h3>
            </div>
            <hr/>
            <div class="col-2 img">
                <?php if (!empty($apUser['PERSONAL_BIRTHDAY'])) { ?>
                    <img src="<?= $user_photo ?>" class="card-img"
                         alt="<?php echo $apUser['LAST_NAME'] . ' ' . $apUser['NAME'] . ' ' . $apUser['SECOND_NAME']; ?>">
                <?php } else { ?>
                    <img src="<?= DEFAULT_TEMPLATE_PATH ?>/assets/images/users/no-foto_users.jpg" class="card-img"
                         alt="<?php echo $apUser['LAST_NAME'] . ' ' . $apUser['NAME'] . '' . $apUser['SECOND_NAME']; ?>">
                <?php } ?>
            </div>
            <div class="col-10">
                <h4><?= $apUser['LAST_NAME'] ?> <?= $apUser['NAME'] ?> <?= $apUser['SECOND_NAME'] ?></h4>
                <p class="card-text">
                    <small class="text-muted">
                        <?= $apUser['PERSONAL_BIRTHDAY'] ?><?php echo $age; ?>
                    </small>
                </p>
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
            <hr/>
            <div style="width: 100%">

                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <a class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <b>Биография</b>
                                </a>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">
                               <?php echo htmlspecialchars_decode($apUser['UF_BIOGRAPHY']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <a class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    <b>Научная деятельность</b>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <?php echo htmlspecialchars_decode($apUser['UF_SCIENTIFIC_ACTIVITY']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <a class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                    <b>Педагогическая деятельность</b>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <?php echo htmlspecialchars_decode($apUser['UF_PEDAGOGICAL_ACTIVITY']); ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-header" id="headingFourth ">
                        <h5 class="mb-0">
                            <a class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                <b>Награды и премии</b>
                            </a>
                        </h5>
                    </div>
                    <div id="collapseFourth" class="collapse" aria-labelledby="headingFourth"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <?php echo htmlspecialchars_decode($apUser['UF_AWARDS_PRIZES']); ?>
                        </div>
                    </div>
                </div>

                </div>

            </div>
        </div>
    </div>
</div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
