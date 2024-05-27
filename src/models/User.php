<?php

namespace App\Models;
use App\Database\Database;
class User {
    private bool|\PDO $db;

    public function __construct() {
        $msg = "User model";
        $this->db = Database::connect($msg);
    }

    public function register($username, $password): bool
    {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $passwordHash);
        return $stmt->execute();
    }

    public function login($username, $password): bool
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false;
    }

    public function logout(): void
    {
        session_destroy();
    }
}
?>
