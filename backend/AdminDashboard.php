<?php
session_start();
require __DIR__ . "/../vendor/autoload.php";

use Helper\Auth;
use Lupid\FoodFusion\Model\AdminProcess as ModelAdminProcess;
use Lupid\FoodFusion\Model\UserListProcess as ModelUserProcess;
use Lupid\FoodFusion\Model\RecipeProcess as ModelRecipeProcess;
use Lupid\FoodFusion\Model\Contactprocess as ModelMesssageProcess;
use Lupid\FoodFusion\Model\CookBookProcess as ModelCookBookProcess;

$check_user  = Auth::checkUser();

$fetch_admin = new ModelAdminProcess();
$fetch_user = new ModelUserProcess();
$fetch_recipe = new ModelRecipeProcess();
$fetch_message = new ModelMesssageProcess();
$fetch_cookbook = new ModelCookBookProcess();
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://kit.fontawesome.com/0bf00ca408.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      <title>Document</title>
</head>

<body>

</body>

</html>

<!-- Stats Cards -->

<div class='flex min-h-screen'>
      <?php require('Sidebar.php'); ?>
      <!-- Page title & actions -->

      <div class="flex flex-col">
            <div class="hidden md:flex md:items-center md:justify-between mx-2 md:mx-6 md:my-6">
                  <h1 class="text-2xl font-bold text-gray-900">Dashboard Overview</h1>
            </div>
            <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-8 place-items-center content-center-safe mx-2 md:mx-6 md:my-6">
                  <!-- admin -->
                  <div class="bg-white overflow-hidden shadow-lg rounded-lg border-gray-300">
                        <div class="px-4 py-5 sm:p-6">
                              <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-orange-500 rounded-md p-3">
                                          <i class="fa-solid fa-user-tie text-white"></i>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                          <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Admin</dt>
                                                <dd>
                                                      <div class="text-lg font-medium text-gray-900"><?= $fetch_admin->fetch_num_of_admin_from_user_table() ?></div>
                                                </dd>
                                          </dl>
                                    </div>
                              </div>
                              <div class="mt-4">
                                    <div class="border-t border-gray-200 pt-3 flex items-center justify-between">
                                          <div class="text-sm text-green-600 font-medium">
                                                <span>+12.5% from last month</span>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>

                  <!-- user -->
                  <div class="bg-white overflow-hidden shadow-lg rounded-lg border-gray-300">
                        <div class="px-4 py-5 sm:p-6">
                              <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                          <i class="fa-solid fa-people-group text-white"></i>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                          <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Total user</dt>
                                                <dd>
                                                      <div class="text-lg font-medium text-gray-900"><?= $fetch_user->fetch_user_count() ?></div>
                                                </dd>
                                          </dl>
                                    </div>
                              </div>
                              <div class="mt-4">
                                    <div class="border-t border-gray-200 pt-3 flex items-center justify-between">
                                          <div class="text-sm text-green-600 font-medium">
                                                <span>+8.2% from last month</span>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <!-- recipe -->
                  <div class="bg-white overflow-hidden shadow-lg rounded-lg border-gray-300">
                        <div class="px-4 py-5 sm:p-6">
                              <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                          <i class="fa-solid fa-bowl-food text-white"></i>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                          <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Recipe</dt>
                                                <dd>
                                                      <div class="text-lg font-medium text-gray-900"><?= $fetch_recipe->fetch_recipe_count() ?></div>
                                                </dd>
                                          </dl>
                                    </div>
                              </div>
                              <div class="mt-4">
                                    <div class="border-t border-gray-200 pt-3 flex items-center justify-between">
                                          <div class="text-sm text-red-600 font-medium">
                                                <span>+5.3% from last month</span>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>

                  <!-- message -->
                  <div class="bg-white overflow-hidden shadow-lg rounded-lg border-gray-300">
                        <div class="px-4 py-5 sm:p-6">
                              <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-green-600 rounded-md p-3">
                                          <i class="fa-solid fa-envelope text-white"></i>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                          <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Messages</dt>
                                                <dd>
                                                      <div class="text-lg font-medium text-gray-900"><?= $fetch_message->fetch_message_count() ?></div>
                                                </dd>
                                          </dl>
                                    </div>
                              </div>
                              <div class="mt-4">
                                    <div class="border-t border-gray-200 pt-3 flex items-center justify-between">
                                          <div class="text-sm text-green-600 font-medium">
                                                <span>-10.4% from last month</span>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>

                  <!-- cookbook -->
                  <div class="bg-white overflow-hidden shadow-lg rounded-lg border-gray-300">
                        <div class="px-4 py-5 sm:p-6">
                              <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-purple-600 rounded-md p-3">
                                          <i class="fa-solid fa-utensils text-white"></i>
                                    </div>

                                    <div class="ml-5 w-0 flex-1">
                                          <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">CookBook</dt>
                                                <dd>
                                                      <div class="text-lg font-medium text-gray-900"><?= $fetch_cookbook->fetch_cookbook_count() ?></div>

                                                </dd>
                                          </dl>
                                    </div>
                              </div>
                              <div class="mt-4">
                                    <div class="border-t border-gray-200 pt-3 flex items-center justify-between">
                                          <div class="text-sm text-green-600 font-medium">
                                                <span>+5.4% from last month</span>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

</div>