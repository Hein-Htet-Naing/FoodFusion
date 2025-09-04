<?php
require __DIR__ . '/../../vendor/autoload.php';

session_start();

use Lupid\FoodFusion\Controller\CookBookController;
use Helper\Auth;

if (isset($_GET['cookbookid'])) {
      $cookbook_id = trim($_GET['cookbookid']);
}


$check_user = Auth::checkUser();

$controller = new CookBookController();
$controller->handle($check_user, $cookbook_id);
