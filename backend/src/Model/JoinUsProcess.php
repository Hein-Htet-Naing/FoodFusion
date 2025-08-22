<?php

namespace Lupid\FoodFusion\Model;

use Lupid\FoodFusion\Config\Database as dbh;
use Helper\HTTP;

class JoinUsProcess
{
      private $firstName;
      private $lastName;
      private $email;
      private $password;
      private $pdo;
      public function __construct()
      {
            $this->pdo = (new dbh)->getPdo();
      }
      public function setData(array $data)
      {
            $this->firstName = $data['firstName'];
            $this->lastName = $data['lastName'];
            $this->email = filter_var(trim($data['email'] ?? ''), FILTER_VALIDATE_EMAIL);
            if (!$this->email) {
                  $_SESSION['register_error'] = 'Invalid email format';
                  HTTP::redirect("/frontend/index.php");
                  return;
            }
            $this->password = password_hash(trim($data['pwd']) ?? '', PASSWORD_BCRYPT);
      }

      public function email_duplicate()
      {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
      }
      public function join_us()
      {
            $sql = " INSERT INTO users (firstName,lastName,email,pwd) 
            VALUES (:first_name,:last_name,:email,:password)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':first_name', $this->firstName);
            $stmt->bindParam(':last_name', $this->lastName);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
      }
}
