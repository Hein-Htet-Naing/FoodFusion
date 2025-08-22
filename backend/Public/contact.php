<?php
require __DIR__ . '/../../vendor/autoload.php';
session_start();

use Helper\Auth;
use Lupid\FoodFusion\Controller\Contactcontroller;

$user_id = Auth::checkuser();
if (!$user_id) {
      echo "NO User found";
      exit;
}
$contactId = isset($_GET['contactId']) ? (int) trim($_GET['contactId']) : null;
var_dump($contactId);


try {
      $controller = new ContactController();
      $controller->run($user_id, $contactId);
} catch (PDOException $e) {
      echo $e->getMessage();
}
