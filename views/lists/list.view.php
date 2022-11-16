<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/components/header.php"; ?>

<main id="main-lists-inside">
    <div id="block-lists">
        <h3> <?= $specName->name ?></h3>
        <p>Зелёный – бюджет. Голубой – коммерция.</p>
        <table id="table-list">
            <tr>
                <th class="th-styles">№</th>
                <th>ФИО</th>
                <th>БАЛЛ</th>
            </tr>
        <?php foreach ($lists as $list): ?>
            <tr class="<?php if($count <= $colors[0]) echo 'bp'; elseif ($count - $colors[0] <= $colors[1]) echo 'cp';?>">
                <td class="td-table"><?= $count++ ?></td>
                <td class="td-styles"> <?= $list->surname?>&nbsp;<?= $list->name?>&nbsp;<?= $list->patronymic?> </td>
                <td class="td-table"> <?= $list->score?> </td>
            </tr>
        <?php endforeach; ?>
            </table>
    </div>
</main>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/components/footer.php"; ?>
