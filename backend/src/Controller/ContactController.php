<?php

namespace Lupid\FoodFusion\Controller;

use Lupid\FoodFusion\Model\Contactprocess;
use Helper\HTTP;

class Contactcontroller
{
      public function run(int $userid, ?int $contactId = null)
      {

            $contact = new Contactprocess();
            if ($contactId !== null) {
                  if ($contact->update_message_from_contact_table($contactId)) {
                        HTTP::redirect("/backend/Comments.php", "status=success");
                  } else {
                        HTTP::redirect("/backend/Comments.php", "status=error");
                  }
                  return;
            }

            if ($userid) {
                  foreach (['name', 'email', 'subject', 'message'] as $fields) {
                        if (empty($_POST[$fields]) || !isset($_POST[$fields])) {
                              HTTP::redirect("/frontend/contact_us.php", "status=error");
                              return;
                        }
                  }
                  $contact->setData($_POST);
                  $contact->insert_contact_data($userid);
                  HTTP::redirect("/frontend/contact_us.php", "status=success");
                  exit;
            }
      }
}
