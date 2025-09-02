<?php

namespace Lupid\FoodFusion\Model;

use Lupid\FoodFusion\Config\Database as dbh;
use Exception;
use PDO;
use PDOException;
use Helper\HTTP;

class RecipeProcess
{
      private $recipeName;
      private $recipe;
      private $type;
      private $difficulty;
      private $recipePhoto;
      private $description;
      private $pdo;

      public function __construct()
      {
            $this->pdo = (new dbh)->getPdo();
      }
      public function setData(array $data, array $file)
      {
            $this->recipeName = $data['recipeName'];
            $this->recipe = $data['recipe'];
            $this->type = $data['recipeType'];
            $this->difficulty = $data['difficulty'];
            $this->description = $data['message'];
            $this->recipePhoto = $this->process_image($file['photo'] ?? null);
      }
      public function process_image(array $image)
      {
            if ($image['error'] === UPLOAD_ERR_NO_FILE) {
                  $_SESSION['recipe_error']  = "Image is not found!";
                  HTTP::redirect("/frontend/uploadRecipe.php");
                  return;
            }
            if ($image['error'] !== UPLOAD_ERR_OK) {
                  $_SESSION['recipe_error']  = "Error Upload Image!";
                  HTTP::redirect("/frontend/uploadRecipe.php");
                  return;
            }

            $extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
            $allowed_extension = ['jpg', 'png', 'jpeg', 'gif'];
            if (in_array($extension, $allowed_extension)) {
                  $image_name = 'rcp_' . uniqid() . '.' . $extension;
                  $file_path = '../../uploads/recipe/' . $image_name;
                  if (move_uploaded_file($image['tmp_name'], $file_path)) {
                        return $image_name;
                  }
            } else {
                  $_SESSION['recipe_error'] = "Invalid image format. Allowed formats: jpg, jpeg, png, gif.";
                  HTTP::redirect("/frontend/uploadRecipe.php");
                  return;
            }
      }
      public function insert_to_recipe_collection($userid)
      {
            try {
                  $sql = "INSERT INTO recipe_collection(recipeName,recipe,recipeType,recipeDifficulty,recipePhoto,user_id,description) 
                  VALUES (:recipeName,:recipe,:recipeType,:recipeDifficulty,:recipePhoto,:user_id,:description)";
                  $stmt = $this->pdo->prepare($sql);
                  $stmt->bindParam(':recipeName', $this->recipeName);
                  $stmt->bindParam(':recipe', $this->recipe);
                  $stmt->bindParam(':recipeType', $this->type);
                  $stmt->bindParam(':recipeDifficulty', $this->difficulty);
                  $stmt->bindParam(':recipePhoto', $this->recipePhoto);
                  $stmt->bindParam(':user_id', $userid);
                  $stmt->bindParam(':description', $this->description);
                  $stmt->execute();
            } catch (PDOException $e) {
                  throw new Exception("Database error: " . $e->getMessage());
            }
      }

      public function fetch_all_data_from_recipeCollection()
      {
            try {
                  $sql = "SELECT rc.*,u.firstName,u.lastName FROM recipe_collection rc 
                  LEFT JOIN users u ON rc.user_id = u.userid 
                  WHERE rc.status = 'active'
                  ORDER BY rc.recipe_id DESC;";
                  $stmt = $this->pdo->prepare($sql);
                  $stmt->execute();
                  return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                  throw new Exception("Database error: " . $e->getMessage());
            }
      }

      public function search_recipe_by_name(string $searchTerm)
      {
            $likeTerm = '%' . $searchTerm . '%';
            $sql = "SELECT rc.*,u.firstName,u.lastName FROM recipe_collection rc 
                  LEFT JOIN users u ON rc.user_id = u.userid 
                  WHERE rc.recipeName LIKE :name
                  OR rc.recipeType LIKE :type
                  OR rc.recipeDifficulty LIKE :difficulty
                  OR rc.description LIKE :description
                  OR rc.recipe LIKE :recipe
                  ORDER BY rc.recipe_id DESC;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':name', $likeTerm);
            $stmt->bindParam(':type', $likeTerm);
            $stmt->bindParam(':difficulty', $likeTerm);
            $stmt->bindParam(':description', $likeTerm);
            $stmt->bindParam(':recipe', $likeTerm);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }

      public function fetch_Limited_recipe()
      {
            $sql = "SELECT rc.*, u.firstName, u.lastName FROM recipe_collection rc 
            LEFT JOIN users u ON rc.user_id = u.userid ORDER BY rc.recipe_id DESC LIMIT 3";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }

      public function update_recipe_collection(int $recipeid)
      {
            $status = "inactive";
            $sql = "UPDATE recipe_collection SET status = :status WHERE recipe_id =:recipe_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':recipe_id', $recipeid);
            $stmt->execute();
      }
      public function fetch_recipe_count()
      {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM recipe_collection WHERE status = :status");
            $status = "active";
            $stmt->bindParam(':status', $status);
            $stmt->execute();
            return $stmt->fetchColumn();
      }
}
