<?php

namespace Lupid\FoodFusion\Controller;

use Lupid\FoodFusion\Model\AdminProcess;
use Helper\HTTP;
use PDOException;
use Exception;

class AdminController
{
      public function handle()
      {

            foreach (['admin_f_name', 'admin_l_name', 'AdminEmail', 'Adminpwd', 'AdminPhone', 'AdminRole'] as $fields) {

                  if (!isset($_POST[$fields]) || empty(trim($_POST[$fields]))) {
                        $_SESSION['admin_error'] = "This $fields is required!";
                        HTTP::redirect("/backend/UploadAdmin.php");
                        return;
                  }
            }

            try {
                  $admin = new AdminProcess();
                  $admin->setData($_POST, $_FILES);


                  if ($admin->email_duplicate()) {
                        $_SESSION['admin_error'] = "This email is already registered!";
                        HTTP::redirect("/backend/UploadAdmin.php");
                        return;
                  }
                  $admin->insert_admin_to_users();
                  $_SESSION['admin_success'] = "Admin Added Successfully";
                  HTTP::redirect('/backend/UploadAdmin.php');
            } catch (PDOException $e) {
                  throw new Exception("Database error: " . $e->getMessage());
            }
      }
}
