<?php include("./parts/menu.php") ?>

   <!----------  Main section ----------->
   <div class="main">
    <div class="wrapper">
    <h1>Order Manage</h1 >
   
    <table class="fullwidth">
        <tr>
            <th>Id</th>
            <th>Food</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Ordered date</th>
            <th>Status</th> 
            <th>Customer name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>


        <?php
        $query = "SELECT * FROM orders ORDER BY ordered_date DESC";
        $result = mysqli_query($conn,$query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
        // check if query is successfully excuted   
        if ($rows>0){
            // check the numbers of data in db
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

        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $food; ?></td>
            <td><?php echo $price; ?></td>
            <td><?php echo $quantity; ?></td>
            <td><?php echo $total; ?></td>
            <td><?php echo $ordered_date; ?></td>
            <td><?php echo $status; ?></td>
            <td><?php echo $customer_name; ?></td>
            <td><?php echo $customer_contact; ?></td>
            <td><?php echo $customer_email; ?></td>
            <td><?php echo $customer_address; ?></td>
            <td>
               <a href="update_order.php?id=<?php echo $id;?>" class="btn-sec">Update Admin</a> 
               <a href="delete_order.php?id=<?php echo $id;?>" class="btn-dang">Delete Admin</a> 
            </td>
        </tr>


<?php
     
    }
    }
    
    
        ?>


        


    </table>

<div class="clear-fixt"></div>
    </div>
    
    </div> 


    <!----X-----  Main section -----X----->





<?php  include("./parts/footer.php") ?>