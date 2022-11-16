<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Admin;

session_start();

$title = "Вход";
$_SESSION["isAuth"] = false;
$_SESSION["isFailed"] = false;

if(isset($_POST["submit"])) {
    if (Admin::authentification($_POST["login-admin"], $_POST["password-admin"])) {
        header("Location: /admin/app/controllers/panel/");
        $_SESSION["isAuth"] = true;
    } else {
        $isFailed = true;
    }
}

include $_SERVER["DOCUMENT_ROOT"] . "/admin/index.view.php";
