<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Admin;

if(isset($_GET["faculty-info"])) {
    Admin::facultyByID($_GET["faculty-info"]);
}
