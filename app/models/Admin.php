<?php

namespace App\models;

use App\services\Connection;

class Admin
{
    protected static function pdo($config = CONFIG_CONNECTION): \PDO
    {
        return Connection::make($config);
    }

    public static function authentification($login, $password): bool
    {
        $stmt = self::pdo()->prepare("SELECT login, password FROM committee WHERE login = :login and password = :password");
        $stmt->execute(["login" => $login, "password" => $password]);
        $admin = $stmt->fetch();

        if (!empty($admin)) {
            return true;
        }
        return false;
    }


    // COMMITTEE

    public static function allCommittee()
    {
        $stmt = self::pdo()->query("SELECT * FROM committee");
        return $stmt->fetchAll();
    }

    public static function updateCommittee($id, $login, $password, $surname)
    {
        $stmt = self::pdo()->prepare("UPDATE committee SET login = :login, password = :password, surname = :surname WHERE id = :id");
        $stmt->execute(["login" => $login, "password" => $password, "surname" => $surname, "id" => $id]);
    }

    public static function committeeByID($id)
    {
        $stmt = self::pdo()->prepare("SELECT * FROM committee WHERE id = :id");
        $stmt->execute(["id" => $id]);
        echo json_encode($stmt->fetch(), JSON_UNESCAPED_UNICODE);
    }

    public static function addCommittee($login, $password, $surname)
    {
        $stmt = self::pdo()->prepare("INSERT INTO committee(login, password, surname) VALUES (:login, :password, :surname)");
        $stmt->execute(["login" => $login, "password" => $password, "surname" => $surname]);
    }

    public static function deleteCommittee($id)
    {
        $stmt = self::pdo()->prepare("DELETE FROM committee WHERE id = :id");
        $stmt->execute(["id" => $id]);
    }


    // FACULTIES

    public static function allFaculties()
    {
        $stmt = self::pdo()->query("SELECT * FROM faculty");
        return $stmt->fetchAll();
    }

