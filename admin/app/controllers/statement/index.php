<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Admin;

$title = "Заявления";
$style = "admin.css";

$specialities = Admin::allSpecialitiesWithoutID();

if(isset($_POST["spec-stmt-submit"])) {
    header("Location: /admin/app/controllers/statement/index.stmt.php?stmt-info={$_POST["spec-stmt-submit"]}");
}

include $_SERVER["DOCUMENT_ROOT"] . "/admin/views/statement/index.view.php";
