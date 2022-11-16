<?php

namespace App\models;

use App\services\Connection;

class User
{
    protected static function pdo($config = CONFIG_CONNECTION): \PDO
    {
        return Connection::make($config);
    }

    public static function budgetPlaces($id)
    {
        $stmt = self::pdo()->prepare("SELECT statement.score, student.surname, student.name, student.patronymic FROM statement INNER JOIN student ON statement.stud_id = student.id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetchAll();
    }

    public static function personalInfoStudentUserPage($id)
    {
        $stmt = self::pdo()->prepare("SELECT statement.*, student.* FROM statement INNER JOIN student ON statement.stud_id = student.id WHERE statement.stud_id = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetch();
    }

    public static function studentByID($id)
    {
        $stmt = self::pdo()->prepare("SELECT * FROM student WHERE id = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetch();
    }

    public static function studentByIDJSON($id)
    {
        $stmt = self::pdo()->prepare("SELECT * FROM student WHERE id = :id");
        $stmt->execute(["id" => $id]);
        echo json_encode($stmt->fetch(), JSON_UNESCAPED_UNICODE);
    }

    public static function updateStudent($id, $surname, $name, $patronymic, $num_certif, $school, $img, $date_birth, $address, $num_phone, $passport_num, $passport_series, $passport_get_by, $date_passport, $pastImg)
    {
        if ($img != "") {
            if ($pastImg != $_SERVER["DOCUMENT_ROOT"] . "/public/img/") {
                unlink($pastImg);
            }
            $stmt = self::pdo()->prepare("UPDATE student SET surname = :surname, name = :name, patronymic = :patronymic, num_certif = :num_certif, school = :school, img = :img, date_birth = :date_birth, address = :address, num_phone = :num_phone, passport_num = :passport_num, passport_series = :passport_series, passport_get_by = :passport_get_by, date_passport = :date_passport WHERE id = :id");
            $stmt->execute(["surname" => $surname, "name" => $name, "patronymic" => $patronymic, "num_certif" => $num_certif, "school" => $school, "img" => $img, "date_birth" => $date_birth, "address" => $address, "num_phone" => $num_phone, "passport_num" => $passport_num, "passport_series" => $passport_series, "passport_get_by" => $passport_get_by, "date_passport" => $date_passport, "id" => $id]);
        } else {
            $stmt = self::pdo()->prepare("UPDATE student SET surname = :surname, name = :name, patronymic = :patronymic, num_certif = :num_certif, school = :school, date_birth = :date_birth, address = :address, num_phone = :num_phone, passport_num = :passport_num, passport_series = :passport_series, passport_get_by = :passport_get_by, date_passport = :date_passport WHERE id = :id");
            $stmt->execute(["surname" => $surname, "name" => $name, "patronymic" => $patronymic, "num_certif" => $num_certif, "school" => $school, "date_birth" => $date_birth, "address" => $address, "num_phone" => $num_phone, "passport_num" => $passport_num, "passport_series" => $passport_series, "passport_get_by" => $passport_get_by, "date_passport" => $date_passport, "id" => $id]);
        }
    }

    public static function showSpecs($id)
    {
        $stmt = self::pdo()->prepare("SELECT speciality.id, speciality.name FROM speciality INNER JOIN statement ON statement.spec_id = speciality.id WHERE statement.stud_id = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetchAll();
    }

    public static function showList($id)
    {
        $stmt_1 = self::pdo()->prepare("SELECT budget_places, commerce_places FROM speciality WHERE id = :id");
        $stmt_1->execute(["id" => $id]);
        $param = $stmt_1->fetch();
        $bp = $param->budget_places;
        $cp = $param->commerce_places;
        $places = $bp + $cp;

        $stmt_2 = self::pdo()->prepare("SELECT *, statement.score FROM student INNER JOIN statement ON statement.stud_id = student.id WHERE statement.spec_id = :id ORDER BY statement.score DESC LIMIT $places");
        $stmt_2->execute(["id" => $id]);
        return $stmt_2->fetchAll();
    }

    public static function budgetCommerceColors($id)
    {
        $stmt = self::pdo()->prepare("SELECT budget_places, commerce_places FROM speciality WHERE id = :id");
        $stmt->execute(["id" => $id]);
        $param = $stmt->fetch();
        $bp = $param->budget_places;
        $cp = $param->commerce_places;
        return [$bp, $cp];
    }

    public static function getSpecialityNameForList($id)
    {
        $stmt = self::pdo()->prepare("SELECT name FROM speciality WHERE id = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetch();
    }

}