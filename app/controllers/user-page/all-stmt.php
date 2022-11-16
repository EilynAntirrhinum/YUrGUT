<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Admin;

session_start();

$title = "Все заявления";
$style = "/user-page/user-page.css";


include $_SERVER["DOCUMENT_ROOT"] . "/views/user-page/all-stmt.view.php";