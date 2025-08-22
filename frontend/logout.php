<?php
require __DIR__ . '../../vendor/autoload.php';

use Helper\HTTP;

session_start();
unset($_SESSION['user_id']);
session_destroy();

HTTP::redirect("/frontend/loginPage.php");
