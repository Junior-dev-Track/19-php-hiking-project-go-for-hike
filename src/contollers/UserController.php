<?php
class UserController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User();
            if ($user->login($username, $password)) {
                header('Location: index.php');
            } else {
                $error = "Invalid login credentials.";
                include 'views/users/login.php';
            }
        } else {
            include 'views/users/login.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User();
            if ($user->register($username, $password)) {
                header('Location: index.php?controller=user&action=login');
            } else {
                $error = "Registration failed.";
                include 'views/users/register.php';
            }
        } else {
            include 'views/users/register.php';
        }
    }

    public function logout() {
        $user = new User();
        $user->logout();
        header('Location: index.php?controller=user&action=login');
    }
}
?>
