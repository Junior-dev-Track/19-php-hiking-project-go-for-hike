<?php

use App\Models\User;

class UserController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $user = new User();
            if ($user->login($username, $password)) {
                header('Location: index.php');
            } else {
                $error = "Invalid login credentials.";
                include __DIR__ . '/../views/users/login.php';
            }
        } else {
            include __DIR__ . '/../views/users/login.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['lastname']);
            $mail = trim($_POST['mail']);
            $confirmPassword = trim($_POST['confirm_password']);
            $passwordHash = password_hash(trim($password), PASSWORD_DEFAULT);
            if ($password != $confirmPassword) {
                $error = "Passwords do not match.";
                include __DIR__ . '/../views/users/register.php';
                exit;
            }

            $user = new User();
            $id = $user->register($firstname, $lastname, $username, $mail, $password);
            if ($id > 0) {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $id;
                header('Location: index.php');
            } else {
                $error = "Registration failed.";
                include __DIR__ . '/../views/users/register.php';
            }
        } else {
            include __DIR__ . '/../views/users/register.php';
        }
    }

    public function logout() {
        $user = new User();
        $user->logout();
        header('Location: index.php?controller=user&action=login');
    }
}

