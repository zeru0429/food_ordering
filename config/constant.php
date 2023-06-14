<?php
session_start();
define("HOST","localhost");
define("USERNAME","food-app");
define("DB","food-app");
define("PASSWORD","1234");
define('HOMEURL',"http://localhost/php/food_ordering/");
$conn = mysqli_connect(HOST,USERNAME,PASSWORD) or die(mysqli_error());
$db_select= mysqli_select_db($conn,DB) or die(mysqli_error());


?>
