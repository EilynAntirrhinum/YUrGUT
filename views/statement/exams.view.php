<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/components/header.php"; ?>

<main id="main-exams">
    <div id="text-info">
        <h3>3. Заполнение баллов за экзамены</h3>
        <p>
            Остался последний этап, которые представляет из себя заполнение баллов за сданные экзамены.
        </p>
    </div>

    <div id="third-step">
        <form id="exams-and-bonuses-data" method="POST">
            <div id="fill-exams-inputs">
                <?php foreach ($exams as $exam) : ?>
                    <label><?= $exam->name ?>
                        <input type="number"
                               min="0"
                               max="100"
                               name="<?= $exam->exam_id ?>"
                               class="fill-exams-input"
                               placeholder="Введите количество полученных баллов за экзамен" required>
                    </label>
                <?php endforeach; ?>

                <p>Индивидуальные достижения</p>
                <div id="bonuses-score">
                    <label>
                        <input type="text"
                               name="bonus-1-name"
                               placeholder="Индивидуальное достижение">
                        <input type="number"
                               min="0"
                               max="100"
                               name="bonus-1-score"
                               placeholder="Баллы">
                    </label>
                    <label>
                        <input type="text"
                               name="bonus-2-name"
                               placeholder="Индивидуальное достижение">
                        <input type="number"
                               min="0"
                               max="100"
                               name="bonus-2-score"
                               placeholder="Баллы">
                    </label>
                    <label>
                        <input type="text"
                               name="bonus-3-name"
                               placeholder="Индивидуальное достижение">
                        <input type="number"
                               min="0"
                               max="100"
                               name="bonus-3-score"
                               placeholder="Баллы">
                    </label>
                </div>
            </div>

            <div id="finish-button-div">
                <button type="submit"
                        name="submit"
                        id="finish-statement-btn">
                    Отправить заявление
                </button>
            </div>
        </form>


        <!--   modal window with login and password   -->

        <?php if (isset($_POST["submit"]) && !$_SESSION["isAuth"]): ?>
            <div class="modal-wrapper-lp active">
                <div class="modal-window-lp">
                    <form method="POST" id="form-exams" enctype="multipart/form-data">
                        <h3>Вы успешно подали заявление!</h3>
                        <div>
                            <p>Специально для Вас сгенерировали логин и пароль! Не потеряйте его.</p>
                        </div>
                        <p class="lp-output">Логин: <?= $loginAndPasswordUnhashed["login"] ?>
                            Пароль: <?= $loginAndPasswordUnhashed["password"] ?></p>
                        <button type="submit"
                                name="save-lp-submit"
                                value=""
                                class="save-lp-btn">ОК
                        </button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/components/footer.php"; ?>

<!--<script src="/public/js/modal-window-lp.js"></script>-->