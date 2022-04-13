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
$name = $apUser['LAST_NAME'] . ' ' . $apUser['NAME'] . ' ' . $apUser['SECOND_NAME'];
//printr($apUser);
$APPLICATION->SetTitle($name); ?>
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
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <a class="accordion-button" type="button" data-bs-toggle="collapse"
                               data-bs-target="#panelsStayOpen-collapseOne"
                               aria-expanded="true"
                               aria-controls="panelsStayOpen-collapseOne"
                            >
                                Биография
                            </a>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                             aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <?php echo htmlspecialchars_decode($apUser['UF_BIOGRAPHY']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                               data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                               aria-controls="panelsStayOpen-collapseTwo">
                                Научная деятельность
                            </a>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                             aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <?php echo htmlspecialchars_decode($apUser['UF_SCIENTIFIC_ACTIVITY']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                               data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                               aria-controls="panelsStayOpen-collapseThree">
                                Педагогическая деятельность
                            </a>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                             aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <?php echo htmlspecialchars_decode($apUser['UF_PEDAGOGICAL_ACTIVITY']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                               data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                               aria-controls="panelsStayOpen-collapseThree">
                                Награды и премии
                            </a>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                             aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <?php echo htmlspecialchars_decode($apUser['UF_AWARDS_PRIZES']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
