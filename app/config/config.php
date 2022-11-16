<?php

$routes = [
    "ФАКУЛЬТЕТЫ" => "/app/controllers/faculties",
    "СПЕЦИАЛЬНОСТИ" => "/app/controllers/specialities"
];

$routes_admin = [
    "ФАКУЛЬТЕТЫ" => "/admin/app/controllers/faculties",
    "ЗАЯВЛЕНИЯ" => "/admin/app/controllers/statement",
    "КОМИССИЯ" => "/admin/app/controllers/committee",
];

$uploadPath = $_SERVER["DOCUMENT_ROOT"] . "/public/img/";