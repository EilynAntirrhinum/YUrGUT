<?php

namespace App\models;

use App\services\Connection;

class Statement
{
    protected static function pdo($config = CONFIG_CONNECTION): \PDO
    {
        return Connection::make($config);
    }

    public static function insertDataInStudent($surname, $name, $patronymic, $num_certif, $school, $img, $date_birth, $address, $num_phone, $passport_num, $passport_series, $passport_get_by, $date_passport)
    {
        $stmt = self::pdo()->prepare("INSERT INTO student(surname, name, patronymic, num_certif, school, img, date_birth, address, num_phone, passport_num, passport_series, passport_get_by, date_passport) VALUES (:surname, :name, :patronymic, :num_certif, :school, :img, :date_birth, :address, :num_phone, :passport_num, :passport_series, :passport_get_by, :date_passport)");
        $stmt->execute(["surname" => $surname, "name" => $name, "patronymic" => $patronymic, "num_certif" => $num_certif, "school" => $school, "img" => $img, "date_birth" => $date_birth, "address" => $address, "num_phone" => $num_phone, "passport_num" => $passport_num, "passport_series" => $passport_series, "passport_get_by" => $passport_get_by, "date_passport" => $date_passport]);
    }

    public static function insertDataInStatement($stud_id, $spec_id)
    {
        $stmt = self::pdo()->prepare("INSERT INTO statement(stud_id, spec_id ) VALUES (:stud_id, :spec_id)");
        $stmt->execute(["stud_id" => $stud_id, "spec_id" => $spec_id]);
    }

    public static function insertDataInExamsAndBonuses($stud_id, $name, $score)
    {
        $stmt = self::pdo()->prepare("INSERT INTO bonuses(stud_id, name, score) VALUES (:stud_id, :name, :score)");
        $stmt->execute(["stud_id" => $stud_id, "name" => $name, "score" => $score]);
    }

    public static function getLastStudentID()
    {
        $stmt = self::pdo()->query("SELECT max(id) FROM student");
        return $stmt->fetch(\PDO::FETCH_COLUMN);
    }

    public static function requiredExamsBySpec($stud_id)
    {
        $stmt = self::pdo()->query("SELECT max(id) FROM statement");
        $stmt_id = $stmt->fetch(\PDO::FETCH_COLUMN);

        $stmt_1 = self::pdo()->prepare("SELECT spec_id FROM statement WHERE stud_id = :stud_id and id = :stmt_id");
        $stmt_1->execute(["stud_id" => $stud_id, "stmt_id" => $stmt_id]);
        $param = $stmt_1->fetch();

        $stmt_2 = self::pdo()->prepare("SELECT required_exams.exam_id, exams.name FROM required_exams INNER JOIN exams ON required_exams.exam_id = exams.id WHERE spec_id = :param");
        $stmt_2->execute(["param" => $param->spec_id]);
        return $stmt_2->fetchAll();

    }

    public static function insertExamsResult($stud_id, $exams_result)
    {
        $stmt_1 = self::pdo()->prepare("SELECT id FROM statement WHERE stud_id = :stud_id");
        $stmt_1->execute(["stud_id" => $stud_id]);
        $stmt_id = $stmt_1->fetch();

        $stmt_2 = self::pdo()->prepare("SELECT spec_id FROM statement WHERE stud_id = :stud_id");
        $stmt_2->execute(["stud_id" => $stud_id]);
        $spec_id = $stmt_2->fetch();

        $exams = self::requiredExamsBySpec($stud_id);

        foreach ($exams as $exam) {
            $stmt_3 = self::pdo()->prepare("INSERT INTO exams_result(stmt_id, stud_id, spec_id, exam_id, score) VALUES(:stmt_id, :stud_id, :spec_id, :exam_id, :score)");
            $stmt_3->execute(["stmt_id" => $stmt_id->id, "stud_id" => $stud_id, "spec_id" => $spec_id->spec_id, "exam_id" => $exam->exam_id, "score" => $exams_result[$exam->exam_id]]);
        }
    }

    public static function getSpecialities()
    {
        $stmt = self::pdo()->query("SELECT id, name, faculty_id FROM speciality");
        return $stmt->fetchAll();
    }

    public static function getFaculties()
    {
        $stmt = self::pdo()->query("SELECT id, name FROM faculty");
        return $stmt->fetchAll();
    }

    public static function generationLoginAndPassword()
    {
        $login = self::getLastStudentID();

        $charsPassword = "qazwsxedcrfvtgbyhnujmikolp1234567890QAZWSXEDCRFVTGBYHNUJMIKOLP";

        $password = substr(str_shuffle($charsPassword), 0, 8);

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt = self::pdo()->prepare("UPDATE student SET login = :login, password = :password WHERE id = :id");
        $stmt->execute(["login" => $login, "password" => $hashedPassword, "id" => $login]);

        return ["login" => $login, "password" => $password];
    }

    public static function pushScore($stud_id, $score)
    {
        $stmt = self::pdo()->prepare("UPDATE statement SET score = :score WHERE stud_id = :id");
        $stmt->execute(["score" => $score, "id" => $stud_id]);
    }
}