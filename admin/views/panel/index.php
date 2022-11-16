<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Admin;

session_start();

$title = "Панель администратора";
$style = "admin.css";

include $_SERVER["DOCUMENT_ROOT"] . "/admin/views/panel/index.view.php";
