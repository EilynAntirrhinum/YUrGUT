<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Statement;

session_start();

$title = "Подача заявления";
$style = "statement.css";

$faculties = Statement::getFaculties();
$specialities = Statement::getSpecialities();
$exams = Statement::getExams();
$bonuses = Statement::getBonuses();

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/statement/speciality.view.php";
