<?php
require __DIR__ . '../../vendor/autoload.php';
session_start();

use Helper\Auth;

$check_user = Auth::checkUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      <script src="https://kit.fontawesome.com/0bf00ca408.js" crossorigin="anonymous"></script>
      <!-- <link rel="stylesheet" href="../src/output.css"> -->
      <title>Document</title>
</head>

<body class="bg-gradient-to-b from-orange-100 to-gray-50 font-sans antialiased">
      <?php require_once('header.php'); ?>
      <main class="min-h-screen relative py-8 mt-20">
            <div class="max-w-4xl mx-auto px-4">
                  <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <!-- Form Header -->
                        <div class="bg-orange-500 text-white px-6 py-4 text-shadow-lg">
                              <h1 class="text-2xl font-bold">Share Your Recipe with the Community</h1>
                              <p class="text-orange-100">Contribute to our growing collection of home-cooked recipes</p>
                        </div>

                        <!-- showing Success/Error Messages -->
                        <?php if (isset($_SESSION['uploadCookBook_error'])): ?>
                              <div class="bg-red-50 border-l-4 border-red-500 p-4 mx-6 mt-6">
                                    <div class="flex">
                                          <div class="flex-shrink-0">
                                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                                      <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 
                                                      1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.
                                                      414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                </svg>
                                          </div>
                                          <div class="ml-3">
                                                <h3 class="text-sm font-medium text-red-800">There were errors with your submission:</h3>
                                                <div class="mt-2 text-sm text-red-700">
                                                      <ul class="list-disc pl-5 space-y-1">
                                                            <?= $_SESSION['uploadCookBook_error'] ?>
                                                      </ul>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        <?php endif;
                        unset($_SESSION['uploadCookBook_error']); ?>

                        <?php if (isset($_SESSION['uploadCookBook_success'])): ?>
                              <div class="bg-green-50 border-l-4 border-green-500 p-4 mx-6 mt-6">
                                    <div class="flex">
                                          <div class="flex-shrink-0">
                                                <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 
                                                      1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 
                                                      1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                          </div>
                                          <div class="ml-3">
                                                <p class="text-sm font-medium text-green-800"><?= $_SESSION['uploadCookBook_success'] ?></p>
                                          </div>
                                    </div>
                              </div>
                        <?php endif;
                        unset($_SESSION['uploadCookBook_success']); ?>
                        <!-- Recipe Form -->
                        <form class="p-6 space-y-6 text-shadow-lg" action="../backend/Public/CookBook.php" method="POST" enctype="multipart/form-data">
                              <div class="space-y-4">
                                    <h2 class="text-xl font-semibold text-gray-800 border-b pb-2">Recipe Basics</h2>

                                    <div>
                                          <label for="recipeName" class="block text-sm font-medium text-gray-700 mb-1">Recipe Name*</label>
                                          <input type="text" id="recipeName" name="recipeName" required class="w-full px-4 py-2 border border-gray-300 
                                          rounded-md focus:outline-none focus:ring-2 focus:ring-[#1C1C1C]">
                                    </div>

                                    <div>
                                          <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description*</label>
                                          <textarea id="description" name="description" rows="3" required
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1C1C1C]"
                                                placeholder="Describe your recipe, its origin, or what makes it special...">                                          </textarea>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                          <div>
                                                <label for="prepTime" class="block text-sm font-medium text-gray-700 mb-1">Prep Time (min)*</label>
                                                <input type="text" id="prepTime" name="prepTime" required
                                                      class="w-full px-4 py-2 border border-gray-300 
                                                      rounded-md focus:outline-none focus:ring-2 focus:ring-[#1C1C1C]">
                                          </div>
                                          <div>
                                                <label for="cookTime" class="block text-sm font-medium text-gray-700 mb-1">Cook Time (min)*</label>
                                                <input type="text" id="cookTime" name="cookTime" required
                                                      class="w-full px-4 py-2 border border-gray-300 rounded-md 
                                                      focus:outline-none focus:ring-2 focus:ring-[#1C1C1C]">
                                          </div>
                                          <div>
                                                <label for="servings" class="block text-sm font-medium text-gray-700 mb-1">Servings*</label>
                                                <input type="text" id="servings" name="servings" required
                                                      class="w-full px-4 py-2 border border-gray-300 rounded-md 
                                                      focus:outline-none focus:ring-2 focus:ring-[#1C1C1C]">
                                          </div>
                                    </div>
                              </div>

                              <!-- Recipe Image -->
                              <div class="space-y-4">
                                    <h2 class="text-xl font-semibold text-gray-800 border-b pb-2">Recipe Image</h2>

                                    <div id="imageUpload" class="flex items-center justify-center w-full">
                                          <label for="recipeImage" class="flex flex-col items-center justify-center w-full h-64 border-2
                                           border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                      <svg class="w-10 h-10 mb-3 text-gray-600" fill="none" stroke="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                                                            <!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License -
                                                             https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="10"
                                                                  d="M160 96C124.7 96 96 124.7 96 160L96 480C96 515.3 124.7 544 160 544L480 544C515.3 
                                                            544 544 515.3 544 480L544 160C544 124.7 515.3 96 480 96L160 96zM224 176C250.5 176 272 
                                                            197.5 272 224C272 250.5 250.5 272 224 272C197.5 272 176 250.5 176 224C176 197.5 197.5 176 
                                                            224 176zM368 288C376.4 288 384.1 292.4 388.5 299.5L476.5 443.5C481 450.9 481.2 460.2 477 
                                                            467.8C472.8 475.4 464.7 480 456 480L184 480C175.1 480 166.8 475 162.7 467.1C158.6 459.2 159.2 
                                                            449.6 164.3 442.3L220.3 362.3C224.8 355.9 232.1 352.1 240 352.1C247.9 352.1 255.2 355.9 259.7 
                                                            362.3L286.1 400.1L347.5 299.6C351.9 292.5 359.6 288.1 368 288.1z" />
                                                      </svg>
                                                      <p class="mb-2 text-sm text-gray-500">Click to upload or drag and drop</p>
                                                      <p class="text-xs text-gray-500">JPG, PNG, GIF, WEBP (Max 5MB)</p>
                                                </div>
                                          </label>
                                    </div>
                                    <div id="imagePreview" class="hidden mt-4">
                                          <img id="previewImg" class="max-h-64 max-w-64 mx-auto rounded-lg shadow-md" src="" alt="Image preview">
                                    </div>
                                    <input id="recipeImage" name="recipeImage" type="file" class="" />
                              </div>

                              <!-- Ingredients -->
                              <div class="space-y-4">
                                    <h2 class="text-xl font-semibold text-gray-800 border-b pb-2">Ingredients*</h2>
                                    <div>
                                          <label class="block text-sm font-medium text-gray-700 mb-1">Enter each ingredient on a new line, or with commas between items</label>
                                          <textarea id="ingredients" name="ingredients" rows="6" required
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1C1C1C]"
                                                placeholder="Example: 
                                                - 2 cups flour
                                                - 1 tsp salt
                                                - 3 large eggs
                                                - 1 cup milk">
                                          </textarea>
                                    </div>
                              </div>

                              <!-- Instructions -->
                              <div class="space-y-4">
                                    <h2 class="text-xl font-semibold text-gray-800 border-b pb-2">Instructions*</h2>
                                    <div>
                                          <label class="block text-sm font-medium text-gray-700 mb-1">Enter each step on a new line, or number your steps</label>
                                          <textarea id="instructions" name="instructions" rows="8" required
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1C1C1C]"
                                                placeholder="Example: 
                                          1. Preheat oven to 350°F (175°C)
                                          2. Mix dry ingredients in a large bowl
                                          3. In a separate bowl, beat eggs and add milk
                                          4. Combine wet and dry ingredients...">
                                          </textarea>
                                    </div>
                              </div>

                              <!-- Additional Information -->
                              <div class="space-y-4">
                                    <h2 class="text-xl font-semibold text-gray-800 border-b pb-2">Additional Information</h2>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                          <div>
                                                <label for="recipeType" class="block text-sm font-medium text-gray-700 mb-1">Category*</label>
                                                <input type="text" id="recipeType" name="recipeType" required
                                                      class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1C1C1C]">
                                          </div>

                                          <div>
                                                <label for="difficulty" class="block text-sm font-medium text-gray-700 mb-1">Difficulty Level*</label>
                                                <select id="difficulty" name="difficulty" required
                                                      class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1C1C1C]">
                                                      <option value="">Select difficulty</option>
                                                      <option value="easy">Easy</option>
                                                      <option value="medium">Medium</option>
                                                      <option value="hard">Hard</option>
                                                      <option value="difficult">Difficult</option>
                                                </select>
                                          </div>
                                    </div>
                              </div>

                              <!-- Submit Button -->
                              <div class="pt-4">
                                    <button type="submit" class="w-full bg-orange-500 text-white py-3 px-4 rounded-md 
                                    hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-[#1C1C1C] 
                                    focus:ring-offset-2 font-medium">
                                          Share Recipe with Community
                                    </button>
                              </div>
                        </form>
                  </div>

                  <!-- Community Guidelines -->
                  <div class="mt-8 bg-white rounded-xl shadow-md p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Community Guidelines</h2>
                        <ul class="space-y-2 text-gray-600">
                              <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Share only original recipes or recipes you have permission to share</span>
                              </li>
                              <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Provide clear, accurate measurements and instructions</span>
                              </li>
                              <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Include any special tips or variations you've discovered</span>
                              </li>
                              <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Be respectful of others' recipes and cooking styles</span>
                              </li>
                        </ul>
                  </div>
            </div>
      </main>
      <script>
            // Image preview functionality
            document.getElementById('recipeImage').addEventListener('change', function(e) {
                  const file = e.target.files[0];
                  if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                              const recipeImage = document.getElementById('imageUpload');
                              const preview = document.getElementById('imagePreview');
                              const previewImg = document.getElementById('previewImg');
                              previewImg.src = e.target.result;
                              recipeImage.classList.add('hidden');
                              preview.classList.remove('hidden');
                        }
                        reader.readAsDataURL(file);
                  }
            });
      </script>
      <script src="js/navbar.js"></script>
      <?php require_once('footer.php'); ?>
</body>

</html>