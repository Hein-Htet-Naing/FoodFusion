<?php
session_start();
require __DIR__ . "/../vendor/autoload.php";

use Lupid\FoodFusion\Model\CookBookProcess;

$cookBookList = new CookBookProcess();
$list = $cookBookList->fetch_all_cookbooks();
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
      <title>cookbook</title>
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
                                          <h3 class="text-lg leading-6 font-medium text-gray-900">CookBook Lists</h3>
                                    </div>
                                    <div class="bg-white overflow-auto h-[80vh]">
                                          <table class="table-fixed border-collapse w-full divide-y divide-gray-200">
                                                <thead class="sticky top-0 w-full bg-gray-50">
                                                      <tr>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase w-[12%]">RecipePhoto</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase w-[15%]">recipeName</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase w-[15%]">Time</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase w-[8%]">Serving</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase w-1/4">Ingredient</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase w-[10%]">Type</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase w-[10%]">Difficulty</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase w-[10%]">User</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase w-[8%]">Reaction</th>
                                                            <th scope="col" class="relative px-6 py-3"><span class="sr-only">Edit</span></th>

                                                      </tr>
                                                </thead>

                                                <?php foreach ($list as $ls) {
                                                      echo
                                                      '
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                      <tr>
                                                            <td class="px-6 py-4">
                                                                  <div class="flex flex-col items-center">
                                                                        <div class="flex-shrink-0 h-20 w-20">
                                                                              <img class="h-full w-full rounded-full" src="../uploads/cookbook/' . htmlspecialchars($ls['recipePhoto']) . '" alt="recipe Photo">
                                                                        </div>
                                                                  </div>
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($ls['recipeName']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                  <div class="text-sm text-gray-900"> Prepare Time:
                                                                  ' . htmlspecialchars($ls['prepTime']) .  ' mins
                                                                  </div>
                                                                   <div class="text-sm text-gray-900"> Cook Time:
                                                                  ' . htmlspecialchars($ls['cookTime']) .  ' mins
                                                                  </div>
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($ls['serving']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-normal">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($ls['ingredients']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4  text-sm text-gray-500">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($ls['recipeType']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4  text-sm text-gray-500">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($ls['difficulty']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4  text-sm text-gray-500">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($ls['firstName']) . ' ' . htmlspecialchars($ls['lastName']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4  text-sm text-gray-500">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($ls['rection_count']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                                                        <a href="Public/CookBook.php?action=delete&cookbookid=' . urlencode($ls['community_id']) . '" 
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