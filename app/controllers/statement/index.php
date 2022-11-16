<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Statement;

session_start();

$title = "Подача заявления";
$style = "statement.css";

if (isset($_POST["submit"])) {
    Statement::insertDataInStudent($_POST["surname"], $_POST["name"], $_POST["patronymic"], $_POST["num-certif"], $_POST["school"], $_FILES["img-stmt"]["name"], $_POST["date-birth"], $_POST["address"], $_POST["num-phone"], $_POST["passport-num"], $_POST["passport-series"], $_POST["passport-get-by"], $_POST["date-passport"]);

    if (isset($_FILES["img-stmt"])) {
        $file = $_FILES["img-stmt"];
        move_uploaded_file($file["tmp_name"], $uploadPath . "/statement/" . $file["name"]);
    }

    $_SESSION["stud_id"] = Statement::getLastStudentID();

    header("Location: /app/controllers/statement/choose-spec.php");
}

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/statement/index.view.php";
