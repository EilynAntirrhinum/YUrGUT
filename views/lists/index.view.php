<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/components/header.php"; ?>

<main id="main-lists">
    <h2>СПИСКИ АБИТУРИЕНТОВ</h2>
    <div id="block-specs">
        <?php foreach ($specs as $spec): ?>
            <div class="specs-list">
                <p><?= $spec->name ?></p>
                <div>
                    <a href="/app/controllers/lists/list.php?list-by-spec=<?= $spec->id ?>">ПОСМОТРЕТЬ СПИСОК</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/components/footer.php"; ?>
