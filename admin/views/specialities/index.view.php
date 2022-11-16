<?php include $_SERVER["DOCUMENT_ROOT"] . "/admin/views/components/header.php"; ?>

<main id="main-specs">
    <div class="flex-box-admin">
        <h3><?= $facName->name ?></h3>
        <button name="add-spec" id="add-spec">Добавить специальность</button>
    </div>
    <div id="container-specs">
        <?php foreach ($specialities as $speciality) : ?>
            <div class="spec-item">
                <p><?= $speciality->name ?></p>
                <form class="spec-buttons" method="POST">
                    <button name="exams-submit"
                            class="control-buttons exams-btn"
                            value="<?= $speciality->id ?>">
                        Экзамены
                    </button>
                    <button name="edit-submit"
                            class="control-buttons main-control-buttons edit-btn"
                            value="<?= $speciality->id ?>">
                        &#9998;
                    </button>
                    <button name="del-submit"
                            class="control-buttons main-control-buttons delete-btn"
                            value="<?= $speciality->id ?>">
                        &#10006;
                    </button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <!--    model window with exams    -->

    <div class="modal-wrapper-exams hide">
        <div class="modal-window-exams">
            <span class="close-modal-exams">&times;</span>
            <form method="POST" id="form-exams">
                <h3>Выбор экзаменов</h3>
                <div>
                    <?php foreach ($exams as $exam): ?>
                        <label class="label-exams">
                            <input type="checkbox"
                                   name="exams-cb[]"
                                   class="input-exams"
                                   value="<?= $exam->id ?>">
                            <?= $exam->name ?></label>
                    <?php endforeach; ?>
                </div>
                <button type="submit"
                        name="save-exams-submit"
                        value=""
                        class="save-exams-btn">Сохранить
                </button>
            </form>
        </div>
    </div>

    <!--    model window with editing speciality    -->

    <div class="modal-wrapper-edit hide">
        <div class="modal-window-edit">
            <span class="close-modal-edit">&times;</span>
            <form method="POST" id="form-edit" enctype="multipart/form-data">
                <h3>Редактирование специальности</h3>
                <div id="flex-container-edit">
                    <div class="flex-container-edit-1">
                        <label>Наименование
                            <input type="text"
                                   name="name-edit"
                                   id="name-edit">
                        </label>
                        <label>Продолжительность
                            <input type="text"
                                   name="duration-edit"
                                   id="duration-edit">
                        </label>
                        <label>Бюджетные места
                            <input type="number"
                                   name="b-places-edit"
                                   id="b-places-edit"
                                   min="10"
                                   max="25">
                        </label>
                        <label>Коммерческие места
                            <input type="number"
                                   name="c-places-edit"
                                   id="c-places-edit"
                                   min="10"
                                   max="25">
                        </label>
                        <label>Стоимость обучения
                            <input type="text"
                                   name="price-edit"
                                   id="price-edit">
                        </label>
                    </div>
                    <div>
                        <label class="img-loading">Загрузить новое изображение
                            <input type="file"
                                   name="img-edit"
                                   id="load-img-edit"
                                   accept="image/png, image/jpg, image/jpeg">
                        </label>
                        <div>
                            <img src="" id="loaded-img-edit">
                        </div>
                        <label>Описание
                            <textarea type="text"
                                      name="description-edit"
                                      id="description-edit"
                                      rows="10">
                            </textarea>
                        </label>
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

    <!--    model window with adding speciality    -->

    <div class="modal-wrapper-add hide">
        <div class="modal-window-add">
            <span class="close-modal-add">&times;</span>
            <form method="POST" id="form-add" enctype="multipart/form-data">
                <h3>Добавление специальности</h3>
                <div id="flex-container-add">
                    <div class="flex-container-add-1">
                        <label>Наименование
                            <input type="text"
                                   name="name-add"
                                   id="name-add">
                        </label>
                        <label>Продолжительность
                            <input type="text"
                                   name="duration-add"
                                   id="duration-add">
                        </label>
                        <label>Бюджетные места
                            <input type="number"
                                   name="b-places-add"
                                   id="b-places-add"
                                   min="10"
                                   max="25">
                        </label>
                        <label>Коммерческие места
                            <input type="number"
                                   name="c-places-add"
                                   id="c-places-add"
                                   min="10"
                                   max="25">
                        </label>
                        <label>Стоимость обучения
                            <input type="text"
                                   name="price-add"
                                   id="price-add">
                        </label>
                    </div>
                    <div>
                        <label class="img-loading img-loading-add-spec">Загрузить изображение
                            <input type="file"
                                   name="img-add"
                                   id="load-img-add"
                                   accept="image/png, image/jpg, image/jpeg">
                        </label>
                        <div>
                            <img src="/public/img/default.png" id="loaded-img-add"
                                 alt="Изображение специальности">
                        </div>
                        <label>Описание
                            <textarea type="text"
                                      name="description-add"
                                      id="description-add"
                                      rows="10">
                            </textarea>
                        </label>
                    </div>
                </div>
                <button type="submit"
                        name="add-submit"
                        value=""
                        class="add-btn">Сохранить
                </button>
            </form>
        </div>
    </div>
</main>

<script src="/public/js/fetch.js"></script>
<script src="/public/js/admin/specialities/set-info.js"></script>
<script src="/public/js/admin/set-img.js"></script>
<script src="/public/js/admin/specialities/modal-window.js"></script>