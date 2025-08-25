<?php

namespace Lupid\FoodFusion\Model;

use Lupid\FoodFusion\Config\Database as dbh;
use Helper\HTTP;
use PDO;

class ReactionProcess
{
      private $pdo;

      public function __construct()
      {
            $this->pdo = (new dbh)->getPdo();
      }

      public function set_reaction(int $cookbookid)
      {
            $sql = "UPDATE cookbook SET rection_count = rection_count + 1 WHERE community_id = :cookbookid";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':cookbookid', $cookbookid);
            $stmt->execute();
            return $stmt->rowCount() > 0;
      }
      public function fetch_reactions(int $cookbookid)
      {
            $sql = "SELECT rection_count FROM cookbook WHERE community_id = :cookbookid";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':cookbookid', $cookbookid);
            $stmt->execute();
            return $stmt->fetchColumn();
      }
}
