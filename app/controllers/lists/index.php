<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\User;

session_start();

$title = "Специальности";
$style = "lists.css";

$specs = User::showSpecs($_SESSION["login-user-page"]);

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/lists/index.view.php";
