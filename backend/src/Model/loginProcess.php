<?php

namespace Lupid\FoodFusion\Model;

use Lupid\FoodFusion\Config\Database as dbh;
use PDO;

class loginProcess
{
      private $pdo;

      public function __construct()
      {
            $this->pdo = (new dbh)->getPdo();
      }
      public function find_user_by_email(string $email)
      {
            $sql = 'SELECT * from users WHERE email = :email;';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
      }
}
