<?php
session_start();


?>


<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://kit.fontawesome.com/0bf00ca408.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="../src/output.css">
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      <title>Document</title>
</head>

<body>


      <div class="flex justify-center items-center min-h-screen text-[#1C1C1C] relative bg-cover bg-position"
            style="background-image: url('img/food_banner1.2.png');">

            <div class="absolute inset-0 backdrop-blur-sm z-0"></div>
            <div class="wrapper relative z-10 max-w-[450px] min-w-[300px] rounded-lg shadow-lg backdrop-blur-sm">
                  <header class="text-center border-b-[2px] m-auto text-2xl border-[#e6e6e6] w-[90%]">Create Account
                  </header>


                  <section class="form signup flex flex-col justify-center items-center p-2">
                        <?php
                        // show error messages
                        if (isset($_SESSION['register_error'])) {
                              echo '<div class="status_message bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">'
                                    . $_SESSION['register_error'] .
                                    '</div>';
                              unset($_SESSION['register_error']);
                        }
                        ?>

                        <form id="signUpForm" enctype="multipart/form-data" method="POST"
                              action="../backend/Public/Register.php" class="w-full p-2 flex flex-col gap-3">
                              <div class="flex flex-col md:flex-row gap-1">
                                    <label class="field flex justify-center items-center gap-2 w-full text-lg">
                                          <i class="fa-solid fa-id-card"></i>
                                          <input class="w-full p-1 border rounded-sm border-[#ccc]" type="text"
                                                placeholder="FirstName" name="firstName">
                                    </label>
                                    <label class="field flex justify-center items-center gap-2 w-full  text-lg">
                                          <i class="fa-solid fa-id-card"></i>
                                          <input class="w-full p-1 border rounded-sm border-[#ccc]" type="text"
                                                placeholder="LastName" name="lastName">
                                    </label>
                              </div>

                              <!-- email -->
                              <label class="field validator flex justify-center items-center gap-2 w-full text-lg">
                                    <i class="fa-solid fa-envelope"></i>
                                    <input class="w-full p-1 border border-[#ccc]" type="email" placeholder="Email"
                                          name="email">
                              </label>

                              <!-- password -->
                              <div class="field w-full text-lg">
                                    <label id="label" class="relative flex justify-center items-center gap-2">
                                          <i class="fa-solid fa-key"></i>
                                          <input class="w-full border rounded-sm border-[#ccc] p-1 text-lg"
                                                type="password" name="pwd" placeholder="Password">
                                          <i class="fa-solid fa-eye absolute
                                              -bottom-[2px] right-2 transform -translate-y-1/2">
                                          </i>
                                    </label>
                              </div>
                              <div class="field w-full text-lg">
                                    <label id="confirmlabel" class="relative flex justify-center items-center gap-2">
                                          <i class="fa-solid fa-key"></i>
                                          <input class="w-full border rounded-sm border-[#ccc] p-1 text-lg"
                                                type="password" name="confrimPwd" placeholder="Confirm Password">
                                          <i class="fa-solid fa-eye absolute 
                                              -bottom-[2px] right-2 transform -translate-y-1/2">
                                          </i>
                                    </label>
                              </div>
                              <!-- PhoneNumber -->
                              <label class="flex jstify-center items-center gap-2 w-full text-lg">
                                    <i class="fa-solid fa-mobile-screen"></i>
                                    <input type="tel" name="phone" placeholder="PhoneNumber"
                                          class="w-full p-1 border rounded-sm border-[#ccc]">
                              </label>

                              <!-- file -->
                              <label class="flex jstify-center items-center gap-2 w-full">
                                    <i class="fa-solid fa-file"></i>
                                    <input
                                          type="file"
                                          name="profile"
                                          class="mt-2 block w-full text-sm text-gray-500
                                                      file:mr-4 file:py-2 file:px-4
                                                      file:rounded-md file:border-0
                                                      file:text-sm file:font-semibold
                                                      file:bg-black file:text-white
                                                      hover:file:bg-blue-700
                                                      transition duration-200 ease-in-out" />
                              </label>
                              <div class="g-recaptcha" data-type="image" data-sitekey="6LdGX5orAAAAAIADwfrEeuPphhaJyrVZvr64Lei1"></div>
                              <div class="w-ful">
                                    <input id="registerButton" type="submit"
                                          class="text-[#fff] bg-[#1C1C1C] w-full text-lg py-1 rounded-sm "
                                          value="Register">
                              </div>
                        </form>
                        <div class="link text-base">Already signed up?<a href="loginPage.php"">Login Now</a></div>
            </section>
      </div>
      </div>
      
      <script src=" js/pwd_hide.js"></script>
                                    <script src="js/message_hide.js"></script>

</body>

</html>