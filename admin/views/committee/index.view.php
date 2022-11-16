<?php include $_SERVER["DOCUMENT_ROOT"] . "/admin/views/components/header.php"; ?>

<main id="main-committee">
    <div class="flex-box-admin">
        <h3>Представители приемной комиссии</h3>
        <button name="add-committee" id="add-committee">Добавить администратора</button>
    </div>
    <div id="container-committee">
        <?php foreach ($coms as $com) : ?>
            <div class="committee-item">
                <p><?= $com->surname ?></p>
                <form class="committee-buttons" method="POST">
                    <button name="edit-submit" class="control-buttons edit-btn" value="<?= $com->id ?>">
                        &#9998;
                    </button>
                    <button name="del-submit" class="control-buttons delete-btn" value="<?= $com->id ?>">
                        &#10006;
                    </button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <!--    model window with editing committee    -->

    <div class="modal-wrapper-edit hide">
        <div class="modal-window-edit">
            <span class="close-modal-edit">&times;</span>
            <form method="POST" id="form-edit">
                <h3>Редактирование администратора</h3>
                <label>Фамилия И. О.
                    <input type="text" name="surname-edit" id="surname-edit" required>
                </label>
                <label>Логин
                    <input type="text" name="login-edit" id="login-edit" required>
                </label>
                <label>Пароль
                    <input type="text" name="password-edit" id="password-edit" required>
                </label>
                <button type="submit" name="save-submit" value="" class="update-btn">Сохранить</button>
            </form>
        </div>
    </div>

    <!--    model window with adding committee    -->

    <div class="modal-wrapper-add hide">
        <div class="modal-window-add">
            <span class="close-modal-add">&times;</span>
            <form method="POST" id="form-add">
                <h3>Добавление администратора</h3>
                <label>Фамилия И. О.
                    <input type="text" name="surname-add" id="surname-add" required>
                </label>
                <label>Логин
                    <input type="text" name="login-add" id="login-add" required>
                </label>
                <label>Пароль
                    <input type="text" name="password-add" id="password-add" required>
                </label>
                <button type="submit" name="add-submit" value="" class="add-btn">Сохранить</button>
            </form>
        </div>
    </div>
</main>

<script src="/public/js/fetch.js"></script>
<script src="/public/js/admin/committee/set-info.js"></script>
<script src="/public/js/admin/committee/modal-window.js"></script>