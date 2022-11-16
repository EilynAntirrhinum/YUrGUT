<?php include $_SERVER["DOCUMENT_ROOT"] . "/admin/views/components/header.php"; ?>

<main id="main-faculties">
    <button name="add-faculty" id="add-faculty">Добавить факультет</button>
    <div id="container-faculty">
        <?php foreach ($faculties as $faculty) : ?>
            <div class="faculty-item">
                <p><?= $faculty->name ?></p>
                <form class="faculty-buttons" method="POST">
                    <button name="spec-submit"
                            class="control-buttons spec-btn"
                            value="<?= $faculty->id ?>">
                        Спецальности
                    </button>
                    <button name="edit-submit"
                            class="control-buttons main-control-buttons edit-btn"
                            value="<?= $faculty->id ?>">
                        &#9998;
                    </button>
                    <button name="del-submit"
                            class="control-buttons main-control-buttons delete-btn"
                            value="<?= $faculty->id ?>">
                        &#10006;
                    </button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <!--    model window with editing faculty    -->

    <div class="modal-wrapper-edit hide">
        <div class="modal-window-edit">
            <span class="close-modal-edit">&times;</span>
            <form method="POST" id="form-edit" enctype="multipart/form-data">
                <h3>Редактирование факультета</h3>
                <div id="post-form-edit">
                    <div class="flex-container-edit-1">
                        <label class="img-loading">ЗАГРУЗИТЬ НОВОЕ ИЗОБРАЖЕНИЕ
                            <input type="file"
                                   name="img-edit"
                                   id="load-img-edit"
                                   accept="image/png, image/jpg, image/jpeg">
                        </label>
                        <div>
                            <img src=""
                                 id="loaded-img-edit"
                                 alt="Изображение факультета">
                        </div>
                        <label>Наименование
                            <input type="text"
                                   name="name-edit"
                                   id="name-edit"
                                   required>
                        </label>
                        <label>Руководитель
                            <input type="text"
                                   name="leadership-edit"
                                   id="leadership-edit"
                                   required>
                        </label>
                    </div>
                    <div>
                        <label>Краткое описание
                            <textarea name="sd-edit"
                                      id="sd-edit"
                                      rows="7"
                                      required></textarea>
                        </label>
                        <label>Подробное описание
                            <textarea type="text"
                                      name="fd-edit"
                                      rows="12"
                                      id="fd-edit"
                                      required></textarea>
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

    <!--    model window with adding committee    -->

    <div class="modal-wrapper-add hide">
        <div class="modal-window-add">
            <span class="close-modal-add">&times;</span>
            <form method="POST" id="form-add" enctype="multipart/form-data">
                <h3>Добавление факультета</h3>
                <div id="main-cont-add">
                    <div id="cont-1-add" class="flex-container-add-1">
<!--                        <label>Добавить изображение-->
<!--                            <input type="file"-->
<!--                                   name="img-add"-->
<!--                                   id="load-img-add"-->
<!--                                   accept="image/png, image/jpg, image/jpeg">-->
<!--                        </label>-->
                        <label class="img-loading-add">ЗАГРУЗИТЬ ИЗОБРАЖЕНИЕ
                            <input type="file"
                                   name="img-add"
                                   id="load-img-add"
                                   accept="image/png, image/jpg, image/jpeg">
                        </label>
                        <div>
                            <img src="/public/img/default.png"
                                 id="loaded-img-add"
                                 alt="Изображение факультета">
                        </div>
                        <label>Наименование
                            <input type="text"
                                   name="name-add"
                                   id="name-add" required>
                        </label>
                        <label>Руководитель
                            <input type="text"
                                   name="leadership-add"
                                   id="leadership-add"
                                   required>
                        </label>
                    </div>
                    <div id="cont-2-add">
                        <label>Краткое описание
                            <textarea type="text"
                                      name="sd-add"
                                      id="sd-add"
                                      rows="5"
                                      required>

                            </textarea>
                        </label>
                        <label>Подробное описание
                            <textarea type="text"
                                      name="fd-add"
                                      id="fd-add"
                                      rows="12"
                                      required></textarea>
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
<script src="/public/js/admin/faculties/set-info.js"></script>
<script src="/public/js/admin/set-img.js"></script>
<script src="/public/js/admin/faculties/modal-window.js"></script>