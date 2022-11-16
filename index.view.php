<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/components/header.php"; ?>


    <section id="section-banner">
        <div id="banner"></div>
        <div id="text-banner">
            <p>
                Диплом учебного заведения — документ, удостоверяющий, что у тебя был шанс чему-нибудь научиться.
            </p>
            <div id="stmt-button">
                <a href="<?= $_SESSION["isAuth"] ?? false ? "/app/controllers/statement/choose-spec.php" : "app/controllers/statement" ?>"
                   id="link-stmt">ПОДАТЬ ЗАЯВЛЕНИЕ</a>
            </div>
        </div>
    </section>

    <main>
        <section id="info">
            <p>
                Южно-Уральский Государственный Университет Технологий нанимает самых квалифицированных специалистов в
                качестве преподавателей, которые обучают студентов по самым современным учебным материалам и методикам.
                Для разнообразия студенческой жизни часто организовывают выездные и локальные мероприятия. Аудитории
                оборудованы самой новой и современной техникой для более приятного процесса обучения. Обучение и
                расписание максимально гибкие и могут, по возможности, удовлетворить желания каждой группы. Мы готовы
                меняться и менять условия обучения, чтобы не только обучение в нашем университете было на высшем уровне,
                но и обстановка вызывала приятные эмоции и желание вернуться. Каждый преподаватель вкладывается на 100%
                и всегда готов идти на встречу студентам.
            </p>

            <div id="info-img"></div>
        </section>
    </main>

    <section id="statistics">
        <div id="statistics-inside">
            <div id="stat-block-1">
                <p class="nums">124</p>
                <p class="text-nums">Преподавателей</p>
            </div>
            <div id="stat-block-2">
                <p class="nums">1256</p>
                <p class="text-nums">Студентов</p>
            </div>
            <div id="stat-block-3">
                <p class="nums">8</p>
                <p class="text-nums">Факультетов</p>
            </div>
            <div id="stat-block-4">
                <p class="nums">23</p>
                <p class="text-nums">Специальностей</p>
            </div>
        </div>
    </section>

    <main>
        <div id="top-3-faculties">
            <h3>ТОП-3 наших факультетов</h3>
            <div id="top-3-faculties-inside">
                <?php foreach ($faculties as $faculty): ?>
                    <a href="<?= $faculty->link . '?submit=' . $faculty->id ?>">
                        <div class="fac-blocks">
                            <img src="/public/img/<?= $faculty->img ?>"
                                 alt="Изображение факультета">
                            <p><?= $faculty->name ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/components/footer.php"; ?>