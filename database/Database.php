<?php
namespace App\Database;
require '.env';
use PDO;
use PDOException;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable('../..');
$dotenv->load();

/**
 * Classe DBLink : gestionnaire de la connexion à la base de données
 * @author Vincent MARTIN
 * @version 2.0
 */
class Database {
    /**
     * Se connecte à la base de données
     * @return PDO|false Objet de liaison à la base de données ou false si erreur
     *@var string $message ensemble des messages à retourner à l'utilisateur, séparés par un saut de ligne
     * @var string $base Nom de la base de données
     */
    public static function connect(string &$message): bool|PDO
    {
        try {
        $link = new PDO('mysql:host=' . getenv('MYHOST') . ';dbname=' . getenv('BD') . ';charset=UTF8', getenv('MYUSER'), getenv('MYPASS'));
        $link->exec("set names utf8");
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $message .= $e->getMessage().'<br>';
            $link = false;
        }
        return $link;
    }

    /**
     * Déconnexion de la base de données
     * @var PDO $link Objet de liaison à la base de données
     */
    public static function disconnect (&$link) {
        $link = null;
    }
}

