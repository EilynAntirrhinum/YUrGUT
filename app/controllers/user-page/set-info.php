<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\User;

User::studentByIDJSON($_SESSION["login-user-page"]);