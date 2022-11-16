<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Admin;

if(isset($_GET["com-info"])) {
    Admin::committeeByID($_GET["com-info"]);
}