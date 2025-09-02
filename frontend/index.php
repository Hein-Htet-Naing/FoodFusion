<?php
require __DIR__ . '../../vendor/autoload.php';
session_start();

use Helper\Auth;
use Lupid\FoodFusion\Model\RecipeProcess;

$check_user = Auth::checkUser();

$recipe_colllection = new RecipeProcess();

$recipe = $recipe_colllection->fetch_Limited_recipe();
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://kit.fontawesome.com/0bf00ca408.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      <!-- <link rel="stylesheet" href="../src/output.css"> -->
      <style>
            #joinUsForm {
                  animation: .3s appear ease-in;
            }

            #card-container:has(:hover) .card:not(:hover) {
                  transition: all 0.3s ease-in;
                  scale: 0.98;
                  filter: blur(2px);
            }

            .card:hover {
                  transition: transform 0.3s ease-in, filter 0.3s ease-in;
                  transform: scale(1.02);
                  filter: blur(0);
                  z-index: 40;
                  box-shadow: -8px 8px 47px -6px rgba(0, 0, 0, 0.37);
                  -webkit-box-shadow: -8px 8px 47px -6px rgba(0, 0, 0, 0.37);
                  -moz-box-shadow: -8px 8px 47px -6px rgba(0, 0, 0, 0.37);
            }

            @keyframes appear {
                  0% {
                        opacity: 0;
                        scale: 0;
                        transform: translateX(-100%);
                  }

                  25% {
                        opacity: 0.25;
                        scale: 0.25;
                        transform: translateX(-75%);
                  }

                  50% {
                        opacity: 0.5;
                        scale: 0.5;
                        transform: translateX(-50%);
                  }

                  75% {
                        opacity: 0.75;
                        scale: 0.75;
                        transform: translateX(-25%);
                  }

                  100% {
                        opacity: 1;
                        scale: 1;
                        transform: translateX(0);
                  }
            }
      </style>
      <title>Document</title>
</head>

