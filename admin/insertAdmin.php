<?php include("./parts/menu.php");
               

if(isset($_POST['submit'])){
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$query = "INSERT INTO userslist (fullname, username, password) VALUES ('$fullname', '$username', '$password')";
print("<pre>");
$result =mysqli_query($conn,$query) or die(mysqli_error());
if($result == True){
   $_SESSION["add"]=$username." sucessfully added";
    header("Location:".HOMEURL."admin/admin.php");
    
}else{
    $_SESSION["add"]=$username." failed to added";
    header("Location:".HOMEURL."admin/new-admin.php");
}

}else{
    echo "btn not  clicked";
}


?>