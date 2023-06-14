<?php include("./parts/menu.php") ;
$id = $_GET['id']; ?>
<div class="main">
    <div class="wrapper">
    <h1>Change Password</h1 >
    <br>
<form action="#" method="post">
        <table class="halfwidth">
            <tr>
                <td>Current password</td>
                <td> <input type="password" name="currentpassword" placeholder="current password" > </td>
            </tr>
            <tr>
                <td>New password</td>
                <td><input type="password" name="newpassword" placeholder="new password"  ></td>
            </tr>
            <tr>
                <td>Confirm password</td>
                <td><input type="password" name="confirmpassword" placeholder="confirmpassword"  ></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="change password" class="btn-sec"></td>
            </tr>
        </table>
        </form>
</div>
</div>



<?php 
if(isset($_POST['submit'])){
    $currentPass =md5($_POST['currentpassword']);
    $newPass =md5($_POST['newpassword']);
    $confirmPass =md5($_POST['confirmpassword']);
    $query = "SELECT *from userslist WHERE id ='$id'";
    $result=mysqli_query($conn, $query);

    if($result==TRUE){ // check if query is successfully excuted
    $rows = mysqli_num_rows($result);
        if ($rows>0){
            while($rows=mysqli_fetch_assoc($result)){
                $password = $rows["password"];
            }
        }
}

    if($password!=$currentPass){//incorrect current password
        echo "<h2 class='error'>incorrect current password</h2>";
      
    }
    elseif($newPass!=$confirmPass){// error in confirming 
        echo "<h2 class='error'>error in confirming password</h2>";

    }
    else{
    $query = "UPDATE userslist SET password='$newPass' WHERE id='$id'";
    $result = mysqli_query($conn,$query) or die(mysqli_error());
    
    if($result == True){
        $_SESSION["add"]=$id."change password successfully";
         header("Location:".HOMEURL."admin/admin.php");
         
    }
    else{
         $_SESSION["add"]=" failed to change passwor";
         if(isset($_SESSION['add'])){
            echo "<h1 class='error'>". $_SESSION['add']."</h1>";
            unset($_SESSION['add']);
         }
        }


}



}


include("./parts/footer.php") ?>