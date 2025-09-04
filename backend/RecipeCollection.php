<?php
session_start();
require __DIR__ . "/../vendor/autoload.php";

use Lupid\FoodFusion\Model\RecipeProcess;
use Helper\Auth;

$check_admin = Auth::checkAdmin();
if ($check_admin) {
      $recipelist = new RecipeProcess();
      $list = $recipelist->fetch_all_data_from_recipeCollection();
}

if (isset($_SESSION['delete_success'])) {
      echo '<script>alert(' . $_SESSION['deleted_success'] . ') </script>';
      unset($_SESSION['delete_success']);
}
if (isset($_SESSION['delete_error'])) {
      echo '<script>alert(' . $_SESSION['deleted_error'] . ') </script>';
      unset($_SESSION['delete_error']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      <title>Document</title>
      <style>
            /* Hide scrollbar for Chrome, Safari and Opera */
            .scroll_hidden::-webkit-scrollbar {
                  display: none !important;
            }

            /* Hide scrollbar for IE, Edge and Firefox */
            .scroll_hidden {
                  -ms-overflow-style: none !important;
                  /* IE and Edge */
                  scrollbar-width: none !important;
                  /* Firefox */
            }
      </style>
</head>

<body>
      <main class="flex h-screen bg-gray-100 ">

            <?php require_once('Sidebar.php'); ?>
            <div class="flex-1 flex flex-col overflow-hidden">

                  <!-- Main content -->
                  <div class="w-full flex-1 p-6 scroll_hidden">
                        <div class="min-h-screen mt-10 md:mt-0">
                              <!-- showing Recipes -->
                              <div class="bg-white shadow rounded-lg">
                                    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                          <h3 class="text-lg leading-6 font-medium text-gray-900">Recipe Lists</h3>
                                    </div>
                                    <div class="bg-white overflow-auto h-[80vh]">
                                          <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="sticky top-0 w-full bg-gray-50">
                                                      <tr>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Recipe Name</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Recipe</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Difficulty</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Desctiption</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created_At</th>
                                                            <th scope="col" class="relative px-6 py-3"><span class="sr-only">Edit</span></th>
                                                      </tr>
                                                </thead>

                                                <?php foreach ($list as $ls) {
                                                      echo
                                                      '
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                      <tr>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                  <div class="flex items-center">
                                                                        <div class="flex-shrink-0 h-20 w-20">
                                                                              <img class="h-full w-full rounded-full" src="../uploads/recipe/' . htmlspecialchars($ls['recipePhoto']) . '" alt="">
                                                                        </div>
                                                                  </div>
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                  <div class="text-sm text-gray-900">' . htmlspecialchars($ls['recipeName']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($ls['recipe']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($ls['recipeType']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4  text-sm text-gray-500">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($ls['recipeDifficulty']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4  text-sm text-gray-500">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($ls['description']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4  text-sm text-gray-500">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($ls['created_at']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                                                        <a href="Public/Recipe.php?action=delete&recipeid=' . urlencode($ls['recipe_id']) . '" 
                                                                        class="px-4 py-1 bg-orange-400 border border-orange-400 text-white hover:text-orange-900"
                                                                        onclick="return confirm(\'Are you sure you want to delete this recipe?\');">Delete</a>
                                                            </td>
                                                </tbody>
                                                ';
                                                };
                                                ?>
                                          </table>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </main>
</body>

</html>



<!-- <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Published</span> -->