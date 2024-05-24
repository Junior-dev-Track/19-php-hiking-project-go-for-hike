<?php
session_start();
require_once 'config/config.php';
require_once 'database/Database.php';
$user = new User();
$user->logout();
header('Location: index.php?controller=user&action=login');
?>