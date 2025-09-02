<?php

namespace Lupid\FoodFusion\Model;

use Lupid\FoodFusion\Config\Database as dbh;
use Helper\HTTP;
use PDOException;
use Exception;
use PDO;

class AdminProcess
{
      private $first_name;
      private $last_name;
      private $email;
      private $password;
      private $phone;
      private $role;
      private $image;
      private $pdo;
      public function __construct()
      {
            $this->pdo = (new dbh)->getPdo();
      }

      public function setData(array $data, array $files)
      {
            $this->first_name = $data['admin_f_name'];
            $this->last_name = $data['admin_l_name'];
            $this->email = filter_var(trim($data['AdminEmail'] ?? ''), FILTER_VALIDATE_EMAIL);
            if (!$this->email) {
                  $_SESSION['admin_error'] = 'Invalid email format';
                  HTTP::redirect("/backend/uploadAdmin.php");
                  return;
            }
            $this->password = password_hash(trim($data['Adminpwd']) ?? '', PASSWORD_BCRYPT);
            $this->phone = $data['AdminPhone'];
            $this->role = (int)$data['AdminRole'];
            $this->image = $this->process_image($files['AdminPhoto'] ?? null);
      }

      public function process_image(array $image)
      {
            if ($image['error'] === UPLOAD_ERR_NO_FILE) {
                  // if no image, set default image
                  $this->image =  'default.jpeg';
            } else if ($image['error'] !== UPLOAD_ERR_OK) {
                  $_SESSION['admmin_error'] = 'Error uploading image';
                  HTTP::redirect("/frontend/registerPage.php");
                  return;
            } else {
                  $extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

                  $allowed_extension = ['jpg', 'png', 'jpeg', 'gif'];
                  if (in_array($extension, $allowed_extension)) {
                        $image_name = 'adm' . uniqid() . '.' . $extension;
                        $file_path = '../../uploads/admin/' . $image_name;
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
      public function insert_admin_to_users()
      {
            try {
                  $sql = "INSERT INTO users(firstName, lastName, email, pwd, phone,image,role_id) 
            VALUES (:firstname,:lastname, :email, :pwd, :phone, :img,:roleid);";

                  $stmt = $this->pdo->prepare($sql);
                  $stmt->bindParam(':firstname', $this->first_name);
                  $stmt->bindParam(':lastname', $this->last_name);
                  $stmt->bindParam(':email', $this->email);
                  $stmt->bindParam(':pwd', $this->password);
                  $stmt->bindParam(':phone', $this->phone);
                  $stmt->bindParam(':img', $this->image);
                  $stmt->bindParam(':roleid', $this->role);
                  $stmt->execute();
            } catch (PDOException $e) {
                  throw new Exception("Database error: " . $e->getMessage());
            }
      }
      public function fetch_num_of_admin_from_user_table()
      {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE role_id = :admin_id OR role_id = :chef_id");
            $stmt->bindValue(':admin_id', 1, PDO::PARAM_INT);
            $stmt->bindValue(':chef_id', 3, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchColumn();
      }
}
