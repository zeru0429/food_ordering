<?php

if(!isset($_SESSION['username'])){
    header('location:'.HOMEURL."admin/login.php");

}



?>