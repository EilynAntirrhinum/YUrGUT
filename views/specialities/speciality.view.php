<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/components/header.php"; ?>

    <main id="main-speciality">
        <div id="speciality-container">
            <div id="speciality-container-inside-img-ls">
                <img src="/public/img/<?= $specialities->img ?>">
                <div>
                    <h3><?= $specialities->name ?></h3>
                    <p><?= $specialities->description ?></p>
                </div>
            </div>
        </div>
        <hr>
        <div class="info-and-exams-speciality">
            <div class="spec-info-block">
                <p><strong>Продолжительность обучения: </strong><?= $specialities->duration ?></p>
                <p><strong>Бюджетные места: </strong><?= $specialities->budget_places ?></p>
                <p><strong>Коммерческие места: </strong><?= $specialities->commerce_places ?></p>
                <p><strong>Стоимость обучения: </strong><?= $specialities->commerce_places ?></p>
            </div>

            <div class="req-exams">
                <strong>Необходимые экзамены: </strong>
                <ul>
                    <?php foreach ($exams as $exam): ?>
                        <li><?= $exam->name ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </main>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/components/footer.php"; ?>