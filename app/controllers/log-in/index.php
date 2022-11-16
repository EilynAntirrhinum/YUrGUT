<?php

use App\models\Auth;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

session_start();

$title = "Вход";
$style = "log-in.css";
$_SESSION["isAuth"] = false;
$isFailed = false;

if (isset($_POST["auth-btn"])) {
    if (Auth::authentification($_POST["login-user"], $_POST["password-user"])) {
        $_SESSION["isAuth"] = true;
        $isFailed = false;
        $_SESSION["login-user-page"] = $_POST["login-user"];
        header("Location:/app/controllers/user-page");
    } else {
        $isFailed = true;
    }
}


include_once $_SERVER["DOCUMENT_ROOT"] . "/views/log-in/index.view.php";
