<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/components/header.php"; ?>

<main id="main-faculties">
    <h1 id="title-fac">ФАКУЛЬТЕТЫ</h1>
    <div id="faculties-container">
        <?php foreach ($faculties as $faculty) : ?>
            <div class="faculties-card">
                <img src="/public/img/<?= $faculty->img ?>">
                <div class="faculties-info">
                    <h3><?= $faculty->name ?></h3>
                    <p><?= $faculty->short_description ?></p>
                </div>

                <button type="submit" class="faculty-button" name="submit" value="<?= $faculty->id ?>"><a href="<?=$faculty->link?>?submit=<?=$faculty->id?>"> ПОДРОБНЕЕ </a></button>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/components/footer.php"; ?>