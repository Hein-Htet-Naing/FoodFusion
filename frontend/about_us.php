<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';

use Helper\Auth;

$check_user = Auth::checkUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://kit.fontawesome.com/0bf00ca408.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      <!-- <link rel="stylesheet" href="../src/output.css"> -->
      <title>Document</title>
      <style>
            #main {
                  /* Firefox */
                  scrollbar-width: none;
                  /* IE 10+ */
                  -ms-overflow-style: none;
            }

            #main::-webkit-scrollbar {
                  display: none;
            }
      </style>
</head>

<body class="font-sans antialiased">
      <?php require('header.php') ?>
      <main id="main" class="bg-gradient-to-b from-orange-50 to-white overflow-y-auto scroll-smooth">
            <!-- Hero Section-->
            <section class="relative h-[400px] py-20 text-white bg-cover bg-center bg-no-repeat bg-fixed" style="background-image: url('img/hero_img2.1.jpeg');">
                  <div class="container mx-auto pt-10 px-6 text-center">
                        <h1 class="text-5xl font-bold mb-6">Our Culinary Story</h1>
                        <p class="text-xl max-w-3xl mx-auto">Discover the passion, people, and philosophy behind FoodFusion</p>
                  </div>
                  <div class="absolute bottom-0 left-0 right-0 h-16 bg-white transform skew-y-1 -z-1"></div>
            </section>

            <!-- Our Philosophy -->
            <section class="py-16 px-6 max-w-6xl mx-auto">
                  <div class="flex flex-col md:flex-row items-center gap-12">
                        <div class="md:w-1/2">
                              <img src="img/chef_cooking.jpeg" alt="FoodFusion team cooking" class="rounded-xl shadow-2xl">
                        </div>
                        <div class="md:w-1/2">
                              <h2 class="text-3xl font-bold text-orange-600 mb-6">Our Philosophy</h2>
                              <p class="text-gray-700 mb-4">At FoodFusion, we believe that cooking is more than just preparing meals—it's a creative expression, a way to connect with cultures, and a means to bring people together.</p>
                              <p class="text-gray-700 mb-6">Our platform is built on three core principles: creativity in the kitchen, respect for diverse culinary traditions, and the joy of sharing food experiences.</p>
                              <div class="space-y-4">
                                    <div class="flex items-start">
                                          <div class="flex-shrink-0 bg-orange-100 p-2 rounded-full mr-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                                </svg>
                                          </div>
                                          <div>
                                                <h3 class="font-semibold text-lg text-gray-800">Celebrate Diversity</h3>
                                                <p class="text-gray-600">We showcase recipes from every corner of the globe, honoring traditional methods while encouraging innovative fusions.</p>
                                          </div>
                                    </div>
                                    <div class="flex items-start">
                                          <div class="flex-shrink-0 bg-orange-100 p-2 rounded-full mr-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                                </svg>
                                          </div>
                                          <div>
                                                <h3 class="font-semibold text-lg text-gray-800">Empower Home Cooks</h3>
                                                <p class="text-gray-600">Whether you're a beginner or seasoned chef, we provide the tools and community to help you grow your skills.</p>
                                          </div>
                                    </div>
                                    <div class="flex items-start">
                                          <div class="flex-shrink-0 bg-orange-100 p-2 rounded-full mr-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                          </div>
                                          <div>
                                                <h3 class="font-semibold text-lg text-gray-800">Build Community</h3>
                                                <p class="text-gray-600">Food is meant to be shared. We foster connections between food lovers worldwide through our interactive platform.</p>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </section>

            <!-- Our Team -->
            <section class="py-16 bg-orange-100">
                  <div class="container mx-auto px-6">
                        <h2 class="text-3xl font-bold text-center text-orange-600 mb-12">Meet Our Team</h2>
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

            <section class="py-16 px-6 max-w-6xl mx-auto">
                  <h2 class="text-3xl font-bold text-center text-orange-600 mb-12">Our Journey</h2>
                  <div class="relative">

                        <div class="hidden md:block absolute left-1/2 h-full w-1 bg-orange-200 transform -translate-x-1/2"></div>

                        <div class="space-y-12">

                              <div class="relative flex flex-col md:flex-row items-center">
                                    <div class="md:w-1/2 md:pr-12 mb-6 md:mb-0 md:text-right">
                                          <h3 class="text-xl font-semibold text-gray-800">2015 - The Beginning</h3>
                                          <p class="text-gray-600">Founded in a small home kitchen with just 10 recipes and a dream to make cooking accessible to everyone.</p>
                                    </div>
                                    <div class="hidden md:flex items-center justify-center w-8 h-8 rounded-full bg-orange-500 text-white absolute left-1/2 transform -translate-x-1/2">
                                          1
                                    </div>
                                    <div class="md:w-1/2 md:pl-12">
                                    </div>
                              </div>


                              <div class="relative flex flex-col md:flex-row items-center">
                                    <div class="md:w-1/2 md:pr-12 order-1 md:order-1">
                                    </div>
                                    <div class="hidden md:flex items-center justify-center w-8 h-8 rounded-full bg-orange-500 text-white absolute left-1/2 transform -translate-x-1/2">
                                          2
                                    </div>
                                    <div class="md:w-1/2 md:pl-12 mb-6 md:mb-0 order-1 md:order-2">
                                          <h3 class="text-xl font-semibold text-gray-800">2018 - Community Growth</h3>
                                          <p class="text-gray-600">Reached 50,000 members and launched our Community Cookbook feature.</p>
                                    </div>
                              </div>


                              <div class="relative flex flex-col md:flex-row items-center">
                                    <div class="md:w-1/2 md:pr-12 mb-6 md:mb-0 md:text-right">
                                          <h3 class="text-xl font-semibold text-gray-800">2020 - Pandemic Response</h3>
                                          <p class="text-gray-600">Provided free cooking resources to over 250,000 families during lockdowns.</p>
                                    </div>
                                    <div class="hidden md:flex items-center justify-center w-8 h-8 rounded-full bg-orange-500 text-white absolute left-1/2 transform -translate-x-1/2">
                                          3
                                    </div>
                                    <div class="md:w-1/2 md:pl-12">
                                    </div>
                              </div>

                              <div class="relative flex flex-col md:flex-row items-center">
                                    <div class="md:w-1/2 md:pr-12 order-2 md:order-1">
                                    </div>
                                    <div class="hidden md:flex items-center justify-center w-8 h-8 rounded-full bg-orange-500 text-white absolute left-1/2 transform -translate-x-1/2">
                                          4
                                    </div>
                                    <div class="md:w-1/2 md:pl-12 mb-6 md:mb-0 order-1 md:order-2">
                                          <h3 class="text-xl font-semibold text-gray-800">Today - Global Platform</h3>
                                          <p class="text-gray-600">Serving 1.2 million food enthusiasts with recipes from 85 countries and growing daily.</p>
                                    </div>
                              </div>
                        </div>
                  </div>
            </section>
      </main>
      <?php require('footer.php') ?>
      <script src="js/navbar.js"></script>
</body>

</html>