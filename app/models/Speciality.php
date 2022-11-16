<?php

namespace App\models;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\services\Connection;

class Speciality
{
    protected static function pdo($config = CONFIG_CONNECTION): \PDO
    {
        return Connection::make($config);
    }

    public static function getSpecialityInfo()
    {
        $stmt = self::pdo()->query("SELECT * FROM speciality");
        return $stmt->fetchAll();
    }

    public static function selectSpeciality($id)
    {
        $stmt = self::pdo()->prepare("SELECT * FROM speciality WHERE id = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetch();
    }

    public static function getExamsBySpec($id)
    {
        $stmt = self::pdo()->prepare("SELECT name FROM required_exams INNER JOIN exams ON exams.id = required_exams.exam_id WHERE spec_id = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetchAll();
    }

}