<?php
require __DIR__ . '/../../vendor/autoload.php';
session_start();

use Helper\Auth;
use Lupid\FoodFusion\Controller\RecipeController;

if (isset($_GET['recipeid'])) {
      $recipe_id = trim($_GET['recipeid']);
}

try {
      $user = Auth::checkuser();
      $user_id = $user;

      $controller = new RecipeController();
      $controller->handle($user_id, $recipe_id);
} catch (PDOException $e) {
      echo $e->getMessage();
}
