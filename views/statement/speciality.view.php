<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/components/header.php"; ?>

<main id="main-spec-info">
    <div id="spec">
        <label for="specs">Специальность</label>
        <select name="specs" id="specs" required>
            <?php foreach ($faculties as $faculty): ?>
                <optgroup label="<?= $faculty->name ?>">

                    <?php foreach ($specialities as $speciality): ?>
                        <?php if ($speciality->faculty_id == $faculty->id): ?>
                            <option value="<?= $speciality->id ?>"><?= $speciality->name ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </optgroup>
            <?php endforeach; ?>
        </select>
    </div>

    <div id="exams">
        <p>Экзамены</p>
        <?php foreach ($exams as $exam): ?>
            <input type="checkbox" name="<?= $exam->exam ?>" required>
            <label><?= $exam->exam ?></label>
        <? endforeach; ?>

        <p>Дополнительные баллы</p>
        <?php foreach ($bonuses as $bonus): ?>
            <input type="checkbox" name="<?= $bonus->name ?>" required>
            <label><?= $bonus->name ?></label>
        <? endforeach; ?>
    </div>
</main>