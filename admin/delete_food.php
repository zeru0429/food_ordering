<?php
 include("./parts/menu.php");

 if(isset( $_GET['id']) && isset($_GET["image_name"])){
 $id = $_GET['id'];
 $image_name = $_GET["image_name"];

if($image_name!=""){
    $path ="../images/food/". $image_name;
    // $_SESSION["add"]=$path;
    // header("location:".HOMEURL."admin/catagory.php");
   // die();
    $remove = unlink($path);
    if($remove==FALSE){
        //fail to remove file
        $_SESSION["add"]=" failed to remove image";
        header("location:".HOMEURL."admin/food.php");
        die();
    }
}

 $query = "DELETE FROM food WHERE id =$id";
 $result = mysqli_query($conn,$query)or die(mysqli_error());
if($result == True){
    $_SESSION["add"]="food deleted successfully";
     header("Location:".HOMEURL."admin/food.php");
     
 }else{
     $_SESSION["add"]=" failed to delete food";
     if(isset($_SESSION['add'])){
    echo "<h1 class='error'>". $_SESSION['add']."</h1>";
    unset($_SESSION['add']);
}
 }


}
else{//back to catagory page
    header("location:".HOMEURL."admin/food.php");
}


?>

<?php  include("./parts/footer.php") ?>