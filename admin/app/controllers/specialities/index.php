<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Admin;

$title = "Специальности";
$style = "admin.css";

$specialities = Admin::allSpecialities($_GET["spec-by-fac"]);
$exams = Admin::allExams();
$facName = Admin::getFacultyName($_GET["spec-by-fac"]);

if(!$_SESSION["isAuth"]) {
    header("Location: /admin/");
}

if (isset($_POST["update-submit"])) {
    $img = Admin::specialityByIDForImg($_POST["update-submit"])->img;

    Admin::updateSpeciality($_POST["update-submit"], $_POST["name-edit"], $_POST["description-edit"], $_FILES["img-edit"]["name"], $_POST["duration-edit"], $_POST["b-places-edit"], $_POST["c-places-edit"], $_POST["price-edit"], $uploadPath . $img);

    if (isset($_FILES["img-edit"])) {
        $file = $_FILES["img-edit"];
        move_uploaded_file($file["tmp_name"], $uploadPath . "specialities/" . $file["name"]);
    }
    
    header("Location: /admin/app/controllers/specialities/index.php?spec-by-fac=" . $_GET["spec-by-fac"]);
}

if (isset($_POST["save-exams-submit"])) {
    Admin::specialityExams($_POST["save-exams-submit"], $_POST["exams-cb"]);
}

if (isset($_POST["add-submit"])) {
    Admin::addSpeciality($_GET["spec-by-fac"], $_POST["name-add"], $_POST["description-add"], $_POST["duration-add"], $_POST["b-places-add"], $_POST["c-places-add"], $_POST["price-add"], $_FILES["img-add"]["name"]);

    if (isset($_FILES["img-add"])) {
        $file = $_FILES["img-add"];
        move_uploaded_file($file["tmp_name"], $uploadPath . "specialities/" . $file["name"]);
    }

    header("Location: /admin/app/controllers/specialities/index.php?spec-by-fac=" . $_GET["spec-by-fac"]);
}

if (isset($_POST["del-submit"])) {
    Admin::deleteSpeciality($_POST["del-submit"]);
    header("Location: /admin/app/controllers/specialities/index.php?spec-by-fac=" . $_GET["spec-by-fac"]);
}

if (isset($_POST["update-submit"])) {
    if (isset($_FILES["img-edit"])) {
        $file = $_FILES["img-edit"];
        move_uploaded_file($file["tmp_name"], $uploadPath . "/specialities/" . $file["name"]);
    }
}

include_once $_SERVER["DOCUMENT_ROOT"] . "/admin/views/specialities/index.view.php";