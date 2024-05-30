<?php
session_start();
require_once 'database/Database.php';
require_once __DIR__ . '/vendor/autoload.php';

// Inclusion des modèles si nécessaire
require_once __DIR__ . '/src/models/Hike.php';
require_once __DIR__ . '/src/models/User.php';

$controller = $_GET['controller'] ?? 'hike';
$action = $_GET['action'] ?? 'index';

$controller = ucfirst($controller) . 'Controller';
$controllerFile = 'src/controllers/' . $controller . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerInstance = new $controller();
    $controllerInstance->$action();
} else {
    die("Controller file $controllerFile not found.");
}
