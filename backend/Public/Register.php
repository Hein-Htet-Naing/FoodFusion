<?php
require __DIR__ . '/../../vendor/autoload.php';
session_start();


use Lupid\FoodFusion\Controller\RegisterController;

try {
      $controller = new RegisterController();
      $controller->handle();
} catch (PDOException $e) {
      echo $e->getMessage();
}
