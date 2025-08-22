<?php
require __DIR__ . '/../../vendor/autoload.php';
session_start();

use Lupid\FoodFusion\Controller\LoginController;

try {
      $controller = new LoginController();
      $controller->handle();
} catch (PDOException $e) {
      echo $e->getMessage();
}
