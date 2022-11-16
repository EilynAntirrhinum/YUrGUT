<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/components/header.php"; ?>

<main id="main-choose-spec">
    <div id="text-info">
        <h3>2. Выбор специальности</h3>
        <p>
            Вы перешли на следующий этап! Этот этап состоит из выбора будущей специальности.
        </p>
    </div>

    <form id="specs-data" method="POST">
        <div>
            <label for="specs">Специальность</label>
            <select name="specs" id="specs" required>
                <?php foreach ($faculties as $faculty) : ?>
                    <optgroup label="<?= $faculty->name ?>">

                        <?php foreach ($specialities as $speciality) : ?>
                            <?php if ($speciality->faculty_id == $faculty->id) : ?>
                                <option value="<?= $speciality->id ?>"><?= $speciality->name ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </optgroup>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <button type="submit"
                    name="submit"
                    id="to-third-step-btn">
                ПЕРЕЙТИ К СЛЕДУЮЩЕМУ ЭТАПУ
            </button>
        </div>
    </form>
</main>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/components/footer.php"; ?>
