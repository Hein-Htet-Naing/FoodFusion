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
                  <div class="bg-transparnet rounded-xl shadow-lg overflow-hidden bg-no-repeat bg-fixed bg-center bg-cover bg-[url(img/recipe_banner.png)]">
                        <div class="md:flex">
                              <div class="md:1/2 px-8 py-4">
                                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Upload Your Receipe Here!</h2>

                                    <?php
                                    if (isset($_SESSION['recipe_success'])) {
                                          echo '<div id="status_message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">'
                                                . $_SESSION['recipe_success'] .
                                                '</div>';
                                          unset($_SESSION['recipe_success']);
                                    } elseif (isset($_SESSION['recipe_error'])) {
                                          echo '<div id="status_message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">'
                                                . $_SESSION['recipe_error'] .
                                                '</div>';
                                          unset($_SESSION['recipe_error']);
                                    }
                                    ?>
                                    <form action="Public/Recipe.php" enctype="multipart/form-data" method="POST">
                                          <div class="mb-4">
                                                <label class="flex w-full gap-2 items-center">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#E57C2F" viewBox="0 0 640 640">
                                                            <path d="M64 240C64 204.7 92.7 176 128 176C128.5 176 129.1 176 129.6 176C137 139.5 169.3 112 208 112C223 112 237 116.1 248.9 123.2C262.2 97.5 289 80 320 80C351 80 377.8 97.6 391.1 123.2C403.1 116.1 417.1 112 432 112C470.7 112 503 139.5 510.4 176C510.9 176 511.5 176 512 176C547.3 176 576 204.7 576 240C576 251.7 572.9 262.6 567.4 272L72.6 272C67.1 262.6 64 251.7 64 240zM64 347.4C64 332.3 76.3 320 91.4 320L548.5 320C563.6 320 575.9 332.3 575.9 347.4C575.9 417.9 531.5 478.1 469.2 501.5L467.5 516C465.5 532 451.9 544 435.7 544L204.2 544C188.1 544 174.4 532 172.4 516L170.6 501.6C108.4 478.1 64 417.9 64 347.4z" />
                                                      </svg>
                                                      <input type="text" name="recipeName" placeholder="Recipe Name" class="w-full border border-[#ccc] text-base px-4 py-1">
                                                </label>
                                          </div>
                                          <div class="mb-4">
                                                <label class="flex w-full gap-2 items-center">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#E57C2F" viewBox="0 0 576 512">
                                                            <path d="M557 96.7c14.4 14.4 12.4 38.4-4.3 50.2l-64.6 45.7c-43.7 30.9-79.2 71.9-103.4 119.6l-25.3 49.8c-25.1 49.3-62.1 91.5-107.8 122.6l-74.1 50.6c-13.1 8.9-30.7 7.3-41.8-3.9l-44.9-44.9 86.5-66.5c42.3-32.5 76.7-74.3 100.6-122l24.5-49.1c24.5-49 61.8-90.6 107.9-120.2l108.7-69.9 38 38zM484.2 23.9L384.3 88.2c-53.4 34.3-96.5 82.4-124.9 139.1l-24.5 49.1c-20.6 41.3-50.3 77.3-86.9 105.4l-91.4 70.3-36.9-36.9c-14.4-14.4-12.4-38.4 4.3-50.2l64.6-45.7c43.7-30.9 79.2-71.9 103.4-119.6l25.3-49.8C242.3 100.8 279.3 58.6 325 27.4l74.1-50.6c13.1-8.9 30.6-7.3 41.8 3.9l43.3 43.3z" />
                                                      </svg>
                                                      <input type="text" name="recipe" placeholder="Recipe" class="w-full border border-[#ccc] text-base px-4 py-1">
                                                </label>
                                          </div>
                                          <div class="mb-4">
                                                <label class="flex w-full gap-2 items-center">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#E57C2F" viewBox="0 0 512 512">
                                                            <path d="M63.9 14.4C63.1 6.2 56.2 0 48 0s-15.1 6.2-16 14.3L17.9 149.7c-1.3 6-1.9 12.1-1.9 18.2 0 45.9 35.1 83.6 80 87.7L96 480c0 17.7 14.3 32 32 32s32-14.3 32-32l0-224.4c44.9-4.1 80-41.8 80-87.7 0-6.1-.6-12.2-1.9-18.2L223.9 14.3C223.1 6.2 216.2 0 208 0s-15.1 6.2-15.9 14.4L178.5 149.9c-.6 5.7-5.4 10.1-11.1 10.1-5.8 0-10.6-4.4-11.2-10.2L143.9 14.6C143.2 6.3 136.3 0 128 0s-15.2 6.3-15.9 14.6L99.8 149.8c-.5 5.8-5.4 10.2-11.2 10.2-5.8 0-10.6-4.4-11.1-10.1L63.9 14.4zM448 0C432 0 320 32 320 176l0 112c0 35.3 28.7 64 64 64l32 0 0 128c0 17.7 14.3 32 32 32s32-14.3 32-32l0-448c0-17.7-14.3-32-32-32z" />
                                                      </svg>
                                                      <input type="text" name="recipeType" placeholder="Recipe Type: dessert" class="w-full border border-[#ccc] text-base px-4 py-1">
                                                </label>
                                          </div>
                                          <div class="mb-4">
                                                <label class="flex w-full items-center gap-2">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#E57C2F" viewBox="0 0 640 640">
                                                            <path d="M309.8 284.9C295.3 267.3 288 245.7 288 224.1C288 143.9 384 63.9 480 63.9C533 63.9 576 106.9 576 159.9C576 255.9 496 351.9 415.8 351.9C394.2 351.9 372.6 344.6 355 330.1L118.6 566.6C106.1 579.1 85.8 579.1 73.3 566.6C60.8 554.1 60.8 533.8 73.3 521.3L309.8 284.9z" />
                                                      </svg>
                                                      <select id="subject" name="difficulty" class="w-full px-4 py-1 border border-[#ccc]">
                                                            <option value="Easy">Easy</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="Hard">Hard</option>
                                                            <option value="Difficult">Difficult</option>
                                                      </select>
                                                </label>
                                          </div>
                                          <div class="mb-4">
                                                <label class="flex w-full gap-2 resize-none">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#E57C2F" viewBox="0 0 384 512">
                                                            <path d="M64 48l112 0 0 88c0 39.8 32.2 72 72 72l88 0 0 240c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16L48 64c0-8.8 7.2-16 16-16zM224 67.9l92.1 92.1-68.1 0c-13.3 0-24-10.7-24-24l0-68.1zM64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-261.5c0-17-6.7-33.3-18.7-45.3L242.7 18.7C230.7 6.7 214.5 0 197.5 0L64 0zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24l144 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-144 0zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24l144 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-144 0z" />
                                                      </svg>
                                                      <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border border-[#ccc] rounded-sm focus:outline-none focus:ring-2"></textarea>
                                                </label>
                                          </div>
                                          <div class="mb-4">
                                                <label class="flex w-full gap-2 items-center">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#E57C2F" viewBox="0 0 384 512">
                                                            <path d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-277.5c0-17-6.7-33.3-18.7-45.3L258.7 18.7C246.7 6.7 230.5 0 213.5 0L64 0zM325.5 176L232 176c-13.3 0-24-10.7-24-24L208 58.5 325.5 176z" />
                                                      </svg>
                                                      <input
                                                            type="file"
                                                            name="photo"
                                                            class="block w-full text-sm text-gray-500
                                                      file:mr-4 file:py-2 file:px-4
                                                      file:rounded-md file:border-0
                                                      file:text-sm file:font-semibold
                                                      file:bg-orange-400 file:text-white
                                                      transition duration-200 ease-in-out" />
                                                </label>
                                          </div>
                                          <div>
                                                <button type="submit" class="bg-orange-500 ml-22 text-white font-semibold py-2 px-4 rounded-lg hover:bg-orange-600 transition-colors duration-300">
                                                      Upload Now
                                                </button>
                                          </div>
                                    </form>
                              </div>
                              <div class="hidden md:block md:w-1/2 perspective-normal ">
                                    <img src=" img/recipe_plate.png" class="drop-shadow-lg translate-z-4 -rotate-y-8" alt="" />
                              </div>
                        </div>
                  </div>

            </section>

      </main>
</body>

</html>