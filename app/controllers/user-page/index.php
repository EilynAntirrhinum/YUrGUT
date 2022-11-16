<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\User;

session_start();

$title = "Личный кабинет";
$style = "user-page.css";

$personalInfo = User::personalInfoStudentUserPage($_SESSION["login-user-page"]);

if(isset($_POST["update-submit"])) {
    $img = User::studentByID($_SESSION["login-user-page"])->img;

    User::updateStudent($_SESSION["login-user-page"], $_POST["surname"], $_POST["name"], $_POST["patronymic"], $_POST["num-certif"], $_POST["school"], $_FILES["img-edit"]["name"], $_POST["date-birth"], $_POST["address"], $_POST["num-phone"], $_POST["passport-num"], $_POST["passport-series"], $_POST["passport-get-by"], $_POST["date-passport"], $uploadPath . "statement/" .  $img);

    if (isset($_FILES["img-edit"])) {
        $file = $_FILES["img-edit"];
        move_uploaded_file($file["tmp_name"], $uploadPath . "statement/" . $file["name"]);
    }
    
    header("Location: /app/controllers/user-page/");
}

if(isset($_POST["exit"])) {
    $_SESSION["isAuth"] = false;
    header("Location: /");
    die();
}

include $_SERVER["DOCUMENT_ROOT"] . "/views/user-page/index.view.php";