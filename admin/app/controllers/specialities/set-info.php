<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Admin;

if(isset($_GET["spec-info"])) {
    Admin::specialityByID($_GET["spec-info"]);
}

if(isset($_GET["exam-info-cb"])) {
    Admin::examsForSpeciality($_GET["exam-info-cb"]);
}