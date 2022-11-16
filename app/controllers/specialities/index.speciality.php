<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Speciality;

session_start();

$title = "Специальности";
$style = "speciality.css";

$specialities = Speciality::selectSpeciality($_GET["submit"]);

$exams = Speciality::getExamsBySpec($_GET["submit"]);

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/specialities/speciality.view.php";
