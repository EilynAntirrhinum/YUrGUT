<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/components/header.php"; ?>

<main id="main-specs">
    <h1 id="title-spec">СПЕЦИАЛЬНОСТИ</h1>
    <div id="specialities-container">
        <?php foreach ($specialities as $speciality) : ?>
            <div class="specialities-card">
                <img src="/public/img/<?= $speciality->img ?>">
                <div class="specialities-info">
                    <h3><?= $speciality->name ?></h3>
                    <p><?= $speciality->description ?></p>
                </div>

                <button type="submit" class="speciality-button" name="submit" value="<?= $speciality->id ?>"><a href="<?=$speciality->link?>?submit=<?=$speciality->id?>"> ПОДРОБНЕЕ </a></button>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/components/footer.php"; ?>
