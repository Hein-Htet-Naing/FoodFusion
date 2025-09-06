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
      <title>Culinary Resources - FoodFusion</title>
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="font-sans antialiased text-shadow-lg text-gray-800 bg-gradient-to-b from-orange-50 to-white">

      <?php require('header.php') ?>

      <main class="container mx-auto px-4 py-12">

            <header class="text-center my-12 ">
                  <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Culinary Resources</h1>
                  <p class="text-lg text-gray-600 max-w-2xl mx-auto">Elevate your cooking skills with our collection of downloadable recipe cards, video tutorials, and essential kitchen hacks.</p>
            </header>

            <section id="recipe-cards" class="mb-16 group transform-3d perspective-1000">
                  <h2 class="text-3xl font-bold border-l-4 border-orange-500 pl-4 mb-8">Downloadable Recipe Cards</h2>
                  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-4 hover:scale-103 transition-transform duration-300 ease-in">
                              <img src="img/pizza.jpeg" alt="Classic Margherita Pizza" class="w-full h-48 object-cover">
                              <div class="p-6">
                                    <h3 class="text-xl font-semibold mb-2">Classic Margherita Pizza</h3>
                                    <p class="text-gray-600 mb-4">A timeless Italian classic. Perfect for a quick and delicious dinner.</p>
                                    <a href="img/PizzaRecipeCard.jpeg" download class="inline-flex items-center bg-green-500 text-white font-bold py-2 px-4 rounded-full hover:bg-green-600 transition-colors">
                                          <i class="fas fa-download mr-2"></i> Download PDF
                                    </a>
                              </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-4 hover:scale-103 transition-transform duration-300 ease-in">
                              <img src="img/Berry_salad.jpeg" alt="Summer Berry Salad" class="w-full h-48 object-cover">
                              <div class="p-6">
                                    <h3 class="text-xl font-semibold mb-2">Summer Berry Salad</h3>
                                    <p class="text-gray-600 mb-4">A refreshing salad packed with vitamins and vibrant flavors.</p>
                                    <a href="img/berry_salad_card.jpeg" download class="inline-flex items-center bg-green-500 text-white font-bold py-2 px-4 rounded-full hover:bg-green-600 transition-colors">
                                          <i class="fas fa-download mr-2"></i> Download PDF
                                    </a>
                              </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-4 hover:scale-103  transition-transform duration-300 ease-in">
                              <img src="img/pancake_small.jpeg" alt="Fluffy American Pancakes" class="w-full h-48 object-cover">
                              <div class="p-6">
                                    <h3 class="text-xl font-semibold mb-2">Fluffy American Pancakes</h3>
                                    <p class="text-gray-600 mb-4">Start your day right with the perfect stack of fluffy pancakes.</p>
                                    <a href="img/pdf/pancakeSmall.pdf" download class="inline-flex items-center bg-green-500 text-white font-bold py-2 px-4 rounded-full hover:bg-green-600 transition-colors">
                                          <i class="fas fa-download mr-2"></i> Download PDF
                                    </a>
                              </div>
                        </div>
                  </div>
            </section>

            <section id="tutorials">
                  <h2 class="text-3xl font-bold border-l-4 border-orange-500 pl-4 mb-8">Tutorials & Kitchen Hacks</h2>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                              <div class="relative pb-[56.25%] h-0">
                                    <!-- <video class="absolute top-0 left-0 w-full h-full" src="img/video/v1.mp4" controls muted autoplay></video> -->
                                    <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/YrHpeEwk_-U?si=pJWjXuJBpRG55h_w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                              </div>
                              <div class="p-6">
                                    <h3 class="text-xl font-semibold mb-2">Mastering Knife Skills</h3>
                                    <p class="text-gray-600">Learn the essential cutting techniques that will make you faster and safer in the kitchen. A must-watch for every home cook!</p>
                                    <a href="img/video/secret_tips_of_using_knife.mp4" download class="mt-2 inline-flex items-center bg-green-500 text-white font-bold py-2 px-4 rounded-full hover:bg-green-600 transition-colors">
                                          Download
                                    </a>
                              </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                              <div class="relative pb-[56.25%] h-0">
                                    <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/3eY394uqk9Q?si=jWvliYmNHMb0KBxd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    <!-- <iframe class="absolute top-0 left-0 w-full h-full" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                              </div>
                              <div class="p-6">
                                    <h3 class="text-xl font-semibold mb-2">5 Genius Kitchen Hacks</h3>
                                    <p class="text-gray-600">These simple tricks will save you time, reduce food waste, and make cooking more enjoyable. You'll wonder how you lived without them.</p>
                                    <a href="img/video/5_kitchen_hack.mp4" download class="mt-2 inline-flex items-center bg-green-500 text-white font-bold py-2 px-4 rounded-full hover:bg-green-600 transition-colors">
                                          Download
                                    </a>
                              </div>
                        </div>
                  </div>
            </section>

      </main>

      <?php require('footer.php') ?>
      <script src="js/navbar.js"></script>

</body>

</html>