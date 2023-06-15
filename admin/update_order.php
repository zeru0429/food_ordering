<?php include("./parts/menu.php") ;
if(!isset($_GET['id'])){
    header("location:".HOMEURL."admin/order.php");
}


?>



<div class="main">
    <div class="wrapper">
    <h1>Update Order</h1 >              
    <form action="#" method="post" enctype='multipart/form-data'>

<?php
$id = $_GET['id'];
$query = "SELECT * FROM orders where id=$id";
$result=mysqli_query($conn, $query);
if($result==TRUE){ // check if query is successfully excuted
    $rows = mysqli_num_rows($result);

    if ($rows>0){// check the numbers of data in db
        while($rows=mysqli_fetch_assoc($result)){
                 $id=$rows['id'];
                    $food = $rows['food'];
                    $price= $rows['price'];
                    $quantity = $rows['quantity'];
                    $total = $rows['total'];
                    $ordered_date = $rows['ordered_date'];
                    $status = $rows['status'];
                    $customer_name = $rows['customer_name'];
                    $customer_contact = $rows['customer_contact'];
                    $customer_email = $rows['customer_email'];
                    $customer_address = $rows['customer_address'];

?>

        <table class="halfwidth">

            <tr>
                <td>food</td>
                <td> <h4> <?php echo $food;?></h4> </td>
            </tr>
            <tr>
                <td>price</td>
                <td> <h4> <?php echo $price;?> </h4> </td>
            </tr>
            <tr>
                <td>Status</td>
                <td> <input type="number" name="qty" class="input-responsive" value="<?php echo $status;?>" required> </td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><input type="number" name="qty" class="input-responsive" value="<?php echo $quantity; ?>" required> </td>
            </tr>

            <tr>
                <td>Customer name</td>
                <td> <input type="text" value="<?php echo $customer_name; ?>" name="customer_name" placeholder='customer_name'> </td>
            </tr>
            <tr>
                <td>Customer contact</td>
                <td> <input type="text" value="<?php echo $customer_contact; ?>" name="customer_contact" placeholder='customer_contact'> </td>
            </tr>
            <tr>
                <td>Customer email</td>
                <td> <input type="text" value="<?php echo $customer_email; ?>" name="customer_email" placeholder='customer_email'> </td>
            </tr>
            <tr>
                <td>Customer Address</td>
                <td> <input type="text" value="<?php echo $customer_address; ?>" name="customer_address" placeholder='customer_address'> </td>
            </tr>

            <tr>
                <td colspan="2"><input type="submit" name="updateorder" value="updateorder" class="btn-sec"></td>
            </tr>
        </table>








<?php


        
        }
    }
}
            
?>














<?php include("./parts/footer.php") ?>