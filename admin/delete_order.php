<?php
include("./parts/menu.php");

 if(isset( $_GET['id'])){
 $id = $_GET['id'];
 
 $query = "DELETE FROM orders WHERE id =$id";
 $result = mysqli_query($conn,$query)or die(mysqli_error());

if($result == True){
    $_SESSION["add"]="food deleted successfully";
     header("Location:".HOMEURL."admin/order.php");
     
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