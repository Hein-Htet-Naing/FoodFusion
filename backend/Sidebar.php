<?php
require __DIR__ . "/../vendor/autoload.php";

use Lupid\FoodFusion\Model\UserListProcess;
use Helper\Auth;

$check_admin = Auth::checkAdmin();
if ($check_admin) {
      $userlist = new UserListProcess();
      $admin = $userlist->fetch_admin($check_admin);
}
?>



<!-- Sidebar -->
<div class="sidebar hidden md:relative md:flex md:flex-shrink-0 z-50
 transition-all duration-300 transform -translate-x-full md:translate-x-0">
      <div class="flex fixed inset-y-0 left-0 top-10 md:top-0 md:relative flex-col w-64 bg-gray-800">
            <div class="flex items-center justify-center h-16 bg-gray-900">
                  <span class="text-white font-semibold text-xl">FoodFusion Admin</span>
            </div>
            <div class="flex flex-col flex-grow pt-5 pb-4 overflow-y-auto">
                  <nav class="flex-1 px-2 space-y-1 bg-gray-800">
                        <!-- Dashboard -->
                        <a href="AdminDashboard.php" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                              <svg class="mr-3 h-6 w-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                              </svg>
                              Dashboard
                        </a>

                        <!-- Add Recipes -->
                        <a href="uploadRecipe.php" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                              <svg class="mr-3 h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                              </svg>
                              Recipes
                        </a>

                        <!-- Add Admins -->
                        <a href="UploadAdmin.php" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                              <svg class="mr-3 h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                              </svg>
                              Admin
                        </a>

                        <!-- Users -->
                        <a href="UserListsPage.php" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                              <svg class="mr-3 h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                              </svg>
                              Users
                        </a>

                        <!-- Collection -->
                        <a href="RecipeCollection.php" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                              <svg class="mr-3 h-6 w-6 text-gray-400" fill="gray" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                    <path d="M127.9 78.4C127.1 70.2 120.2 64 112 64C103.8 64 96.9 70.2 96 78.3L81.9 213.7C80.6 219.7 80 225.8 80 231.9C80 277.8 115.1 315.5 160 319.6L160 544C160 561.7 174.3 576 192 576C209.7 576 224 561.7 224 544L224 319.6C268.9 315.5 304 277.8 304 231.9C304 225.8 303.4 219.7 302.1 213.7L287.9 78.3C287.1 70.2 280.2 64 272 64C263.8 64 256.9 70.2 256.1 78.4L242.5 213.9C241.9 219.6 237.1 224 231.4 224C225.6 224 220.8 219.6 220.2 213.8L207.9 78.6C207.2 70.3 200.3 64 192 64C183.7 64 176.8 70.3 176.1 78.6L163.8 213.8C163.3 219.6 158.4 224 152.6 224C146.8 224 142 219.6 141.5 213.9L127.9 78.4zM512 64C496 64 384 96 384 240L384 352C384 387.3 412.7 416 448 416L480 416L480 544C480 561.7 494.3 576 512 576C529.7 576 544 561.7 544 544L544 96C544 78.3 529.7 64 512 64z" />
                              </svg>
                              Recipe Collection
                        </a>

                        <!-- Comments -->
                        <a href="Comments.php" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                              <svg class="mr-3 h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                              </svg>
                              Comments
                        </a>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
                  </nav>
            </div>

            <div class="flex-shrink-0 flex bg-gray-700 p-4">
                  <div class="flex items-center">
                        <div>
                              <img class="inline-block h-9 w-9 rounded-full" src="../uploads/admin/<?= htmlspecialchars($admin['image']); ?>" alt="Admin Photo">
                        </div>
                        <div class="ml-3">
                              <p class="text-sm font-medium text-white"><?= htmlspecialchars($admin['firstName']) . " " . htmlspecialchars($admin['lastName']); ?></p>
                              <a href="../frontend/logout.php" class="text-xs font-medium text-gray-300 hover:text-white">Sign out</a>
                        </div>
                  </div>
            </div>
      </div>
</div>
<header class="md:hidden bg-white shadow fixed w-full">
      <div class="flex items-center justify-between px-4 py-3">
            <div>
                  <button class="m_sidebar text-gray-500 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                  </button>
            </div>
            <div class="text-lg font-semibold">Dashboard</div>
            <div>
                  <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </div>
      </div>
</header>

<script>
      const sidebar = document.querySelector(".sidebar");
      const burger = document.querySelector(".m_sidebar");

      burger.onclick = () => {
            sidebar.classList.toggle("hidden");
            sidebar.classList.toggle("-translate-x-full");
      }
</script>