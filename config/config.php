<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Définition des constantes de connexion à la base de données
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASS', $_ENV['DB_PASS']);
define('DB_NAME', $_ENV['DB_NAME']);

// Enregistrement de la fonction d'autoload
spl_autoload_register(function ($class_name) {
    // Dossier des contrôleurs
    if (file_exists(__DIR__ . '/controllers/' . $class_name . '.php')) {
        require_once __DIR__ . '/controllers/' . $class_name . '.php';
    }
    // Dossier des modèles
    elseif (file_exists(__DIR__ . '/models/' . $class_name . '.php')) {
        require_once __DIR__ . '/models/' . $class_name . '.php';
    }
});
?>
