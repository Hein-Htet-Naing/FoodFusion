<?php
session_start();
require __DIR__ . "/../vendor/autoload.php";

use Lupid\FoodFusion\Model\UserListProcess;
use Helper\Auth;

$check_admin = Auth::checkAdmin();
if ($check_admin) {
      $userlist = new UserListProcess();
      $list = $userlist->fetch_all_user_from_users_table();
}

if (isset($_SESSION['deleted_success'])) {
      echo '<script>alert(' . $_SESSION['deleted_success'] . ') </script>';
}
if (isset($_SESSION['deleted_error'])) {
      echo '<script>alert(' . $_SESSION['deleted_error'] . ') </script>';
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

</body>

</html>

<div class="flex h-screen bg-gray-100">

      <?php require_once('Sidebar.php'); ?>
      <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Main content -->
            <main class="w-full flex-1 p-6 scroll_hidden">
                  <div class="min-h-screen mt-10 md:mt-0">
                        <!-- showing list of users -->
                        <div class="bg-white shadow rounded-lg">
                              <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">User Lists</h3>
                              </div>
                              <div class="bg-white overflow-auto h-[80vh]">
                                    <table class="min-w-full divide-y divide-gray-200">
                                          <thead class="sticky top-0 w-full bg-gray-50">
                                                <tr>
                                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">UserName</th>
                                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Password</th>
                                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>
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
                                                                        <div class="flex-shrink-0 h-10 w-10">
                                                                              <img class="h-10 w-10 rounded-full" src="../uploads/' . htmlspecialchars($ls['image']) . '" alt="">
                                                                        </div>
                                                                  </div>
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                  <div class="text-sm text-gray-900">' . htmlspecialchars($ls['firstName']) . " " . htmlspecialchars($ls['lastName']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($ls['email']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($ls['pwd']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4  text-sm text-gray-500">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($ls['phone']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                                                        <a href="Public/UserList.php?userid=' . urlencode($ls['userid']) . '" 
                                                                        class="px-4 py-1 bg-orange-400 border border-orange-400 text-white hover:text-orange-900"
                                                                        onclick="return confirm("Are you sure you want to delete this user?");">Delete</a>
                                                            </td>
                                                </tbody>
                                                ';
                                          };
                                          ?>
                                    </table>
                              </div>
                        </div>

                        <!-- Quick Stats -->
                        <!-- <div class="bg-white shadow rounded-lg overflow-hidden">
                              <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Quick Stats</h3>
                              </div>
                              <div class="p-6">
                                    <div class="mb-6">
                                          <h4 class="text-sm font-medium text-gray-500 mb-2">Recipe Categories</h4>
                                          <div class="space-y-3">
                                                <div>
                                                      <div class="flex justify-between text-sm mb-1">
                                                            <span>Main Course</span>
                                                            <span>42%</span>
                                                      </div>
                                                      <div class="w-full bg-gray-200 rounded-full h-2">
                                                            <div class="bg-orange-500 h-2 rounded-full" style="width: 42%"></div>
                                                      </div>
                                                </div>
                                                <div>
                                                      <div class="flex justify-between text-sm mb-1">
                                                            <span>Desserts</span>
                                                            <span>28%</span>
                                                      </div>
                                                      <div class="w-full bg-gray-200 rounded-full h-2">
                                                            <div class="bg-blue-500 h-2 rounded-full" style="width: 28%"></div>
                                                      </div>
                                                </div>
                                                <div>
                                                      <div class="flex justify-between text-sm mb-1">
                                                            <span>Appetizers</span>
                                                            <span>15%</span>
                                                      </div>
                                                      <div class="w-full bg-gray-200 rounded-full h-2">
                                                            <div class="bg-green-500 h-2 rounded-full" style="width: 15%"></div>
                                                      </div>
                                                </div>
                                                <div>
                                                      <div class="flex justify-between text-sm mb-1">
                                                            <span>Beverages</span>
                                                            <span>10%</span>
                                                      </div>
                                                      <div class="w-full bg-gray-200 rounded-full h-2">
                                                            <div class="bg-yellow-500 h-2 rounded-full" style="width: 10%"></div>
                                                      </div>
                                                </div>
                                                <div>
                                                      <div class="flex justify-between text-sm mb-1">
                                                            <span>Other</span>
                                                            <span>5%</span>
                                                      </div>
                                                      <div class="w-full bg-gray-200 rounded-full h-2">
                                                            <div class="bg-purple-500 h-2 rounded-full" style="width: 5%"></div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>

                                    <div>
                                          <h4 class="text-sm font-medium text-gray-500 mb-2">User Activity</h4>
                                          <div class="space-y-3">
                                                <div>
                                                      <div class="flex justify-between text-sm mb-1">
                                                            <span>Active Users</span>
                                                            <span>8,542</span>
                                                      </div>
                                                </div>
                                                <div>
                                                      <div class="flex justify-between text-sm mb-1">
                                                            <span>New Signups (7d)</span>
                                                            <span>324</span>
                                                      </div>
                                                </div>
                                                <div>
                                                      <div class="flex justify-between text-sm mb-1">
                                                            <span>Recipes Added (7d)</span>
                                                            <span>187</span>
                                                      </div>
                                                </div>
                                                <div>
                                                      <div class="flex justify-between text-sm mb-1">
                                                            <span>Comments (7d)</span>
                                                            <span>1,248</span>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div> -->
                  </div>
            </main>
      </div>
</div>

<!-- <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Published</span> -->