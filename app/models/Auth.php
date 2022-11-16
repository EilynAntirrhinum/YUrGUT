<?php

namespace App\models;

use App\services\Connection;

class Auth
{
    protected static function pdo($config = CONFIG_CONNECTION): \PDO
    {
        return Connection::make($config);
    }

    public static function authentification($login, $password)
    {
        $stmt = self::pdo()->prepare("SELECT login, password FROM student WHERE login = :login");
        $stmt->execute(["login" => $login]);
        $student = $stmt->fetch();

        if (!empty($student)) {
            return password_verify($password, $student->password);
        }

        return false;
    }
}