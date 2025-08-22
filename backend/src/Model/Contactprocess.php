<?php

namespace Lupid\FoodFusion\Model;

use Lupid\FoodFusion\Config\Database as dbh;
use Helper\HTTP;
use PDO;

class Contactprocess
{
      private $pdo;
      private $name;
      private $email;
      private $subject;
      private $message;

      public function __construct()
      {
            $this->pdo = (new dbh)->getPdo();
      }
      public function setData(array $data)
      {
            $this->name = $data['name'];
            $this->email = filter_var(trim($data['email']), FILTER_VALIDATE_EMAIL);
            if (!$this->email) {
                  HTTP::redirect("/frontend/contact_us.php", "status=error");
                  return;
            }
            $this->subject = $data['subject'];
            $this->message = $data['message'];
      }

      public function insert_contact_data($userid)
      {
            $sql = "INSERT INTO contact_submit (name, email, subject, message,user_id) 
            VALUES (:name, :email, :subject, :message,:userid)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':subject', $this->subject);
            $stmt->bindParam(':message', $this->message);
            $stmt->bindParam(':userid', $userid);
            $stmt->execute();
      }
      public function fetch_all_messsage()
      {
            // $status = 'pending';
            $sql = "SELECT * FROM contact_submit";
            $stmt = $this->pdo->prepare($sql);
            // $stmt->bindParam(':status', $status);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }

      public function update_message_from_contact_table(int $id)
      {
            $sql = "UPDATE contact_submit SET status = :read WHERE contact_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $read = 'read';
            $stmt->bindParam(':read', $read);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            //return true if row is deleted
            return $stmt->rowCount() > 0;
      }
}
