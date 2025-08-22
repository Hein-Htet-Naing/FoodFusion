<?php
require __DIR__ . '/../../vendor/autoload.php';
session_start();

use Lupid\FoodFusion\Controller\UserlistController;

if (isset($_GET['userid'])) {
      $id = trim($_GET['userid']);
}
try {
      $controller = new UserlistController();
      $controller->handle($id);
} catch (PDOException $e) {
      echo $e->getMessage();
}
