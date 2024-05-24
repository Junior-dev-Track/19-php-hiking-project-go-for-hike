<?php
session_start();
require_once 'config/config.php';
require_once 'database/Database.php';

// Inclusion des modèles si nécessaire
require_once 'models/Hike.php';
require_once 'models/User.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'hike';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controller = ucfirst($controller) . 'Controller';
$controllerFile = 'controllers/' . $controller . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerInstance = new $controller();
    $controllerInstance->$action();
} else {
    die("Controller file $controllerFile not found.");
}
?>


