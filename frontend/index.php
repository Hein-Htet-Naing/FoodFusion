<?php
require __DIR__ . '../../vendor/autoload.php';
session_start();

use Helper\Auth;
use Lupid\FoodFusion\Model\RecipeProcess;
use Lupid\FoodFusion\Model\CookBookProcess;

$check_user = Auth::checkUser();

$recipe_colllection = new RecipeProcess();
$cookbook_collection = new CookBookProcess();

$recipe = $recipe_colllection->fetch_Limited_recipe();

$cookbook = $cookbook_collection->fetch_Limited_cookbook();
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
                  action="../backend/Public/JoinUs.php"
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
            <div class="max-w-7xl mx-auto items-center px-4 sm:px-6 lg:px-8">
                  <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">Featured Recipes</h2>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Handpicked recipes from our community chefs</p>
                  </div>
                  <!-- Recipe card -->
                  <div id="card-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 justify-center place-items-center">
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

      <!-- event carousel -->
      <section id="events-carousel" class="bg-gray-100 rounded-lg p-8 md:p-12 text-center">
            <h2 class="text-3xl md:text-4xl text-start font-bold mb-8">Upcoming Cooking Events</h2>
            <div class="relative w-full max-w-7xl mx-auto overflow-hidden">
                  <div id="carousel-wrapper" class="flex transition-transform duration-700 ease-in-out">
                        <div class="carousel-item flex-shrink-0 w-full">
                              <img src="img/eventv1.jpg" class="w-full h-120 object-cover rounded-xl">
                        </div>
                        <div class="carousel-item flex-shrink-0 w-full">
                              <img src="img/eventv2.jpg" class="w-full h-120 object-cover rounded-xl">
                        </div>
                        <div class="carousel-item flex-shrink-0 w-full">
                              <img src="img/eventv3.jpg" class="w-full h-120 object-cover rounded-xl">
                        </div>
                  </div>

                  <button id="prev-btn" class="absolute top-1/2 left-0 md:-left-6 transform -translate-y-1/2 bg-white/70 hover:bg-white rounded-full p-2 shadow-md">
                        <i class="fas fa-chevron-left text-gray-700 h-6 w-6"></i>
                  </button>
                  <button id="next-btn" class="absolute top-1/2 right-0 md:-right-6 transform -translate-y-1/2 bg-white/70 hover:bg-white rounded-full p-2 shadow-md">
                        <i class="fas fa-chevron-right text-gray-700 h-6 w-6"></i>
                  </button>
            </div>
      </section>


      <!-- cook book -->
      <section class="py-16 px-6 max-w-6xl mx-auto bg-gradient-to-b from-gray-50 to-white">
            <div class="max-w-7xl mx-auto items-center px-4 sm:px-6 lg:px-8">
                  <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">Trending & Latest CookBook</h2>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Explore the latest culinary inspirations shared by our community</p>
                  </div>
                  <div id="card-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php
                        foreach ($cookbook as $cl) {
                              echo
                              '
                  <div class="card bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="relative h-48 overflow-hidden">
                              <img src="../uploads/cookbook/' . htmlspecialchars($cl['recipePhoto']) . '" alt="Vegetarian Delights" class="w-full h-full object-cover">
                              <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full">' . htmlspecialchars($cl['recipeType']) . '</span>
                              </div>
                        </div>
                        <div class="p-6">
                              <h3 class="text-xl font-semibold text-gray-800 mb-2">' . htmlspecialchars($cl['recipeName']) . '</h3>
                              <p class="text-gray-600 mb-4">' . htmlspecialchars($cl['description']) . '</p>
                              <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                         <span class="text-sm text-gray-600"> Difficulty: ' . htmlspecialchars($cl['difficulty']) . '</span>
                                    </div>
                              </div>
                        </div>
                  </div>       
                        ';
                        };
                        ?>
                  </div>


                  <div class="text-center mt-12">
                        <a href="cookbookCollection.php" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-orange-500 hover:bg-orange-600">
                              View Culinary Inspirations <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                  </div>
            </div>


      </section>

      <!-- new Mission -->
      <section class="py-16 px-6 max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row items-center gap-12">
                  <div class="md:w-1/2 order-2 md:order-1 text-justify">
                        <h2 class="text-3xl font-bold text-orange-600 mb-6">Our Mission</h2>
                        <p class="text-gray-700 mb-4">At FoodFusion, our mission is to democratize culinary knowledge and inspire people to discover the joy of cooking, regardless of their skill level or background.</p>
                        <p class="text-gray-700 mb-6">We're committed to building a global community where food enthusiasts can share, learn, and grow together through the universal language of cuisine.</p>
                        <div class="space-y-3">
                              <div class="flex items-start">
                                    <div class="flex-shrink-0 bg-orange-100 p-2 rounded-full mr-4">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                          </svg>
                                    </div>
                                    <div>
                                          <h3 class="font-semibold text-lg text-gray-800">Inspire Creativity</h3>
                                          <p class="text-gray-600">We provide the tools and inspiration to help you experiment with flavors and techniques, transforming everyday ingredients into extraordinary meals.</p>
                                    </div>
                              </div>
                              <div class="flex items-start">
                                    <div class="flex-shrink-0 bg-orange-100 p-2 rounded-full mr-4">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                          </svg>
                                    </div>
                                    <div>
                                          <h3 class="font-semibold text-lg text-gray-800">Connect Communities</h3>
                                          <p class="text-gray-600">We bridge cultural divides by creating spaces where traditional recipes and innovative fusion cuisine can be shared and celebrated together.</p>
                                    </div>
                              </div>
                              <div class="flex items-start">
                                    <div class="flex-shrink-0 bg-orange-100 p-2 rounded-full mr-4">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                          </svg>
                                    </div>
                                    <div>
                                          <h3 class="font-semibold text-lg text-gray-800">Promote Sustainability</h3>
                                          <p class="text-gray-600">We advocate for mindful cooking practices that reduce food waste, support local producers, and respect our planet's resources.</p>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <div class="md:w-1/2 order-1 md:order-2">
                        <div>
                              <img src="img/chet_team.jpeg" alt="FoodFusion team mission" class="rounded-xl shadow-2xl">
                        </div>
                  </div>
            </div>
      </section>
      <!-- how it works -->
      <section class="pb-16 pt-6 bg-gray-100 skew-section relative">
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
                  We use cookies to enhance your browsing experience, serve personalized
                  ads or content, and analyze our traffic. By clicking "Accept All",
                  you consent to our use of cookies.
                  <a href="/privacy-policy">Read more</a>.
            </p>
            <div class="cookie-buttons">
                  <button id="accept-all-cookies" class="inline-block px-2 py-2 bg-[#E57C2F] text-white shadow hover:bg-[#d86f2a] transition">Accept All</button>
                  <button id="decline-cookies" class="inline-block px-2 py-2 bg-[#E57C2F] text-white shadow hover:bg-[#d86f2a] transition">Decline</button>
            </div>
      </div>


      <?php require('footer.php') ?>
      <script src="js/swiper.js"></script>
      <script src="js/navbar.js"></script>
      <script src="js/pwd_hide.js"></script>
      <script src="js/joinUsForm.js"></script>
      <script src="js/cookie.js"></script>
</body>

</html>