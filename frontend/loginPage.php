<?php
session_start();
$locked = false;
$remain_time = 0;

if (isset($_COOKIE['login_counter'])) {
      $expire_time = $_COOKIE['login_counter'];
      if ($expire_time > time()) {
            $locked = true;
            $remain_time = $expire_time - time();
      } else {
            setcookie("login_counter", "", time() - 3600, '/');
      }
}

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
            style="background-image: url('img/food_banner1.jpeg');">
            <div class="absolute inset-0 backdrop-blur-sm z-0"></div>
            <div class="wrapper relative z-10 max-w-[450px] min-w-[300px] rounded-lg shadow-lg backdrop-blur-sm">
                  <header class="text-center border-b-[2px] m-auto text-2xl border-[#e6e6e6] w-[90%]">Welcome back
                  </header>
                  <?php if (isset($_GET['register'])) {
                        if ($_GET['register'] == "successful") {
                              echo '<div class="status_message bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                              <span class="font-medium">Registration successful!</span>
                              </div>';
                        }
                  }
                  ?>
                  <section class="form signup flex flex-col justify-center items-center p-2">
                        <?php if ($locked) : ?>
                              <div class="text-center text-xl text-red-600 m-2">
                                    Too many failed login attempts. Please try again after <span id="timer">3 mins</span>
                              </div>
                              <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                          countDown(<?php echo max($remain_time, 0); ?>);
                                    });
                              </script>
                        <?php else: ?>
                              <form id="signUpForm" method="POST" enctype="multipart/form-data" action="../backend/Public/Login.php"
                                    class="w-full p-2 flex flex-col gap-3">
                                    <!-- show error -->
                                    <?php
                                    if (isset($_SESSION['login_error'])) {
                                          echo '<div class="status_message bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">'
                                                . $_SESSION['login_error'] .
                                                '</div>';
                                          unset($_SESSION['login_error']);
                                    }
                                    ?>
                                    <!-- email -->
                                    <label class="field validator flex justify-center items-center gap-2 w-full text-lg">
                                          <i class="fa-solid fa-envelope"></i>
                                          <input class="w-full p-1 border border-[#ccc]" type="email" placeholder="Email"
                                                name="email" required>
                                    </label>

                                    <!-- password -->
                                    <label id="label" class="field w-full text-lg">
                                          <label class="wrapper relative flex justify-center items-center gap-2">
                                                <i class="fa-solid fa-key"></i>
                                                <input class="w-full border rounded-sm border-[#ccc] p-1 text-lg"
                                                      type="password" name="pwd" placeholder="Password" required>
                                                <i class="fa-solid fa-eye absolute
                                              -bottom-[2px] right-2 transform -translate-y-1/2">
                                                </i>
                                          </label>
                                    </label>
                                    <div class="g-recaptcha" data-type="image" data-sitekey="6LdGX5orAAAAAIADwfrEeuPphhaJyrVZvr64Lei1"></div>
                                    <div class="w-ful">
                                          <input id="signUpButton" type="submit"
                                                class="text-[#fff] bg-[#1C1C1C] w-full text-lg py-1 rounded-sm "
                                                value="Login">
                                    </div>
                              </form>
                              <div class="link text-base">Don't have an account?<a href="registerPage.php"">Register Now</a></div>
                        <?php endif; ?>
            </section>
      </div>
      </div>
      


                                          <script src=" js/pwd_hide.js">
                                          </script>
                                          <script>
                                                function countDown(seconds) {
                                                      let time_display = document.getElementById("timer");
                                                      var interval = setInterval(function() {
                                                            let minutes = Math.floor(seconds / 60);
                                                            let sec = seconds % 60;
                                                            time_display.innerHTML = minutes + " min " + sec + "sec";
                                                            seconds--;
                                                            if (seconds < 0) {
                                                                  clearInterval(interval);
                                                                  location.reload();
                                                            }
                                                      }, 1000);
                                                }
                                          </script>
                                          <script src="js/message_hide.js">
                                          </script>
</body>

</html>