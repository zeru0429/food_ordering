<?php include("./parts/menu.php") ?>
<div class="main">
    <div class="wrapper">
    <h1>Update Admin</h1 >
    <br>

    <?php   
    $id = $_GET['id'];
    $query = "SELECT fullname, username from userslist WHERE id ='$id' ";
    $result=mysqli_query($conn, $query);
    if($result==TRUE){ // check if query is successfully excuted
        $rows = mysqli_num_rows($result);

        if ($rows>0){// check the numbers of data in db
            while($rows=mysqli_fetch_assoc($result)){
                $fullname = $rows['fullname'];
                $username = $rows["username"];

                ?>

<form action="#" method="post">
        <table class="halfwidth">
            <tr>
                <td>Full name</td>
                <td> <input type="text" name="fullname" placeholder="fullname" value="<?php echo $fullname ?>" > </td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" placeholder="username" value="<?php echo $username ?>" ></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="update admin" class="btn-sec"></td>
            </tr>
        </table>
        </form>

                <?php
            }

        }
        else{
            //no data here// empty database
            echo "<h1 class='error'>admin is not available </h1>";
        }

    }
    ?>
        
</div>
</div>


<?php 

if(isset($_POST['submit'])){
$fullname = $_POST['fullname'];
$username = $_POST['username'];
    $query = "UPDATE userslist SET fullname = '$fullname',username='$username' WHERE id='$id'";
    $result = mysqli_query($conn,$query) or die(mysqli_error());
    if($result == True){
        $_SESSION["add"]=$id." updated successfully";
         header("Location:".HOMEURL."admin/admin.php");
         
     }else{
         $_SESSION["add"]=" failed to Update";
         if(isset($_SESSION['add'])){
        echo "<h1 class='error'>". $_SESSION['add']."</h1>";
        unset($_SESSION['add']);
    }
}

}








include("./parts/footer.php") ?>