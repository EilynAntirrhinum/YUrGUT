<?php include $_SERVER["DOCUMENT_ROOT"] . "/admin/views/components/header.php"; ?>

<main id="main-stud-stmt">
    <div id="container-stud-stmt">
          <h3>Заявление на специальность – <?= $stmtName->name ?></h3>
        <div class="stud-stmt-item">
            <div class="personal-info-stmt">
                <div class="names-div">
                    <img src="/public/img/statement/<?= $perInfo->img ?>"
                         alt="Изображение абитуриента"
                         class="student-img-table">

                    <div>
                        <p><strong> Фамилия: </strong> <?= $perInfo->surname ?></p>
                        <p><strong> Имя: </strong> <?= $perInfo->name ?></p>
                        <p><strong>Отчество:</strong> <?= $perInfo->patronymic ?></p>
                        <p><strong>Всего баллов: </strong><?= $perInfo->score ?></p>
                    </div>
                </div>
                <hr>
                <div class="other-info-stmt">
                    <p><strong>Номер аттестата: </strong><?= $perInfo->num_certif ?></p>
                    <p><strong>Школа:</strong> <?= $perInfo->school ?></p>
                    <p><strong>Дата рождения:</strong> <?= $perInfo->date_birth ?></p>
                    <p><strong>Адрес: </strong><?= $perInfo->address ?></p>
                    <p><strong>Номер телефона: </strong><?= $perInfo->num_phone ?></p>
                    <p><strong>Номер паспорта: </strong><?= $perInfo->passport_num ?></p>
                    <p><strong>Серия паспорта:</strong> <?= $perInfo->passport_series ?></p>
                    <p><strong>Кем выдан паспорт: </strong><?= $perInfo->passport_get_by ?></p>
                    <p><strong>Дата выдачи паспорта: </strong> <?= $perInfo->date_passport ?></p>
                </div>

                <hr>
                <h3>Экзамены и дополнительные баллы</h3>
                <div class="exams-results">
                    <div class="exams-stmt-info">
                        <?php foreach ($examsInfo as $exam): ?>
                            <div>
                                <p><strong><?= $exam->name ?>:&nbsp; </strong></p>
                                <p><?= $exam->score ?> баллов</p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="bonuses-stmt-info">
                        <?php foreach ($bonusesInfo as $bonus): ?>
                            <div>
                                <p><strong><?= $bonus->name ?>:&nbsp; </strong></p>
                                <p><?= $bonus->score ?> баллов</p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

