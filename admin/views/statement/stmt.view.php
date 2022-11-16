<?php include $_SERVER["DOCUMENT_ROOT"] . "/admin/views/components/header.php"; ?>

<main id="main-stmts">
    <div id="container-stmts">
        <h3><?= $specName->name ?></h3>
        <?php foreach ($stmts as $stmt) : ?>
            <div class="stmts-item">
                <div class="names-div">
                    <p><?= $stmt->surname ?> &nbsp;</p>
                    <p><?= $stmt->name ?> &nbsp;</p>
                    <p><?= $stmt->patronymic ?> &nbsp;</p>
                </div>
                <form class="spec-stmt-buttons" method="POST">
                    <button class="stmts-btn"
                            value="<?= $stmt->id ?>">
                        <a href="/admin/app/controllers/statement/index.show.php?stud-stmt-by-spec=<?= $stmt->id ?>">
                            Посмотреть
                        </a>
                    </button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</main>

