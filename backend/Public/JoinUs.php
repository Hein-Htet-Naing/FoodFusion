<?php
require __DIR__ . '/../../vendor/autoload.php';

use Lupid\FoodFusion\Controller\AdminController;

session_start();


$controller = new AdminController();
$controller->handle();