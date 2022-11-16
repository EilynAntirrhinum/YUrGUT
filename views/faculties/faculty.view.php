<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/components/header.php"; ?>

    <main id="main-faculty">
        <div id="faculty-container">
            <div id="faculties-container-inside-img-ls">
                <img src="/public/img/<?= $faculty->img ?>">
                <div>
                    <h3><?= $faculty->name ?></h3>
                    <p><strong>Руководитель: </strong><?= $faculty->leadership ?></p>
                    <p class="description-spec"><?= $faculty->full_description ?></p>
                </div>
            </div>
            <div id="spec-by-fac">
                <h3>Специальности</h3>
                <ul>
                    <?php foreach ($specialities as $speciality): ?>
                        <li><a href="<?= $speciality->link ?>?submit=<?= $speciality->id ?>" class="a-sbf"
                               onmouseover="this.style.borderBottom='1px solid #f1a025'"
                               onmouseout="this.style.borderBottom='0'"><?= $speciality->name ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </main>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/components/footer.php"; ?>