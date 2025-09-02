<?php
require __DIR__ . '/../../vendor/autoload.php';

use Lupid\FoodFusion\Controller\JoinUsController;

session_start();


$controller = new JoinUsController();
$controller->handle();