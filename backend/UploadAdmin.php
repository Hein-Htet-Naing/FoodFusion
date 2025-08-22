<?php
session_start();
require __DIR__ . "/../vendor/autoload.php";

use Helper\Auth;

$check_admin = Auth::checkAdmin();
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

<body>

      <main class="flex min-h-screen">
            <?php require_once('Sidebar.php') ?>
            <section class="max-w-4xl mx-auto pt-25 mb-8 text-shadow-lg">
                  <div class="bg-transparnet rounded-xl shadow-xl overflow-hidden bg-no-repeat bg-fixed bg-center bg-cover bg-[url(img/recipe_banner.png)]">
                        <div class="md:flex">
                              <div class="md:1/2 px-8 py-4">
                                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Add New Admin </h2>

                                    <?php
                                    if (isset($_SESSION['admin_success'])) {
                                          echo '<div id="status_message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">'
                                                . $_SESSION['admin_success'] .
                                                '</div>';
                                          unset($_SESSION['admin_success']);
                                    } elseif (isset($_SESSION['admin_error'])) {
                                          echo '<div id="status_message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">'
                                                . $_SESSION['admin_error'] .
                                                '</div>';
                                          unset($_SESSION['admin_error']);
                                    }
                                    ?>
                                    <form action="Public/Admin.php" enctype="multipart/form-data" method="POST">
                                          <div class="flex flex-col md:flex-row gap-2 w-full mb-4">
                                                <label class="flex w-full gap-2 items-center">
                                                      <i class="fa-solid fa-id-card"></i>
                                                      <input type="text" name="admin_f_name" placeholder="First Name" class="w-full border border-[#ccc] text-base px-4 py-1">
                                                </label>

                                                <label class="flex w-full gap-2 items-center">
                                                      <i class="fa-solid fa-id-card"></i>
                                                      <input type="text" name="admin_l_name" placeholder="Last Name" class="w-full border border-[#ccc] text-base px-4 py-1">
                                                </label>
                                          </div>
                                          <div class="mb-4">
                                                <label class="flex items-center gap-2 w-full">
                                                      <i class="fa-solid fa-envelope"></i>
                                                      <input type="email" name="AdminEmail" placeholder="Email" class="w-full border border-[#ccc] text-base px-4 py-1">
                                                </label>
                                          </div>
                                          <!-- password -->
                                          <div class="mb-4">
                                                <label id="label" class="relative flex w-full items-center gap-2">
                                                      <i class="fa-solid fa-key"></i>
                                                      <input type="password" name="Adminpwd" placeholder="Password" class="w-full border border-[#ccc] text-base px-4 py-1">
                                                      <i class="fa-solid fa-eye absolute z-10
                                                       -bottom-[2px] right-2 transform -translate-y-1/2">
                                                      </i>
                                                </label>
                                          </div>
                                          <div class="mb-4">
                                                <label class="flex items-center gap-2 w-full">
                                                      <i class="fa-solid fa-mobile-screen"></i>
                                                      <input type="tel" name="AdminPhone" placeholder="PhoneNumber"
                                                            class="w-full border border-[#ccc] text-base px-4 py-1">
                                                </label>
                                          </div>
                                          <div class="mb-4">
                                                <label class="flex w-full items-center gap-2">
                                                      <i class="fa-solid fa-users-rectangle"></i>
                                                      <select id="subject" name="AdminRole" class="w-full px-4 py-1 border border-[#ccc]">
                                                            <option value="1">Admin</option>
                                                            <option value="3">Chef</option>
                                                      </select>
                                                </label>
                                          </div>
                                          <!-- Admin Profile -->
                                          <div class="mb-4">
                                                <label class="flex w-full gap-2 items-center">
                                                      <i class="fa-solid fa-file"></i>
                                                      <input
                                                            type="file"
                                                            name="AdminPhoto"
                                                            class="block w-full text-sm text-gray-500
                                                      file:mr-4 file:py-2 file:px-4
                                                      file:rounded-md file:border-0
                                                      file:text-sm file:font-semibold
                                                      file:bg-[#1C1C1C] file:text-white
                                                      transition duration-200 ease-in-out" />
                                                </label>
                                          </div>
                                          <div class="w-full text-center">
                                                <button type="submit" class="bg-[#1c1c1c] text-white font-semibold py-2 px-4 rounded-lg hover:bg-orange-600 transition-colors duration-300">
                                                      Add Now
                                                </button>
                                          </div>
                                    </form>
                              </div>
                        </div>
                  </div>

            </section>

      </main>
</body>

</html>