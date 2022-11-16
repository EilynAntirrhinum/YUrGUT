<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Admin;

$title = "Факультеты";
$style = "admin.css";

$faculties = Admin::allFaculties();

if(!$_SESSION["isAuth"]) {
    header("Location: /admin/");
}

if(isset($_POST["update-submit"])) {
    $img = Admin::facultyByIDForImg($_POST["update-submit"])->img;

    Admin::updateFaculty($_POST["update-submit"], $_POST["name-edit"], $_POST["sd-edit"], $_POST["fd-edit"], $_POST["leadership-edit"], $_FILES["img-edit"]["name"], $uploadPath .  $img);

    if (isset($_FILES["img-edit"])) {
        $file = $_FILES["img-edit"];
        move_uploaded_file($file["tmp_name"], $uploadPath . "faculties/" . $file["name"]);
    }
    
    header("Location: /admin/app/controllers/faculties/");
}

if(isset($_POST["add-submit"])) {
    Admin::addFaculty($_POST["name-add"], $_POST["sd-add"], $_POST["fd-add"], $_POST["leadership-add"], $_FILES["img-add"]["name"]);

    if (isset($_FILES["img-add"])) {
        $file = $_FILES["img-add"];
        move_uploaded_file($file["tmp_name"], $uploadPath . "faculties/" . $file["name"]);
    }

    header("Location: /admin/app/controllers/faculties/");
}

if(isset($_POST["del-submit"])) {
    Admin::deleteFaculty($_POST["del-submit"]);
    header("Location: /admin/app/controllers/faculties/");
}

if(isset($_POST["spec-submit"])) {
    header("Location: /admin/app/controllers/specialities/index.php?spec-by-fac={$_POST["spec-submit"]}");
}

include_once $_SERVER["DOCUMENT_ROOT"] . "/admin/views/faculties/index.view.php";