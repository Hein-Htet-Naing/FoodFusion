<?php

namespace Lupid\FoodFusion\Controller;


use Lupid\FoodFusion\Model\RegisterProcess;
use Exception;
use PDOException;
use Helper\HTTP;

class RegisterController
{
      public function handle()
      {
            // reCaptha
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

            foreach (['firstName', 'lastName', 'email', 'pwd', 'confrimPwd', 'phone'] as $fields) {

                  if (!isset($_POST[$fields]) || empty(trim($_POST[$fields]))) {
                        $_SESSION['register_error'] = "This $fields is required!";
                        HTTP::redirect("/frontend/registerPage.php");
                        return;
                  }
            }
            if ($_POST['pwd'] !== $_POST['confrimPwd']) {
                  $errors['register_error'] = 'Passwords must be same!';
                  HTTP::redirect("/frontend/registerPage.php");
                  return;
            }

            try {
                  $reg_user = new RegisterProcess();
                  $reg_user->setData($_POST, $_FILES);

                  if ($reg_user->email_duplicate()) {
                        $_SESSION['register_errors'] = "This email is already registered!";
                        HTTP::redirect("/frontend/registerPage.php");
                        return;
                  }
                  $reg_user->register();
                  HTTP::redirect("/frontend/loginPage.php", "register=successful");
            } catch (PDOException $e) {
                  throw new Exception("Database error: " . $e->getMessage());
            }
      }
}
