<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Admin;

$title = "Заявления";
$style = "admin.css";
$stud_id = Admin::personalInfoStudent($_GET["stud-stmt-by-spec"])->stud_id;

$perInfo = Admin::personalInfoStudent($_GET["stud-stmt-by-spec"]);
$examsInfo = Admin::examsInfoStudent($stud_id, $_GET["stud-stmt-by-spec"]);
$bonusesInfo = Admin::bonusesStudent($stud_id);
$stmtName = Admin::getNameStatement($_GET["stud-stmt-by-spec"]);

include $_SERVER["DOCUMENT_ROOT"] . "/admin/views/statement/show.view.php";
