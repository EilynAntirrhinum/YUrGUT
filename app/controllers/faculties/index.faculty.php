<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Faculty;

session_start();

$title = "Факультеты";
$style = "faculty.css";

if (isset($_GET["submit"])) {
    $faculty = Faculty::selectFaculty($_GET["submit"]);
    $specialities = Faculty::outputSpecialities($_GET["submit"]);
}

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/faculties/faculty.view.php";