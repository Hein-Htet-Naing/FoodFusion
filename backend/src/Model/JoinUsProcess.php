<?php

namespace Lupid\FoodFusion\Model;

use Lupid\FoodFusion\Config\Database as dbh;
use Helper\HTTP;
use PDOException;
use Exception;

class JoinUsProcess
{
      private $firstName;
      private $lastName;
      private $email;
      private $pwd;
      private $image;
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
            $this->pwd = password_hash(trim($data['pwd']) ?? '', PASSWORD_BCRYPT);
            $this->image =  'default.jpeg';
      }

      public function email_duplicate()
      {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
      }
      public function join_us()
      {
            $sql = "INSERT INTO users (firstName,lastName,email,pwd,image) 
                  VALUES (:firstName,:lastName,:email,:pwd,:image)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':firstName', $this->firstName);
            $stmt->bindValue(':lastName', $this->lastName);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':pwd', $this->pwd);
            $stmt->bindValue(':image', $this->image);
            $stmt->execute();
      }
}
