<?php

namespace App\Models;
use App\Database\Database;
use PDO;

class User {
    private bool|PDO $db;

    public function __construct() {
        $msg = "User model";
        $this->db = Database::connect($msg);
    }

    public function register($firstname, $lastname, $nickname, $mail, $password): string
    {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (firstname, lastname, nickname, mail, password, admin) VALUES (:firstname, :lastname, :nickname, :mail, :password, 0)");
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':nickname', $nickname);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->execute();

        return $this->db->lastInsertId();
    }

    public function login($username, $password): bool
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE nickname = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch();
        var_dump($user);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $username;
            return true;
        }
        return false;
    }

    public function logout(): void
    {
        session_destroy();
    }
}

