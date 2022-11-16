<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Statement;

session_start();

$title = "Подача заявления";
$style = "statement.css";

$faculties = Statement::getFaculties();
$specialities = Statement::getSpecialities();

if (isset($_POST["submit"])) {
    Statement::insertDataInStatement($_SESSION["stud_id"], $_POST["specs"]);

    header("Location: /app/controllers/statement/exams.php");
}

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/statement/choose-spec.view.php";