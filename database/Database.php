<?php
//require_once __DIR__ . '/../.env';


require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . './src/controllers/HikeController.php';

class Database {
   private static $instance = null;
   private $connection;

  private function __construct() {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->connection->connect_error) {
           die("Connection failed: " . $this->connection->connect_error);
       }
  }

    public static function getInstance() {
       if (!self::$instance) {
           self::$instance = new Database();
       }
       return self::$instance;
   }

   public function getConnection() {
       return $this->connection;
   }
}




?>


