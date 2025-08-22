<?php

namespace Lupid\FoodFusion\Controller;

use Lupid\FoodFusion\Model\RecipeProcess;
use Helper\HTTP;
use Exception;
use PDOException;

class RecipeController
{
      public function handle(int $user_id)
      {


            foreach (['recipeName', 'recipe', 'recipeType', 'difficulty', 'message'] as $fields) {
                  if (empty($_POST[$fields]) || !isset($_POST[$fields])) {
                        $_SESSION['recipe_error'] = "Please Fill all Inuput Field!";
                        HTTP::redirect("/frontend/uploadRecipe.php");
                        return;
                  }
            }

            $recipe = new RecipeProcess();
            $recipe->setData($_POST, $_FILES);

            try {
                  $recipe->insert_to_recipe_collection($user_id);
                  $_SESSION['recipe_success']  = "Uploaded Successfully 😊";
                  HTTP::redirect("/frontend/uploadRecipe.php");
            } catch (PDOException $e) {
                  throw new Exception("Database error: " . $e->getMessage());
            }
      }
}
