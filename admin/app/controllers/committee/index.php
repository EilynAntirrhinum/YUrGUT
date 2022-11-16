<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Admin;

$title = "Комиссия";
$style = "admin.css";

$coms = Admin::allCommittee();

if(!$_SESSION["isAuth"]) {
    header("Location: /admin/");
}

if(isset($_POST["save-submit"])) {
    Admin::updateCommittee($_POST["save-submit"], $_POST["login-edit"], $_POST["password-edit"], $_POST["surname-edit"]);
    header("Location: /admin/app/controllers/committee/index.php");
}

if(isset($_POST["add-submit"])) {
    Admin::addCommittee($_POST["login-add"], $_POST["password-add"], $_POST["surname-add"]);
    header("Location: /admin/app/controllers/committee/index.php");
}

if(isset($_POST["del-submit"])) {
    Admin::deleteCommittee($_POST["del-submit"]);
    header("Location: /admin/app/controllers/committee/");
}

include_once $_SERVER["DOCUMENT_ROOT"] . "/admin/views/committee/index.view.php";