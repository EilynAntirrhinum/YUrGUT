<?php include $_SERVER["DOCUMENT_ROOT"] . "/admin/components/header.php"; ?>

<main id="main-admin-panel">
    <div id="navigation">
        <?php foreach ($faculties as $faculty) : ?>
            <ul>
                <li>
                    <a href="<?= $faculty->link ?>?submit=<?= $faculty->id ?>"> <?= $faculty->name ?> </a>
                </li>
            </ul>
        <?php endforeach; ?>
    </div>
</main>
