<?php
require __DIR__ . '../../vendor/autoload.php';
session_start();

use Helper\Auth;
use Lupid\FoodFusion\Model\CookBookProcess;

$check_user = Auth::checkUser();
$cookbookCollection = new CookBookProcess();
if (isset($_POST['difficulty']) || isset($_POST['searchTerm'])) {
      $difficulty = $_POST['difficulty'] ?? 'all';
      $searchTerm = $_POST['searchTerm'] ?? '';
      if ($difficulty != 'all' || $searchTerm != '') {
            $cookbookList = $cookbookCollection->fetch_cook_by_search_term($searchTerm ?? '', $difficulty ?? '');
      } else {
            $cookbookList = $cookbookCollection->fetch_all_cookbooks();
      }
} else {
      $cookbookList = $cookbookCollection->fetch_all_cookbooks();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://kit.fontawesome.com/0bf00ca408.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->
      <title>Cookbook Collection | FoodFusion</title>
      <!-- <link rel="stylesheet" href="../src/output.css"> -->
      <style>
            .cookbook-card {
                  transition: all 0.3s ease-in;
            }

            .cookbook-card:hover {
                  transform: translateY(-5px);
                  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            }

            .category-filter {
                  transition: all 0.2s ease-in;
            }

            .category-filter.active {
                  background-color: #f97316;
                  color: white;
            }

            .recipe-difficulty-easy {
                  background-color: #10b981;
                  color: white;
            }

            .recipe-difficulty-medium {
                  background-color: #f59e0b;
                  color: white;
            }

            .recipe-difficulty-hard {
                  background-color: #ef4444;
                  color: white;
            }
      </style>
</head>

<body class="bg-gray-50 font-sans antialiased text-shadow-lg">
      <?php require("header.php") ?>

      <!-- Hero Section -->
      <section class="bg-[url('img/baked.jpeg')] py-16 bg-cover bg-no-repeat bg-local text-[#1C1C1C] text-shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                  <h1 class="text-4xl md:text-5xl font-bold mb-6 mt-20">Explore Our Cookbook Collection</h1>
                  <p class="text-xl max-w-3xl mx-auto mb-8">Discover curated recipes from around the world, organized into beautiful cookbooks for every occasion and cuisine.</p>
                  <form method="POST" class="relative max-w-xl mx-auto">
                        <input type="text" name="searchTerm" placeholder="Search cookbooks or recipes..." class="w-full bg-white px-6 py-3 rounded-full shadow-md focus:outline-none focus:ring-2 focus:ring-[#1C1C1C] text-gray-800">
                        <button type="submit" class="absolute right-2 top-2 text-gray-800 p-1 rounded-full">
                              <i class="fas fa-search w-6 h-6"></i>
                        </button>
                  </form>
            </div>
      </section>

      <!-- Main Content -->
      <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Difficulty Filters -->
            <div class="mb-12">
                  <h2 class="text-2xl font-bold text-gray-800 mb-6">Browse by Difficulty</h2>
                  <form method="POST" class="flex flex-wrap gap-3">
                        <button type="submit" name='difficulty' value="all" class="difficulty-filter active px-4 py-2 rounded-full bg-white">All Cookbooks</button>
                        <button type="submit" name='difficulty' value="easy" class="difficulty-filter px-4 py-2 rounded-full bg-white border border-gray-300 hover:bg-gray-100">Easy</button>
                        <button type="submit" name='difficulty' value="medium" class="difficulty-filter px-4 py-2 rounded-full bg-white border border-gray-300 hover:bg-gray-100">Medium</button>
                        <button type="submit" name='difficulty' value="hard" class="difficulty-filter px-4 py-2 rounded-full bg-white border border-gray-300 hover:bg-gray-100">Hard</button>
                        <button type="submit" name='difficulty' value="difficult" class="difficulty-filter px-4 py-2 rounded-full bg-white border border-gray-300 hover:bg-gray-100">Difficult</button>
                  </form>
            </div>

            <!-- Cookbook Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                  <?php
                  foreach ($cookbookList as $cl) {
                        echo
                        '
                  <div class="cookbook-card bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="relative h-48 overflow-hidden">
                              <img src="../uploads/cookbook/' . htmlspecialchars($cl['recipePhoto']) . '" alt="Vegetarian Delights" class="w-full h-full object-cover">
                              <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full">' . htmlspecialchars($cl['recipeType']) . '</span>
                              </div>
                              <button class="like-btn absolute bottom-4 right-4 flex items-center text-white bg-black bg-opacity-50 px-2 py-1 rounded-full"
                                    cookbook_id="' . htmlspecialchars($cl['community_id']) . '">
                                    <i class="fas fa-heart mr-1"></i>
                                    <span>' . htmlspecialchars($cl['rection_count']) . '</span>
                              </button>
                        </div>
                        <div class="p-6">
                              <h3 class="text-xl font-semibold text-gray-800 mb-2">' . htmlspecialchars($cl['recipeName']) . '</h3>
                              <p class="text-gray-600 mb-4">' . htmlspecialchars($cl['description']) . '</p>
                              <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                         <span class="text-sm text-gray-600"> Difficulty: ' . htmlspecialchars($cl['difficulty']) . '</span>
                                    </div>
                              </div>
                              <div class="mt-4 pt-4 border-t border-gray-200 flex items-center justify-between">
                                    <div class="flex items-center">
                                          <img src="../uploads/' . htmlspecialchars($cl['image']) . '" alt="Author" class="w-8 h-8 rounded-full mr-2">
                                          <span class="text-sm text-gray-700">' . htmlspecialchars($cl['firstName']) . ' ' . htmlspecialchars($cl['lastName']) . '</span>
                                    </div>
                                    <a href="cookbookDetail.php?id=' . htmlspecialchars($cl['community_id']) . '" class="text-orange-500 hover:text-orange-700 font-medium">View Cookbook <i class="fas fa-arrow-right ml-1"></i></a>
                              </div>
                        </div>
                  </div>       
                        ';
                  };
                  ?>
            </div>
      </main>

      <!-- Create Your Own Section -->
      <section class="bg-orange-50 py-16 mt-12 text-[##1C1C1C] text-shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                  <h2 class="text-3xl font-bold text-gray-800 mb-6">Create Your Own Cookbook</h2>
                  <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">Share your culinary creations with the FoodFusion community by creating your own personalized cookbook.</p>
                  <a href="uploadCookbook.php" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-orange-500 hover:bg-orange-600">
                        <i class="fa-solid fa-circle-plus mr-2"></i> Start Creating
                  </a>
            </div>
      </section>

      <?php require("footer.php") ?>
      <script>
            // Difficulty filter functionality
            document.querySelectorAll('.difficulty-filter').forEach(button => {
                  button.addEventListener('click', function() {
                        document.querySelectorAll('.difficulty-filter').forEach(btn => {
                              btn.classList.remove('active');
                              btn.classList.add('bg-white', 'border', 'border-gray-300', 'hover:bg-gray-100');
                        });

                        this.classList.add('active');
                        this.classList.remove('bg-white', 'border', 'border-gray-300', 'hover:bg-gray-100');
                  });
            });
      </script>
      <script src="js/navbar.js"></script>
      <script src="js/react.js"></script>
</body>

</html>