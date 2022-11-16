<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\User;

session_start();

$title = "Список поступающих";
$style = "lists.css";
$count = 1;

$lists = User::showList($_GET["list-by-spec"]);
$colors = User::budgetCommerceColors($_GET["list-by-spec"]);
$specName = User::getSpecialityNameForList($_GET["list-by-spec"]);


include_once $_SERVER["DOCUMENT_ROOT"] . "/views/lists/list.view.php";

