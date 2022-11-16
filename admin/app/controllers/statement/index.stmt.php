<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Admin;

$title = "Заявления";
$style = "admin.css";

$stmts = Admin::studentStatementBySpec($_GET["stmt-by-spec"]);
$specName = Admin::getSpecialityName($_GET["stmt-by-spec"]);

include $_SERVER["DOCUMENT_ROOT"] . "/admin/views/statement/stmt.view.php";

