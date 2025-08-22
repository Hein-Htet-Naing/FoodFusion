<?php

namespace Helper;

use Helper\HTTP;

class Auth
{
      static function checkUser()
      {
            if (isset($_SESSION['user_id'])) {
                  //return user id
                  return $_SESSION['user_id'];
            } else {
                  HTTP::redirect("/frontend/loginPage.php");
                  exit();
            }
      }

      static function checkAdmin()
      {
            if (!isset($_SESSION['user_id']) || ($_SESSION['role_id'] != 1 && $_SESSION['role_id'] != 3)) {
                  HTTP::redirect("/frontend/index.php");
                  exit();
            }
            //return admin id
            return $_SESSION['user_id'];
      }
}
