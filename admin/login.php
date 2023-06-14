<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<div class="menu">
    <div class="wrapper">
        <h1 class='sucess'>Wellcome TO begize Delivery </h1>
    </div>
</div>

<div class="main">
    <div class="wrapper">

    <form action="#" method="post">
        <table class="halfwidth">
            <tr>
                <td>username</td>
                <td> <input type="text" name="username" placeholder="username" > </td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="password" placeholder="password"  ></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="login" value="login" class="btn-sec"></td>
            </tr>
        </table>
        </form>

    </div>
</div>


<div class="clear-fixt">
    <div>
    </div>
    
    </div> 






<?php
include('../config/constant.php');

if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password =md5($_POST['password']);
    $query="SELECT * FROM userslist WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
    
    if ($rows==1){
            $_SESSION["login"]=$id."login successfully";
            $_SESSION["username"]=$username;
            header("Location:".HOMEURL."admin/index.php");
        }
    else{
            $_SESSION["login"]=" fail to login";
            if(isset($_SESSION['login'])){
               echo "<h1 class='error'>". $_SESSION['login']."</h1>";
               unset($_SESSION['login']);
            }   
    }
    
    

    


    }


include("./parts/footer.php")
?>
