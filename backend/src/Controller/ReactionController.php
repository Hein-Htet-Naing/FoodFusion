<?php

namespace Lupid\FoodFusion\Controller;

use Lupid\FoodFusion\Model\ReactionProcess;

class ReactionController
{
      public function handle()
      {
            header('Content-Type: application/json');
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cookbook_id'])) {
                  $cookbookid = intval($_POST['cookbook_id']);

                  $reaction = new ReactionProcess();
                  $reacted = $reaction->set_reaction($cookbookid);
                  if ($reacted) {
                        $new_react = $reaction->fetch_reactions($cookbookid);
                        echo json_encode([
                              "success" => true,
                              "new_react" => $new_react
                        ]);
                  } else {
                        echo json_encode([
                              "success" => false,
                              "message" => "Failed to update reaction"
                        ]);
                  }
            }
      }
}
