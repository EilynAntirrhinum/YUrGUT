<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Faculty;

session_start();

$title = "Факультеты";
$style = "faculties.css";

$faculties = Faculty::getFacultyInfo();

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/faculties/index.view.php";