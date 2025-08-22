<?php
require __DIR__ . '/../../vendor/autoload.php';

session_start();

use Lupid\FoodFusion\Controller\CookBookController;
use Helper\Auth;

$check_user = Auth::checkUser();

$controller = new CookBookController();
$controller->handle($check_user);
