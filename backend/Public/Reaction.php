<?php
require __DIR__ . '/../../vendor/autoload.php';

use Lupid\FoodFusion\Controller\ReactionController;

session_start();

$reactionController = new ReactionController();
$reactionController->handle();