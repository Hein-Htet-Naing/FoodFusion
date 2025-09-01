<?php

namespace Lupid\FoodFusion\Controller;

use Lupid\FoodFusion\Model\UserListProcess;
use Helper\HTTP;

class UserlistController
{
      public function handle(int $id)
      {
            $userlist = new UserListProcess();

            if ($userlist->delete_user($id)) {
                  $_SESSION['deleted_success'] = 'Deleted Successfully';
                  HTTP::redirect("/backend/UserListsPage.php");
            } else {
                  $_SESSION['deleted_error'] = 'Error Deleting User!';
                  HTTP::redirect("/backend/UserListsPage.php");
            }
      }
}
