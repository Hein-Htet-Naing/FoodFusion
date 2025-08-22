<?php
require __DIR__ . '../../vendor/autoload.php';
session_start();

use Helper\Auth;
use Lupid\FoodFusion\Model\RecipeProcess;

$check_user = Auth::checkUser();

$recipe_colllection = new RecipeProcess();
$search = '';
if (isset($_GET['search'])) {
      $search = trim($_GET['search']);
}
if (!$search) {
      $recipe = $recipe_colllection->fetch_all_data_from_recipeCollection();
} else {
      $recipe = $recipe_colllection->search_recipe_by_name($search);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- <link rel="stylesheet" href="../src/output.css"> -->
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      <script src="https://kit.fontawesome.com/0bf00ca408.js" crossorigin="anonymous"></script>
      <title>Document</title>
      <style>
            .recipe-card {
                  transition: all 0.3s ease;
            }

            .recipe-card:hover {
                  transform: scale(1.02);
                  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            }
      </style>
</head>

<body class="font-sans antialiased">
      <?php require('header.php') ?>

      <main class="text-shadow-lg bg-gradient-to-b from-orange-100 to-white min-h-screen">
            <section class="relative text-black pt-20">
                  <div class="container mx-auto px-6 text-center mt-10">
                        <h1 class="text-4xl md:text-5xl font-bold mb-6">Explore Our Recipe Collection</h1>
                        <p class="text-xl max-w-3xl mx-auto">Discover delicious recipes from around the world, curated for every skill level and dietary preference.</p>
                  </div>
                  <div class="absolute bottom-0 left-0 right-0 h-16 bg-white transform skew-y-1 -z-1"></div>
            </section>

            <!-- Search and Filters -->
            <section class="py-8 px-6 max-w-7xl mx-auto">
                  <div class="bg-white rounded-xl shadow-md p-6">

                        <!-- Search Bar -->
                        <div class="flex-1">
                              <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search Recipes</label>
                              <!-- filter the dishes -->
                              <form class="relative flex items-center  gap-1 md:gap-4" action="" method="GET">
                                    <input type="text" id="search" name="search" placeholder="What are you craving?"
                                          value="<?php htmlspecialchars($search); ?>"
                                          class="w-full pl-10 pr-4 py-3 border border-[#ccc] rounded-lg focus:outline-none focus:ring-1">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                          <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                          </svg>
                                    </div>
                                    <input id='serchButton' type="submit" class="bg-orange-500 text-white font-semibold py-2 px-4 rounded-sm hover:bg-orange-600 transition-colors duration-300"
                                          value="Search">
                              </form>
                        </div>
                  </div>
            </section>

            <!-- Recipe Grid -->
            <section class="py-12 px-6 max-w-7xl mx-auto mt-10 relative bg-cover bg-no-repeat bg-fixed bg-[url(img/lunch_easy.jpeg)]">
                  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="absolute inset-0 backdrop-blur-lg z-0"></div>
                        <!-- card with  a frosted glass or glassmorphism background -->

                        <?php foreach ($recipe as $rp) {
                              echo
                              '
                                    <div class="recipe-card bg-white/70 backdrop-blur-xl relative my-8 rounded-xl shadow-md p-4 text-center 
                                    perspective-midrange transform-3d max-w-[300px]">
                                   
                                          <img src="../uploads/recipe/' . htmlspecialchars($rp['recipePhoto']) . ' " alt="' . htmlspecialchars($rp['recipeName']) . '"
                                          class="w-30 h-30 mx-auto rounded-full absolute object-cover 
                                                translate-z-40 -translate-y-10">
                                          <div class="flex w-full">
                                                <p class="w-1/2"></p>
                                                <h3 class="w-2/3 text-xl font-bold mb-1 text-right pr-2">' . htmlspecialchars($rp['recipeName']) . '</h3>
                                          </div>
                                          <div class="text-shadow-lg px-4 mb-2">
                                                <p class="text-lg font-semibold text-gray-500 mb-1 text-right">
                                                      <span class="text-lg font-semibold text-gray-800">Type: </span>
                                                ' . htmlspecialchars($rp['recipeType']) . '
                                                </p>
                                                <p class="text-base text-gray-800 text-justify">' . htmlspecialchars($rp['description']) . '</p>

                                                <p class="text-sm text-gray-500 mb-2 text-justify mt-2">
                                                      <span class="text-lg font-semibold text-gray-800 whitespace-pre-line">Recipe: </span>
                                                      ' . htmlspecialchars($rp['recipe']) . '
                                                </p>
                                                
                                                <p class="text-lg font-semibold text-gray-500 text-left"><span class="text-lg font-semibold text-gray-800">Difficulty: </span>' . htmlspecialchars($rp['recipeDifficulty']) . '</p>
                                          </div>
                                          <div class="flex justify-between px-4 border-t-4 border-[#ccc]">
                                                <small>' . htmlspecialchars($rp['firstName']) . ' ' . htmlentities($rp['lastName']) . '</small>
                                                <small>' . date('y-m-d', strtotime(htmlspecialchars($rp['created_at']))) . '</small>
                                          </div>
                                    </div>
                                    ';
                        } ?>
                  </div>
            </section>

      </main>
      <?php require('footer.php') ?>
      <script src="js/navbar.js"></script>
</body>

</html>

<!-- <nav class="flex items-center space-x-2">
      <button class="px-3 py-1 rounded-md bg-orange-500 text-white">1</button>
      <button class="px-3 py-1 rounded-md bg-white border border-gray-300 hover:bg-gray-50">2</button>
      <button class="px-3 py-1 rounded-md bg-white border border-gray-300 hover:bg-gray-50">3</button>
      <span class="px-2">...</span>
      <button class="px-3 py-1 rounded-md bg-white border border-gray-300 hover:bg-gray-50">8</button>
      <button class="px-3 py-1 rounded-md bg-white border border-gray-300 hover:bg-gray-50">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
      </button>
</nav>
</div>
</section> -->