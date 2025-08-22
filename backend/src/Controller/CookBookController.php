<?php

namespace Lupid\FoodFusion\Controller;

use Lupid\FoodFusion\Model\CookBookProcess;
use Helper\HTTP;

class CookBookController
{
      public function handle(int $userid)
      {
            foreach (
                  [
                        'recipeName',
                        'description',
                        'prepTime',
                        'cookTime',
                        'servings',
                        'ingredients',
                        'instructions',
                        'recipeType',
                        'difficulty'
                  ] as $fields
            ) {
                  if (!isset($_POST[$fields]) || empty(trim($_POST[$fields]))) {
                        $_SESSION['uploadCookBook_error'] = "This $fields is required!";
                        HTTP::redirect("/frontend/uploadCookBook.php");
                        return;
                  }
            }
            //check if the time fields are positive integers
            foreach (['prepTime', 'cookTime', 'servings'] as $timeFields) {
                  if (!ctype_digit($_POST[$timeFields]) || $_POST[$timeFields] <= 0) {
                        $_SESSION['uploadCookBook_error'] = "This $timeFields must be a positive integer!";
                        HTTP::redirect("/frontend/uploadCookBook.php");
                        return;
                  }
            }
            //checking image file size
            $size = $_FILES['recipeImage']['size'];
            $totalFileSize = 1000 * 1024 * 1024; // 100MB
            if ($size > $totalFileSize) {
                  $_SESSION['uploadCookBook_error'] = "File size exceeds the limit of 100MB!";
                  HTTP::redirect("/frontend/uploadCookBook.php");
                  return;
            }

            $cookbook  = new CookBookProcess();
            $cookbook->setData($_POST, $_FILES);

            $cookbook->insert_cookbook_data($userid);
            $_SESSION['uploadCookBook_success'] = "Recipe submitted successfully! It will be reviewed and added to the community cookbook soon";
            HTTP::redirect("/frontend/uploadCookBook.php");
      }
}
