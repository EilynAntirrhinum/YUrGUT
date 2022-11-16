<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Admin;

session_start();

$title = "Панель администратора";
$style = "admin.css";

$faculties = Admin::getFaculties();

include $_SERVER["DOCUMENT_ROOT"] . "/admin/panel/index.view.php";
