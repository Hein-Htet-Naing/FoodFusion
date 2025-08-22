<?php

namespace Lupid\FoodFusion\Controller;

use Lupid\FoodFusion\Model\JoinUsProcess;
use Helper\HTTP;
use PDOException;
use Exception;

class JoinUsController
{
      public function handle()
      {

            foreach (['firstName', 'lastName', 'email', 'pwd', 'confrimPwd', 'phone'] as $fields) {

                  if (!isset($_POST[$fields]) || empty(trim($_POST[$fields]))) {
                        $_SESSION['join_us_error'] = "This $fields is required!";
                        HTTP::redirect("/frontend/index.php");
                        return;
                  }
            }

            try {
                  $joinUsProcess = new JoinUsProcess();
                  $joinUsProcess->setData($_POST);

                  if ($joinUsProcess->email_duplicate()) {
                        $_SESSION['join_us_error'] = "This email is already used!";
                        HTTP::redirect("/frontend/index.php");
                        return;
                  }
                  $joinUsProcess->join_us();
                  $_SESSION['join_us_success'] = "You have successfully joined us!";
                  HTTP::redirect("/frontend/index.php");
            } catch (PDOException $e) {
                  throw new Exception("Database error: " . $e->getMessage());
            }
      }
}
