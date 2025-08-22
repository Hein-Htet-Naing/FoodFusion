<?php
require __DIR__ . '/../../vendor/autoload.php';
session_start();
use Helper\Auth;
use Lupid\FoodFusion\Controller\RecipeController;


try {
      $user = Auth::checkuser();
      $user_id = $user;

      $controller = new RecipeController();
      $controller->handle($userid);
} catch (PDOException $e) {
      echo $e->getMessage();
}
