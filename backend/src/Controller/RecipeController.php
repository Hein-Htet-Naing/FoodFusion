<?php

namespace Lupid\FoodFusion\Controller;

use Lupid\FoodFusion\Model\RecipeProcess;
use Helper\HTTP;
use Exception;
use PDOException;

class RecipeController
{
      public function handle(int $user_id, int $recipe_id)
      {
            $recipe = new RecipeProcess();

            if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($recipe_id)) {
                  $recipe->update_recipe_collection($recipe_id);
                  $_SESSION['delete_success']  = "Deleted Successfully";
                  HTTP::redirect("../backend/RecipeCollection.php");
            } else {
                  //upload recipe here
                  foreach (['recipeName', 'recipe', 'recipeType', 'difficulty', 'message'] as $fields) {
                        if (empty($_POST[$fields]) || !isset($_POST[$fields])) {
                              $_SESSION['recipe_error'] = "Please Fill all Inuput Field!";
                              HTTP::redirect("../backend/uploadRecipe.php");
                              return;
                        }
                  }
                  //encapsulate data
                  $recipe->setData($_POST, $_FILES);

                  try {
                        $recipe->insert_to_recipe_collection($user_id);
                        $_SESSION['recipe_success']  = "Uploaded Successfully 😊";
                        HTTP::redirect("../backend/RecipeCollection.php");
                  } catch (PDOException $e) {
                        throw new Exception("Database error: " . $e->getMessage());
                  }
            }
      }
}
