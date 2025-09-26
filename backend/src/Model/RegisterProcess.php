<?php

namespace Lupid\FoodFusion\Model;

use Lupid\FoodFusion\Config\Database as dbh;
use Exception;
use PDOException;
use Helper\HTTP;
class RegisterProcess
{
      private $first_name;
      private $last_name;
      private $email;
      private $password;
      private $phone;
      private $image;
      private $pdo;
      public function __construct()
      {
            $this->pdo = (new dbh)->getPdo();
      }

      public function setData(array $data, array $files)
      {
            $this->first_name = $data['firstName'];
            $this->last_name = $data['lastName'];
            $this->email = filter_var(trim($data['email'] ?? ''), FILTER_VALIDATE_EMAIL);
            if (!$this->email) {
                  $_SESSION['register_error'] = 'Invalid email format';
                  HTTP::redirect("/frontend/registerPage.php");
                  return;
            }
            $this->password = password_hash(trim($data['pwd']) ?? '', PASSWORD_BCRYPT);
            $this->phone = $data['phone'];
            $this->image = $this->process_image($files['profile'] ?? null);
      }

      public function process_image(array $image)
      {
            if ($image['error'] === UPLOAD_ERR_NO_FILE || $image === null) {
                  // if no image, set default image
                  $this->image =  'default.jpeg';
            } else if ($image['error'] !== UPLOAD_ERR_OK) {
                  $_SESSION['register_error'] = 'Error uploading image';
                  HTTP::redirect("/frontend/registerPage.php");
                  return;
            } else {
                  $extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

                  $allowed_extension = ['jpg', 'png', 'jpeg', 'gif'];
                  if (in_array($extension, $allowed_extension)) {
                        $image_name = 'pf' . uniqid() . '.' . $extension;
                        $file_path = '../../uploads/' . $image_name;
                        if (move_uploaded_file($image['tmp_name'], $file_path)) {
                              return $image_name;
                        }
                  } else {
                        $_SESSION['register_error'] = "Invalid image format. Allowed formats: jpg, jpeg, png, gif.";
                        HTTP::redirect("/frontend/registerPage.php");
                        return;
                  }
            }
      }
      public function email_duplicate()
      {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
      }

      public function register()
      {
            try {
                  $sql = "INSERT INTO users(firstName, lastName, email, pwd, phone,image) 
            VALUES (:firstname,:lastname, :email, :pwd, :phone, :img);";

                  $stmt = $this->pdo->prepare($sql);
                  $stmt->bindParam(':firstname', $this->first_name);
                  $stmt->bindParam(':lastname', $this->last_name);
                  $stmt->bindParam(':email', $this->email);
                  $stmt->bindParam(':pwd', $this->password);
                  $stmt->bindParam(':phone', $this->phone);
                  $stmt->bindParam(':img', $this->image);
                  $stmt->execute();
            } catch (PDOException $e) {
                  throw new Exception("Database error: " . $e->getMessage());
            }
      }
}
