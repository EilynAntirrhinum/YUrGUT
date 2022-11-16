<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

session_start();

use App\models\Auth;
use App\models\Faculty;

$title = "Главная";
$style = "main-page.css";

$faculties = Faculty::selectTop3Faculties();

if (isset($_POST["authent"])) {
    Auth::authentification($_POST["login"], $_POST["password"]);
    $_SESSION["isAuth"] = true;
    header("Location: /app/controllers/user-page/");
}

include $_SERVER["DOCUMENT_ROOT"] . "/index.view.php";