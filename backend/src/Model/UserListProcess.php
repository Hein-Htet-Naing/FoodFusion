<?php

namespace Lupid\FoodFusion\Model;

use Lupid\FoodFusion\Config\Database as dbh;
use PDO;
use Helper\HTTP;

class UserListProcess
{
      private $pdo;
      public function __construct()
      {
            $this->pdo = (new dbh)->getPdo();
      }

      public function fetch_all_user_from_users_table()
      {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE role_id = :roleid AND status = :status ORDER BY userid DESC");
            $id = 2;
            $status = "active";
            $stmt->bindParam(':roleid', $id);
            $stmt->bindParam(':status', $status);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
      public function fetch_admin(int $userid)
      {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE userid = :userid");
            $stmt->bindParam(':userid', $userid);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
      }


      public function delete_user(int $id)
      {
            $stmt = $this->pdo->prepare("UPDATE users SET status = :status WHERE userid = :userid");
            $status = "inactive";
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':userid', $id);
            $stmt->execute();
            //return true if row is deleted
            return $stmt->rowCount() > 0;
      }
      public function fetch_user_count()
      {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE role_id = :roleid AND status = :status");
            $id = 2;
            $status = "active";
            $stmt->bindParam(':roleid', $id);
            $stmt->bindParam(':status', $status);
            $stmt->execute();
            return $stmt->fetchColumn();
      }
}
