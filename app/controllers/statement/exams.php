<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Statement;

session_start();

$title = "Подача заявления";
$style = "statement.css";

$faculties = Statement::getFaculties();
$specialities = Statement::getSpecialities();
$after_stmt_login = "";
$after_stmt_password = "";
$finalScore = 0;

$exams = Statement::requiredExamsBySpec($_SESSION["stud_id"]);

if (isset($_POST["submit"])) {
    Statement::insertExamsResult($_SESSION["stud_id"], $_POST);
    $loginAndPasswordUnhashed = Statement::generationLoginAndPassword();

    foreach ($exams as $exam) {
        $finalScore += $_POST[$exam->exam_id];
    }

    if ($_POST["bonus-1-name"] != "" && $_POST["bonus-1-score"] != "") {
        Statement::insertDataInExamsAndBonuses($_SESSION["stud_id"], $_POST["bonus-1-name"], $_POST["bonus-1-score"]);
        $finalScore += $_POST["bonus-1-score"];
    }

    if ($_POST["bonus-2-name"] != "" && $_POST["bonus-2-score"] != "") {
        Statement::insertDataInExamsAndBonuses($_SESSION["stud_id"], $_POST["bonus-2-name"], $_POST["bonus-2-score"]);
        $finalScore += $_POST["bonus-2-score"];
    }

    if ($_POST["bonus-3-name"] != "" && $_POST["bonus-3-score"] != "") {
        Statement::insertDataInExamsAndBonuses($_SESSION["stud_id"], $_POST["bonus-3-name"], $_POST["bonus-3-score"]);
        $finalScore += $_POST["bonus-3-score"];
    }

    if($_SESSION["isAuth"]) {
        header("Location: /index.php");
    }

    Statement::pushScore($_SESSION["stud_id"], $finalScore);
}
if (isset($_POST["save-lp-submit"])) {
    header("Location: /index.php");
}

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/statement/exams.view.php";