<?php include $_SERVER["DOCUMENT_ROOT"] . "/admin/views/components/header.php"; ?>

<main id="main-spec-stmt">
    <div id="container-spec-stmt">
        <?php foreach ($specialities as $speciality) : ?>
            <div class="spec-stmt-item">
                <p><?= $speciality->name ?></p>
                <form class="spec-stmt-buttons" method="POST">
                    <button class="spec-stmt-btn"
                            value="<?= $speciality->id ?>">
                        <a href="/admin/app/controllers/statement/index.stmt.php?stmt-by-spec=<?= $speciality->id ?>">
                            Посмотреть заявления
                        </a>
                    </button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</main>
