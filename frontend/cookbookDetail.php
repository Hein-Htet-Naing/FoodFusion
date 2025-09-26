<?php
require __DIR__ . '../../vendor/autoload.php';
session_start();

use Helper\Auth;
use Lupid\FoodFusion\Model\CookBookProcess;

$check_user = Auth::checkUser();
$cookbook = new CookBookProcess();
if (isset($_GET['id'])) {
      $cookbookId = $_GET['id'];
}
$cookbookDetails = $cookbook->get_cook_details($cookbookId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      <script src="https://kit.fontawesome.com/0bf00ca408.js" crossorigin="anonymous"></script>
      <title>Document</title>
</head>
<body class="bg-orange-100 font-sans antialiased text-shadow-lg">
      <?php require('header.php') ?>
      <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-orange-100">
            <h1 class="text-3xl font-bold mb-4 pt-18">Cookbook Details</h1>
            <div class="bg-white rounded-lg shadow-md p-6 w-full">
                  <div class="flex flex-col md:flex-row mb-4">
                        <img class="w-full md:w-1/2 rounded-lg mr-4" src="../uploads/cookbook/<?= $cookbookDetails['recipePhoto'] ?>" alt="Cookbook Image">
                        <div class=" w-full md:w-1/2 flex flex-col items-start mb-4">
                              <h2 class="text-2xl font-semibold mb-4"><?= $cookbookDetails['recipeName'] ?></h2>
                              <p class="text-gray-600"><span class="font-semibold text-lg">Servings:</span> <?= $cookbookDetails['serving'] ?></p>
                              <p class="text-gray-600"><span class="font-semibold text-lg">Prep Time:</span> <?= $cookbookDetails['prepTime'] ?></p>
                              <p class="text-gray-600"><span class="font-semibold text-lg">Cook Time:</span> <?= $cookbookDetails['cookTime'] ?></p>
                              <p class="text-gray-600"><span class="font-semibold text-lg">Difficulty:</span> <?= $cookbookDetails['difficulty'] ?></p>
                              <p class="text-gray-600"><span class="font-semibold text-lg">Recipe Type:</span> <?= $cookbookDetails['recipeType'] ?></p>
                              <p class="text-gray-700 mb-4"><span class="font-semibold text-lg">Description:</span> <?= $cookbookDetails['description'] ?></p>
                              <p class="text-gray-700 mb-4"><span class="font-semibold text-lg">Ingredients:</span> <?= $cookbookDetails['ingredients'] ?></p>
                              <p class="text-gray-700 mb-4"><span class="font-semibold text-lg">Instructions:</span> <?= $cookbookDetails['instructions'] ?></p>
                        </div>
                  </div>
                  <div class="flex justify-between items-center">
                        <div class="flex items-center">
                              <img src="../uploads/<?= $cookbookDetails['image'] ?>" alt="Author" class="w-10 h-10 rounded-full mr-2">
                              <span class="text-sm text-gray-600">by <?= $cookbookDetails['firstName'] . ' ' . $cookbookDetails['lastName'] ?></span>
                        </div>
                        <div>
                              <a class="bg-[#1C1C1C] text-white py-2 px-4 rounded" href="../uploads/cookbook/<?= $cookbookDetails['recipePhoto'] ?>" download>download</a>
                        </div>
                        <div>
                              <a class="bg-[#1C1C1C] text-white py-2 px-4 rounded" href="cookbookCollection.php">BACK</a>
                        </div>

                  </div>
            </div>
      </main>
      <?php require('footer.php') ?>
      <script src="js/navbar.js"></script>
</body>

</html>