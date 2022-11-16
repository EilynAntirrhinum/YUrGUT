<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Speciality;

session_start();

$title = "Специальности";
$style = "specialities.css";

$specialities = Speciality::getSpecialityInfo();

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/specialities/index.view.php";
