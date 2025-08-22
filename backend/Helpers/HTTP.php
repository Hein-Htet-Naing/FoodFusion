<?php

namespace Helper;

class HTTP
{
      static $base = 'http://localhost/L5DC112/FoodFusion';
      static function redirect($page, $q = "")
      {
            $url = static::$base . $page;
            if ($q) $url .= "?$q";
            header("location: $url");
            exit();
      }
}