    public static function facultyByIDForImg($id)
    {
        $stmt = self::pdo()->prepare("SELECT * FROM faculty WHERE id = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetch();
    }

    public static function updateFaculty($id, $name, $short_description, $full_description, $leadership, $img, $pastImg)
    {
        if ($img != "") {
            if ($pastImg != $_SERVER["DOCUMENT_ROOT"] . "/public/img/default.png") {
                unlink($pastImg);
            }
            $stmt = self::pdo()->prepare("UPDATE faculty SET name = :name, short_description = :short_description, full_description = :full_description, leadership = :leadership, img = :img WHERE id = :id");
            $stmt->execute(["name" => $name, "short_description" => $short_description, "full_description" => $full_description, "leadership" => $leadership, "img" => "faculties/" .  $img, "id" => $id]);
        }
        $stmt = self::pdo()->prepare("UPDATE faculty SET name = :name, short_description = :short_description, full_description = :full_description, leadership = :leadership WHERE id = :id");
        $stmt->execute(["name" => $name, "short_description" => $short_description, "full_description" => $full_description, "leadership" => $leadership, "id" => $id]);
    }

    public static function facultyByID($id)
    {
        $stmt = self::pdo()->prepare("SELECT * FROM faculty WHERE id = :id");
        $stmt->execute(["id" => $id]);
        echo json_encode($stmt->fetch(), JSON_UNESCAPED_UNICODE);
    }

    public static function addFaculty($name, $short_description, $full_description, $leadership, $img)
    {
        $stmt = self::pdo()->prepare("INSERT INTO faculty(name, short_description, full_description, leadership, img) VALUES (:name, :short_description, :full_description, :leadership, :img)");
        $stmt->execute(["name" => $name, "short_description" => $short_description, "full_description" => $full_description, "leadership" => $leadership, "img" => "faculties/" . $img]);
    }

    public static function deleteFaculty($id)
    {
        $stmt = self::pdo()->prepare("DELETE FROM faculty WHERE id = :id");
        $stmt->execute(["id" => $id]);
    }


    // SPECIALITIES

    public static function allSpecialities($id)
    {
        $stmt = self::pdo()->prepare("SELECT * FROM speciality WHERE faculty_id = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetchAll();
    }

    public static function getFacultyName($id)
    {
        $stmt = self::pdo()->prepare("SELECT name FROM faculty WHERE id = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetch();
    }

    public static function specialityByID($id)
    {
        $stmt = self::pdo()->prepare("SELECT * FROM speciality WHERE id = :id");
        $stmt->execute(["id" => $id]);
        echo json_encode($stmt->fetch(), JSON_UNESCAPED_UNICODE);
    }

    public static function specialityByIDForImg($id)
    {
        $stmt = self::pdo()->prepare("SELECT * FROM speciality WHERE id = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetch();
    }

    public static function updateSpeciality($id, $name, $description, $img, $duration, $budget_places, $commerce_places, $commerce_price, $pastImg)
    {
        if ($img != "") {
            if ($pastImg != $_SERVER["DOCUMENT_ROOT"] . "/public/img/default.png") {
                unlink($pastImg);
            }
            $stmt = self::pdo()->prepare("UPDATE speciality SET name = :name, description = :description, img = :img, duration = :duration, budget_places = :budget_places, commerce_places = :commerce_places, commerce_price = :commerce_price WHERE id = :id");
            $stmt->execute(["name" => $name, "description" => $description, "img" => "specialities/" . $img, "duration" => $duration, "budget_places" => $budget_places, "commerce_places" => $commerce_places, "commerce_price" => $commerce_price, "id" => $id]);
        } else {
            $stmt = self::pdo()->prepare("UPDATE speciality SET name = :name, description = :description, duration = :duration, budget_places = :budget_places, commerce_places = :commerce_places, commerce_price = :commerce_price WHERE id = :id");
            $stmt->execute(["name" => $name, "description" => $description, "duration" => $duration, "budget_places" => $budget_places, "commerce_places" => $commerce_places, "commerce_price" => $commerce_price, "id" => $id]);
        }
    }

    public static function addSpeciality($faculty_id, $name, $description, $duration, $budget_places, $commerce_places, $commerce_price, $img = "default.png")
    {
        $stmt = self::pdo()->prepare("INSERT INTO speciality(faculty_id, name, description, duration, budget_places, commerce_places, commerce_price, img) VALUES(:faculty_id, :name, :description, :duration, :budget_places, :commerce_places, :commerce_price, :img)");
        $stmt->execute(["faculty_id" => $faculty_id, "name" => $name, "description" => $description, "duration" => $duration, "budget_places" => $budget_places, "commerce_places" => $commerce_places, "commerce_price" => $commerce_price, "img" => "specialities/" . $img,]);
    }

    public static function deleteSpeciality($id)
    {
        $stmt = self::pdo()->prepare("DELETE FROM speciality WHERE id = :id");
        $stmt->execute(["id" => $id]);
    }


    // EXAMS

    public static function allExams()
    {
        $stmt = self::pdo()->query("SELECT * FROM exams");
        return $stmt->fetchAll();
    }

    public static function specialityExams($id, $exams)
    {
        $stmt_1 = self::pdo()->prepare("DELETE FROM required_exams WHERE spec_id = :id");
        $stmt_1->execute(["id" => $id]);

        foreach ($exams as $exam) {
            $stmt_2 = self::pdo()->prepare("INSERT INTO required_exams(spec_id, exam_id) VALUES (:id, :exam)");
            $stmt_2->execute(["id" => $id, "exam" => $exam]);
        }
    }

    public static function examsForSpeciality($id)
    {
        $stmt = self::pdo()->prepare("SELECT * FROM required_exams WHERE spec_id = :id");
        $stmt->execute(["id" => $id]);
        echo json_encode($stmt->fetchAll(), JSON_UNESCAPED_UNICODE);
    }


    // STUDENT'S PAGE

    public static function personalInfoStudent($id)
    {
        $stmt = self::pdo()->prepare("SELECT statement.*, student.* FROM statement INNER JOIN student ON statement.stud_id = student.id WHERE statement.id = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetch();
    }
    
    public static function getNameStatement($stmt_id)
    {
        $stmt = self::pdo()->prepare("SELECT speciality.name FROM speciality INNER JOIN statement ON statement.spec_id = speciality.id WHERE statement.id = :stmt_id");
        $stmt->execute(["stmt_id" => $stmt_id]);
        return $stmt->fetch();
    }

    public static function examsInfoStudent($stud_id, $stmt_id)
    {
        $stmt = self::pdo()->prepare("SELECT exams_result.*, exams.name FROM exams_result INNER JOIN exams ON exams.id = exams_result.exam_id WHERE exams_result.stud_id = :id AND exams_result.stmt_id = :stmt_id");
        $stmt->execute(["id" => $stud_id, "stmt_id" => $stmt_id]);
        return $stmt->fetchAll();
    }

    public static function bonusesStudent($stud_id)
    {
        $stmt = self::pdo()->prepare("SELECT * FROM bonuses WHERE bonuses.stud_id = :id");
        $stmt->execute(["id" => $stud_id]);
        return $stmt->fetchAll();
    }

    public static function studentStatementBySpec($spec_id)
    {
        $stmt = self::pdo()->prepare("SELECT statement.id, student.surname, student.name, student.patronymic FROM student INNER JOIN statement ON student.id = statement.stud_id WHERE spec_id = :id ORDER BY statement.score DESC");
        $stmt->execute(["id" => $spec_id]);
        return $stmt->fetchAll();
    }

    public static function getSpecialityName($spec_id)
    {
        $stmt = self::pdo()->prepare("SELECT name FROM speciality WHERE id = :spec_id");
        $stmt->execute(["spec_id" => $spec_id]);
        return $stmt->fetch();
    }

    public static function allSpecialitiesWithoutID()
    {
        $stmt = self::pdo()->query("SELECT * FROM speciality");
        return $stmt->fetchAll();
    }

    public static function setScore($score)
    {
        $stmt = self::pdo()->prepare("INSERT INTO statement(score) VALUES :score");
        $stmt->execute(["score" => $score]);
    }

}