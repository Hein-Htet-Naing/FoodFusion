<?php

namespace Lupid\FoodFusion\Model;

use Lupid\FoodFusion\Config\Database as dbh;
use Helper\HTTP;
use PDO;

class CookBookProcess
{
      private $recipeName;
      private $descriptions;
      private $prepTime;
      private $cookTime;
      private $servings;
      private $ingredients;
      private $instructions;
      private $recipeType;
      private $difficulty;
      private $image;
      private $pdo;

      public function __construct()
      {
            $this->pdo = (new dbh)->getPdo();
      }
      public function setData(array $data, array $files)
      {
            $this->recipeName = trim($data['recipeName']);
            $this->descriptions = trim($data['description']);
            $this->prepTime = trim($data['prepTime']);
            $this->cookTime = trim($data['cookTime']);
            $this->servings = trim($data['servings']);
            $this->ingredients = trim($data['ingredients']);
            $this->instructions = trim($data['instructions']);
            $this->recipeType = trim($data['recipeType']);
            $this->difficulty = trim($data['difficulty']);
            $this->image = $this->process_image($files['recipeImage'] ?? null);
      }
      public function process_image(array $image)
      {
            if ($image['error'] === UPLOAD_ERR_NO_FILE) {
                  // if no image, set default image
                  $_SESSION['uploadCookBook_error'] = 'Please upload an image';
                  HTTP::redirect("/frontend/uploadCookBook.php");
                  return;
            } else if ($image['error'] !== UPLOAD_ERR_OK) {
                  $_SESSION['uploadCookBook_error'] = 'Error uploading image';
                  HTTP::redirect("/frontend/uploadCookBook.php");
                  return;
            } else {
                  $extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

                  $allowed_extension = ['jpg', 'png', 'jpeg', 'gif'];
                  if (in_array($extension, $allowed_extension)) {
                        $image_name = 'cookbook' . uniqid() . '.' . $extension;
                        $file_path = '../../uploads/cookbook/' . $image_name;
                        if (move_uploaded_file($image['tmp_name'], $file_path)) {
                              return $image_name;
                        }
                  } else {
                        $_SESSION['uploadCookBook_error'] = "Invalid image format. Allowed formats: jpg, jpeg, png, gif.";
                        HTTP::redirect("/frontend/uploadCookBook.php");
                        return;
                  }
            }
      }

      public function insert_cookbook_data(int $userid)
      {
            $sql = "INSERT INTO cookbook (recipeName, description, prepTime, cookTime, serving, recipePhoto, ingredients, instructions, recipeType, difficulty, userid) 
            VALUES (:recipeName, :description, :prepTime, :cookTime, :servings, :recipePhoto, :ingredients, :instructions, :recipeType, :difficulty, :userid)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':recipeName', $this->recipeName);
            $stmt->bindParam(':description', $this->descriptions);
            $stmt->bindParam(':prepTime', $this->prepTime);
            $stmt->bindParam(':cookTime', $this->cookTime);
            $stmt->bindParam(':servings', $this->servings);
            $stmt->bindParam(':ingredients', $this->ingredients);
            $stmt->bindParam(':instructions', $this->instructions);
            $stmt->bindParam(':recipeType', $this->recipeType);
            $stmt->bindParam(':difficulty', $this->difficulty);
            $stmt->bindParam(':recipePhoto', $this->image);
            $stmt->bindParam(':userid', $userid);
            return $stmt->execute();
      }

      public function fetch_all_cookbooks()
      {
            $role = 2;
            $status = 'active';
            $sql = "SELECT c.*, u.firstName, u.lastName, u.image FROM cookbook c  
            LEFT JOIN users u ON c.userid = u.userid 
            WHERE u.status = :status AND u.role_id = :roleid
            ORDER BY c.community_id DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':status', $status);
            $stmt->bindValue(':roleid', $role);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
      //search by search term
      public function fetch_cook_by_search_term(string $searchTerm, string $difficulty)
      {
            $role = 2;
            $status = 'active';
            if ($searchTerm != '') {
                  $likeTerm = '%' . $searchTerm . '%';
                  $sql = "SELECT c.*, u.firstName, u.lastName,u.image FROM cookbook c  
                  LEFT JOIN users u ON c.userid = u.userid 
                  WHERE u.status = :status AND u.role_id = :roleid AND 
                  (c.recipeName LIKE :name OR 
                  c.description LIKE :description OR
                  c.ingredients LIKE :ingredients)
                  ORDER BY c.community_id DESC";
                  $stmt = $this->pdo->prepare($sql);
                  $stmt->bindParam(':status', $status);
                  $stmt->bindParam(':roleid', $role);
                  $stmt->bindParam(':name', $likeTerm);
                  $stmt->bindParam(':description', $likeTerm);
                  $stmt->bindParam(':ingredients', $likeTerm);
            } else {
                  $sql = "SELECT c.*, u.firstName, u.lastName,u.image FROM cookbook c  
                  LEFT JOIN users u ON c.userid = u.userid 
                  WHERE u.status = :status AND u.role_id = :roleid AND 
                  (c.difficulty = :difficulty)
                  ORDER BY c.community_id DESC";
                  $stmt = $this->pdo->prepare($sql);
                  $stmt->bindParam(':status', $status);
                  $stmt->bindParam(':roleid', $role);
                  $stmt->bindParam(':difficulty', $difficulty);
            }
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }


      public function get_cook_details($cookbookId)
      {
            $sql = "SELECT c.*, u.firstName, u.lastName, u.image FROM cookbook c
            LEFT JOIN users u ON c.userid = u.userid
            WHERE c.community_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $cookbookId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
      }
      public function fetch_Limited_cookbook()
      {
            $sql = "SELECT c.*, u.firstName, u.lastName, u.image FROM cookbook c
            LEFT JOIN users u ON c.userid = u.userid
            WHERE u.status = 'active'
            ORDER BY c.community_id DESC
            LIMIT 3";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
}
