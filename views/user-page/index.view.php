<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/components/header.php"; ?>

<main id="main-user">
    <div id="user-info-cabinet">
        <div id="personal-user-info">
            <img src="/public/img/statement/<?= $personalInfo->img ?>"
                 alt="Изображение студента">

            <div class="student-info">
                <div id="user-names">
                    <p><?= $personalInfo->surname ?></p>
                    <p><?= $personalInfo->name ?></p>
                    <p><?= $personalInfo->patronymic ?></p>
                </div>

<!--                <p id="score-user">Всего баллов: --><?//= $personalInfo->score ?><!-- баллов</p>-->

                <form method="post" id="form-buttons">
                    <button type="submit" name="edit-user-info" id="edit-user-info">Редактировать данные</button>
                    <button type="submit" id="exit" name="exit">Выйти</button>
                </form>

                <div id="form-link-stmt">
                    <a href="/app/controllers/statement/choose-spec.php" class="link-stmt link-new-stmt">ПОДАТЬ ЗАЯВЛЕНИЕ</a>
                </div>

                <div id="form-link-lists">
                    <a href="/app/controllers/lists/" class="link-stmt link-lists">ПОСМОТРЕТЬ СПИСКИ</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-wrapper-edit hide">
        <div class="modal-window-edit">
            <span class="close-modal-edit">&times;</span>
            <form method="POST" id="form-edit" enctype="multipart/form-data">
                <h3>Редактирование личной информации</h3>
                <div id="flex-container-edit">
                    <div id="flex-container-1">
                        <div>
                            <label for="name">Имя</label>
                            <input type="text"
                                   name="name"
                                   id="name"
                                   placeholder="Введите имя"
                                   pattern="[А-Я]{1}[а-я]{,50}"
                                   required>
                        </div>
                        <div>
                            <label for="surname">Фамилия</label>
                            <input type="text"
                                   name="surname"
                                   id="surname"
                                   placeholder="Введите фамилию"
                                   pattern="[А-Я]{1}[а-я]{,50}"
                                   required>
                        </div>
                        <div>
                            <label for="patronymic">Отчество</label>
                            <input type="text"
                                   name="patronymic"
                                   id="patronymic"
                                   placeholder="Введите отчество"
                                   pattern="[А-Я]{1}[а-я]{,50}"
                                   required>
                        </div>
                        <div>
                            <label for="num-phone">Номер телефона</label>
                            <input type="text"
                                   name="num-phone"
                                   id="num-phone"
                                   placeholder="Введите номер телефона"
                                   required>
                        </div>
                        <div>
                            <label for="num-certif">Номер аттестата</label>
                            <input type="text"
                                   name="num-certif"
                                   id="num-certif"
                                   placeholder="Введите номер аттестата"
                                   required>
                        </div>
                        <div>
                            <label for="school">Название школы</label>
                            <input type="text"
                                   name="school"
                                   id="school"
                                   placeholder="Введите название школы"
                                   pattern="[А-Я]{1}[а-я]{,100}"
                                   required>
                        </div>
                        <div>
                            <label for="date-birth">Дата рождения</label>
                            <input type="date"
                                   name="date-birth"
                                   id="date-birth"
                                   required>
                        </div>
                        <div>
                            <label for="address">Адресс проживания</label>
                            <input type="text"
                                   name="address"
                                   id="address"
                                   placeholder="Введите адрес проживания"
                                   required>
                        </div>
                    </div>


                    <div id="flex-container-2">
                        <div id="uploading-photo">
                            <label class="img-loading">Загрузить новое изображение
                                <input type="file"
                                       name="img-edit"
                                       id="load-img-edit"
                                       accept="image/png, image/jpg, image/jpeg">
                            </label>
                            <div>
                                <img src="" id="loaded-img-edit"
                                alt="Фотография студента">
                            </div>
                        </div>
                        <div>
                            <label for="passport-num">Номер паспорта</label>
                            <input type="number"
                                   name="passport-num"
                                   id="passport-num"
                                   placeholder="Введите номер паспорта"
                                   required>
                        </div>
                        <div>
                            <label for="passport-series">Серия паспорта</label>
                            <input type="number"
                                   name="passport-series"
                                   id="passport-series"
                                   placeholder="Введите серию паспорта"
                                   required>
                        </div>
                        <div>
                            <label for="passport-get-by">Кем выдан паспорт</label>
                            <input type="text"
                                   name="passport-get-by"
                                   id="passport-get-by"
                                   placeholder="Введите кем выдан паспорт"
                                   required>
                        </div>
                        <div>
                            <label for="date-passport">Дата выдачи паспорта</label>
                            <input type="date"
                                   name="date-passport"
                                   id="date-passport"
                                   placeholder="Введите дату выдачи паспорта"
                                   required>
                        </div>
                    </div>
                </div>
                <button type="submit"
                        name="update-submit"
                        value=""
                        class="update-btn">Сохранить
                </button>
            </form>
        </div>
    </div>
</main>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/components/footer.php"; ?>

<script src="/public/js/fetch.js"></script>
<script src="/public/js/user-page/modal-window.js"></script>
<script src="/public/js/user-page/set-img.js"></script>
<script src="/public/js/user-page/set-info.js"></script>
<!--<script src="/public/js/connect-mask.js"></script>-->
<!--<script src="/public/js/masks.js"></script>-->
