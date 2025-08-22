<?php

namespace Lupid\FoodFusion\Controller;

use Lupid\FoodFusion\Model\loginProcess;
use Helper\HTTP;

class LoginController
{
      public function handle()
      {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                  if (isset($_POST['g-recaptcha-response'])) {
                        $recaptcha = $_POST['g-recaptcha-response'];
                  }

                  if (!$recaptcha) {
                        $_SESSION['errors_recapcha'] = '<h2>Please check the the captcha form.</h2>';
                        exit;
                  }

                  $secret = urlencode('6LdGX5orAAAAABSxp7PcBGpIwIM_FWEhxhcR4WI9');
                  $response = file_get_contents(
                        "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha"
                  );
                  $result = json_decode($response, true);

                  if ($result['success']) {
                        echo '<h2>verification success!</h2>';
                  } else {
                        echo '<h2>reCaptcha verification failed.</h2>';
                  }


                  $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
                  $password = trim($_POST['pwd'] ?? '');
                  if (empty($email) || empty($password)) {
                        $_SESSION['login_error'] = "Please fill in all fields!";
                  }
                  $login_user = new loginProcess();
                  $user = $login_user->find_user_by_email($email);

                  if (!$user || !password_verify($password, $user['pwd'])) {
                        //if user is locked
                        if (isset($_COOKIE['login_counter']) && $_COOKIE['login_counter'] > time()) {
                              HTTP::redirect("/frontend/loginPage.php?lock=true");
                              exit;
                        }
                        if (!isset($_SESSION['login_counter'])) {
                              $_SESSION['login_counter'] = 0;
                        } else {
                              // increment the counter
                              $_SESSION['login_counter'] += 1;
                        }


                        if ($_SESSION['login_counter'] >= 3) {
                              //set 3 minutes
                              $lockTimer = time() + 180;
                              setcookie("login_counter", $lockTimer, $lockTimer, '/');
                              $_SESSION['login_counter'] = 0;
                              HTTP::redirect("/frontend/loginPage.php?lock=true");
                        } else {
                              $_SESSION['login_error'] = "Invalid email or password!";
                              HTTP::redirect("/frontend/loginPage.php");
                        }
                  } else {
                        // Reset failed attempts
                        unset($_SESSION['login_counter']);
                        // Clear lock if exists
                        setcookie("login_counter", "", time() - 3600, "/");

                        //if user login 
                        $_SESSION['user_id'] = $user['userid'];
                        $_SESSION['role_id'] = $user['role_id'];
                        //seperate Path for admin and user
                        if ($user['role_id'] == 2) {
                              HTTP::redirect("/frontend/index.php");
                        } else {
                              HTTP::redirect("/backend/AdminDashboard.php");
                        }
                  }
            }
      }
}
