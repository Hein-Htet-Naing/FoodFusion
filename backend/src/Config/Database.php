<?php

namespace Lupid\FoodFusion\Config;

use PDO;
use PDOException;

class Database
{
      private  $host = "localhost";
      private $user = "root";
      private $password = "";
      private $dbname = "foodfusion";
      private $pdo;

      protected function connect()
      {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
            $options = [
                  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                  PDO::ATTR_EMULATE_PREPARES => false
            ];
            try {
                  $this->pdo = new PDO($dsn, $this->user, $this->password, $options);
                  return $this->pdo;
            } catch (PDOException $e) {
                  die("Connection failed:" . $e->getMessage());
            }
      }

      public function getPdo()
      {
            if (!$this->pdo) {
                  $this->connect();
            }
            return $this->pdo;
      }
}