<body class="font-sans antialiased text-shadow-lg">
      <?php require('header.php') ?>
      <!-- Hero Section-->
      <section class="pt-32b bg-orange-100 relative min-h-screen text-base lg:text-lg flex items-center md:flex-row text-center md:text-left px-6 -mt-5 justify-center ">
            <div class="relative md:w-1/2 max-w-3xl px-6 z-20">

                  <h1 class="text-6xl font-bold text-[#1C1C1C] mb-4 text-shadow-lg md:text-left">Welcome to FoodFusion 🍽️</h1>
                  <p class="text-xl text-[#333333] mb-6 text-shadow-lg md:text-left">
                        Your one-stop culinary platform for discovering global recipes, sharing your cooking passion, and connecting with fellow food lovers.
                  </p>

                  <button id="openBtn" class="inline-block px-6 py-3 bg-[#E57C2F] text-white rounded-lg shadow hover:bg-[#d86f2a] transition">
                        Join the Community
                  </button>
            </div>
            <div class="hidden md:block">
                  <img src="img/hero_img.png" alt="Frying pan with vegetables"
                        class="w-full max-w-[25rem] h-auto object-contain">
            </div>
      </section>

      <!-- Join Us (Pop UP) Form -->
      <section id="joinUsForm" class="fixed hidden top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 h-[400px] z-50">
            <form enctype="multipart/form-data" method="POST"
                  action="../backend/Public/Register.php"
                  class="w-full p-8 flex flex-col gap-2 bg-white rounded-lg shadow-lg relative">
                  <?php
                  // show error messages
                  if (isset($_SESSION['join_us_error'])) {
                        echo '<div class="status_message bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">'
                              . $_SESSION['join_us_error'] .
                              '</div>';
                        unset($_SESSION['join_us_error']);
                  }
                  ?>

                  <i id="cross" class="fa-solid fa-circle-xmark absolute top-3 right-2"></i>

                  <h2 class="pb-2 text-2xl font-bold text-center text-shadow-lg border-b border-b-[#ccc]">Join Us Now</h2>
                  <label class="mb-2 flex justify-center items-center gap-2 w-full text-lg">
                        <i class="fa-solid fa-id-card"></i>
                        <input class="w-full p-2 border rounded-sm border-[#ccc]" type="text"
                              placeholder="FirstName" name="firstName">
                  </label>
                  <label class="mb-2 flex justify-center items-center gap-2 w-full  text-lg">
                        <i class="fa-solid fa-id-card"></i>
                        <input class="w-full p-2 border rounded-sm border-[#ccc]" type="text"
                              placeholder="LastName" name="lastName">
                  </label>

                  <!-- email -->
                  <label class="mb-2 flex justify-center items-center gap-2 w-full text-lg">
                        <i class="fa-solid fa-envelope"></i>
                        <input class="w-full p-2 border border-[#ccc]" type="email" placeholder="Email"
                              name="email">
                  </label>

                  <!-- password -->
                  <div class="mb-2 w-full text-lg">
                        <label id="label" class="relative flex justify-center items-center gap-2">
                              <i class="fa-solid fa-key"></i>
                              <input class="w-full border rounded-sm border-[#ccc] p-1 text-lg"
                                    type="password" name="pwd" placeholder="Password">
                              <i class="fa-solid fa-eye absolute
                                              -bottom-[2px] right-2 transform -translate-y-1/2">
                              </i>
                        </label>
                  </div>

                  <div class="w-full">
                        <input id="joinUsBtn" type="submit"
                              class="text-[#fff] bg-[#1C1C1C] w-full text-lg py-1 rounded-sm "
                              value="Register">
                  </div>
            </form>
      </section>

      <!-- Recipe  -->
      <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">Featured Recipes</h2>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Handpicked recipes from our community chefs</p>
                  </div>


                  <div id="card-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 px-8">
                        <?php foreach ($recipe as $rp) {
                              echo
                              '
                                          <div class="card bg-transparent backdrop-blur-xl relative my-8 rounded-xl shadow-md p-4 text-center 
                                          perspective-midrange transform-3d max-w-[300px]">
                                                <img src="../uploads/recipe/' . htmlspecialchars($rp['recipePhoto']) . ' " alt="' . htmlspecialchars($rp['recipeName']) . '"
                                                class="w-30 h-30 mx-auto absolute rounded-full object-cover z-40
                                                      translate-z-30 -translate-y-10 translate-x-18">
                                                <div class="text-shadow-lg px-4 mb-2 pt-20">
                                                <h3 class="text-xl font-bold mb-1 text-start">' . htmlspecialchars($rp['recipeName']) . '</h3>
                                                <p class="text-lg font-semibold text-gray-500 mb-1 text-start">
                                                            <span class="text-lg font-semibold text-gray-800">Type: </span>
                                                      ' . htmlspecialchars($rp['recipeType']) . '
                                                      </p>
                                                      <p class="text-base text-gray-800 text-justify">' . htmlspecialchars($rp['description']) . '</p>
                                                </div>
                                                <div class="flex justify-between px-4 border-t-4 border-[#ccc]">
                                                      <small>' . htmlspecialchars($rp['firstName']) . ' ' . htmlentities($rp['lastName']) . '</small>
                                                      <small>' . date('y-m-d', strtotime(htmlspecialchars($rp['created_at']))) . '</small>
                                                </div>
                                          </div>   
                              ';
                        } ?>
                  </div>
                  <div class="text-center mt-12">
                        <a href="recipeCollection.php" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-orange-500 hover:bg-orange-600">
                              View All Recipes <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                  </div>
            </div>
      </section>
      <section class="py-16 bg-orange-100">
            <div class="container mx-auto px-6">
                  <h2 class="text-3xl font-bold text-center text-orange-600 mb-12">Our Team</h2>
                  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <!-- Team Member  -->
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                              <img src="img/Gordon Ramsey.jpeg" alt="Gordon Ramsey" class="w-full h-64 object-cover">
                              <div class="p-6">
                                    <h3 class="text-xl font-semibold text-gray-800">Gordon Ramsey</h3>
                                    <p class="text-orange-600 mb-2">Founder & Executive Chef</p>
                                    <p class="text-gray-600">Former Michelin-star chef turned culinary educator with a passion for Latin American cuisine.</p>
                              </div>
                        </div>


                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                              <img src="img/cuoco.jpeg" alt="James Chen" class="w-full h-64 object-cover">
                              <div class="p-6">
                                    <h3 class="text-xl font-semibold text-gray-800">James Chen</h3>
                                    <p class="text-orange-600 mb-2">Head of Content</p>
                                    <p class="text-gray-600">Food journalist and cookbook author specializing in Asian fusion techniques.</p>
                              </div>
                        </div>


                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                              <img src="img/c_manager.jpeg" alt="Sophie Laurent" class="w-full h-64 object-cover">
                              <div class="p-6">
                                    <h3 class="text-xl font-semibold text-gray-800">Sophie Laurent</h3>
                                    <p class="text-orange-600 mb-2">Community Manager</p>
                                    <p class="text-gray-600">Pastry chef turned digital community builder, creating spaces for food lovers to connect.</p>
                              </div>
                        </div>


                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                              <img src="img/video_pdr.jpeg" alt="Ahmed Khan" class="w-full h-64 object-cover">
                              <div class="p-6">
                                    <h3 class="text-xl font-semibold text-gray-800">Ahmed Khan</h3>
                                    <p class="text-orange-600 mb-2">Video Producer</p>
                                    <p class="text-gray-600">Culinary videographer bringing recipes to life through stunning visual storytelling.</p>
                              </div>
                        </div>
                  </div>
            </div>
      </section>
      <!-- how it works -->
      <section class="py-16 bg-white skew-section relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 skew-content">
                  <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">How FoodFusion Works</h2>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Join our community in just a few simple steps</p>
                  </div>

                  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="text-center px-6">
                              <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-orange-100 text-orange-500 mb-4">
                                    <i class="fas fa-user-plus text-2xl"></i>
                              </div>
                              <h3 class="text-xl font-semibold text-gray-800 mb-2">Create an Account</h3>
                              <p class="text-gray-600">Sign up for free and become part of our culinary community</p>
                        </div>

                        <div class="text-center px-6">
                              <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-orange-100 text-orange-500 mb-4">
                                    <i class="fas fa-utensils text-2xl"></i>
                              </div>
                              <h3 class="text-xl font-semibold text-gray-800 mb-2">Explore or Share Recipes</h3>
                              <p class="text-gray-600">Discover amazing recipes or share your own creations</p>
                        </div>

                        <div class="text-center px-6">
                              <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-orange-100 text-orange-500 mb-4">
                                    <i class="fas fa-comments text-2xl"></i>
                              </div>
                              <h3 class="text-xl font-semibold text-gray-800 mb-2">Connect with Others</h3>
                              <p class="text-gray-600">Interact with fellow food enthusiasts and exchange tips</p>
                        </div>
                  </div>
            </div>
      </section>
      <!-- Cookie Consent -->
      <div id="cookie-consent-banner" class="fixed bottom-0 left-0 right-0 bg-[#1C1C1C] shadow-lg p-4 flex flex-col items-center justify-center gap-2 z-50">
            <p class="text-center  text-white px-4 py-2 rounded-md">
                  We use cookies to enhance your browsing experience, serve personalized ads or content, and analyze our traffic. By clicking "Accept All", you consent to our use of cookies.
                  <a href="/privacy-policy">Read more</a>.
            </p>
            <div class="cookie-buttons">
                  <button id="accept-all-cookies" class="inline-block px-2 py-2 bg-[#E57C2F] text-white shadow hover:bg-[#d86f2a] transition">Accept All</button>
                  <button id="decline-cookies" class="inline-block px-2 py-2 bg-[#E57C2F] text-white shadow hover:bg-[#d86f2a] transition">Decline</button>
            </div>
      </div>


      <?php require('footer.php') ?>

      <script src="js/navbar.js"></script>
      <script src="js/pwd_hide.js"></script>
      <script src="js/joinUsForm.js"></script>
      <script src="js/cookie.js"></script>
</body>

</html>