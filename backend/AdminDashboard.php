<?php
session_start();
require __DIR__ . "/../vendor/autoload.php";

use Helper\Auth;
use Lupid\FoodFusion\Model\AdminProcess as ModelAdminProcess;
use Lupid\FoodFusion\Model\UserListProcess as ModelUserProcess;
use Lupid\FoodFusion\Model\RecipeProcess as ModelRecipeProcess;
use Lupid\FoodFusion\Model\Contactprocess as ModelMesssageProcess;

$check_user  = Auth::checkUser();

$fetch_admin = new ModelAdminProcess();
$fetch_user = new ModelUserProcess();
$fetch_recipe = new ModelRecipeProcess();
$fetch_message = new ModelMesssageProcess();
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
            <div class="hidden md:flex md:items-center md:justify-between mx-2 md:my-6">
                  <h1 class="text-2xl font-bold text-gray-900">Dashboard Overview</h1>
            </div>
            <div class="flex gap-8 md:flex-shrink ">
                  <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                              <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-orange-500 rounded-md p-3">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                <path d="M320 312C253.7 312 200 258.3 200 192C200 125.7 253.7 72 320 72C386.3 72 440 125.7 440 192C440 258.3 386.3 312 320 312zM289.5 368L350.5 368C360.2 368 368 375.8 368 385.5C368 389.7 366.5 393.7 363.8 396.9L336.4 428.9L367.4 544L368 544L402.6 405.5C404.8 396.8 413.7 391.5 422.1 394.7C484 418.3 528 478.3 528 548.5C528 563.6 515.7 575.9 500.6 575.9L139.4 576C124.3 576 112 563.7 112 548.6C112 478.4 156 418.4 217.9 394.8C226.3 391.6 235.2 396.9 237.4 405.6L272 544.1L272.6 544.1L303.6 429L276.2 397C273.5 393.8 272 389.8 272 385.6C272 375.9 279.8 368.1 289.5 368.1z" />
                                          </svg>
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


                  <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                              <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                          <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                          </svg>
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

                  <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                              <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                          <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                          </svg>
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


                  <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                              <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-green-600 rounded-md p-3">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                <path d="M112 128C85.5 128 64 149.5 64 176C64 191.1 71.1 205.3 83.2 214.4L291.2 370.4C308.3 383.2 331.7 383.2 348.8 370.4L556.8 214.4C568.9 205.3 576 191.1 576 176C576 149.5 554.5 128 528 128L112 128zM64 260L64 448C64 483.3 92.7 512 128 512L512 512C547.3 512 576 483.3 576 448L576 260L377.6 408.8C343.5 434.4 296.5 434.4 262.4 408.8L64 260z" />
                                          </svg>
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
            </div>
      </div>

</div>