<?php

namespace App\models;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\services\Connection;

class Faculty
{
    protected static function pdo($config = CONFIG_CONNECTION): \PDO
    {
        return Connection::make($config);
    }

    public static function getFacultyInfo()
    {
        $stmt = self::pdo()->query("SELECT * FROM faculty");
        return $stmt->fetchAll();
    }

    public static function selectFaculty($id)
    {
        $stmt = self::pdo()->prepare("SELECT * FROM faculty WHERE id = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetch();
    }

    public static function outputSpecialities($id)
    {
        $stmt = self::pdo()->prepare("SELECT * FROM speciality WHERE faculty_id = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetchAll();
    }

    public static function selectTop3Faculties()
    {
        $stmt = self::pdo()->query("SELECT * FROM faculty ORDER BY id ASC LIMIT 3");
        return $stmt->fetchAll();
    }
}