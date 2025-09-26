<!-- header -->
<header class="fixed top-0 w-full z-50 mt-6">
      <nav class="">
            <div class="flex justify-between items-center relative text-lg w-[90%] mx-auto bg-transparent
                              border rounded-md shadow-md border-[#ccc] px-4" style="backdrop-filter: blur(10px);">
                  <img class="size-15 md:size-18" src="img/FoodFusionLogov1.1.png" alt="">
                  <div id='burger' class="block md:hidden">
                        <i class="fa-solid fa-bars"></i>
                  </div>
                  <div class="hidden md:block">
                        <ul class="flex items-center gap-2 md:gap-4 lg:gap-6 text-lg lg:text-lg ">
                              <li><a href="index.php" class="hover:text-amber-400">Home </a></li>
                              <li><a href="recipeCollection.php" class="hover:text-amber-400">Receipe</a></li>
                              <li><a href="cookbookCollection.php" class="hover:text-amber-400">Community Cookbook</a></li>
                              <li class="relative group">
                                    <a href="#" class="inline-block hover:text-amber-400">Uploads</a>
                                    <ul class="absolute left-0 w-48 bg-white text-black shadow-lg rounded-md hidden group-hover:block z-10">
                                          <li><a href="uploadCookbook.php" class="block px-4 py-2  hover:bg-amber-100 shadow-lg">Upload CookBook</a></li>
                                    </ul>
                              </li>
                              <li class="relative group">
                                    <a href="#" class="inline-block hover:text-amber-400">Resources</a>
                                    <ul class="absolute left-0 w-48 bg-white text-black shadow-lg rounded-md hidden group-hover:block z-10">
                                          <li><a href="curlinaryResources.php" class="block px-4 py-2 hover:bg-amber-100 shadow-lg">Culinary Resources</a></li>
                                          <li><a href="educationalResources.php" class="block px-4 py-2 hover:bg-amber-100 shadow-lg">Educational Resources</a></li>
                                    </ul>
                              </li>
                              <li><a href="contact_us.php" class="hover:text-amber-400">Contact us</a></li>
                              <li><a href="about_us.php" class="hover:text-amber-400">About us</a></li>
                        </ul>
                  </div>
                  <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> logout</a>
                  <?php else: ?>
                        <a class="hover:text-amber-400" href="loginPage.php">
                              <i class="fa-solid fa-user"></i> Login</a>
                  <?php endif; ?>
            </div>
            <!-- for mobile nav bar -->
            <div id='navbar' class="relative hidden md:hidden w-full">
                  <ul class="absolute w-full flex flex-col justify-center items-center gap-2 top-0 bg-[#f5f5dc] text-[#333333]">
                        <li><a href="index.php" class="hover:text-amber-400">Home </a></li>
                        <li><a href="recipeCollection.php" class="hover:text-amber-400">Receipe</a></li>
                        <li><a href="cookbookCollection.php" class="hover:text-amber-400">Community Cookbook</a></li>
                        <li class="relative group">
                              <a href="#" class="inline-block hover:text-amber-400 transform translate-x-[4em]">Uploads</a>
                              <!-- Dropdown -->
                              <ul class="max-h-0 overflow-hidden group-hover:max-h-40 transition-all duration-300 ease-in-out bg-[#f5f5dc] text-[#333333] rounded-md mt-2">
                                    <li>
                                          <a href="uploadCookbook.php" class="block px-4 py-2 hover:bg-[#ffe8b3]">Upload Cookbook</a>
                                    </li>
                              </ul>
                        </li>
                        <li class="relative group">
                              <a href="" class="inline-block hover:text-amber-400 transform translate-x-[3.5em]">Resources</a>
                              <!-- Dropdown -->
                              <ul class="max-h-0 overflow-hidden group-hover:max-h-40 transition-all duration-300 ease-in-out bg-[#f5f5dc] text-[#333333] rounded-md mt-2">
                                    <li>
                                          <a href="curlinaryResources.php" class="block px-4 py-2 hover:bg-[#ffe8b3]">Culinary Resources</a>
                                    </li>
                                    <li>
                                          <a href="educationalResources.php" class="block px-4 py-2 hover:bg-[#ffe8b3]">Educational Resources</a>
                                    </li>
                              </ul>
                        </li>
                        <li><a href="contact_us.php" class="hover:text-amber-400">Contact us</a></li>
                        <li><a href="about_us.php" class="hover:text-amber-400">About us</a></li>
                  </ul>
            </div>
      </nav>
</header>