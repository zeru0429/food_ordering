<?php include("./part/menu.php"); 
include("./config/constant.php"); 
?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="#" method="post" class="order">

                <?php
                if(isset($_GET['id'])){
                    $food_id  = $_GET['id'];  
                }
                else{ 
                    echo "<h1> id is not found</h1>";
                    header("location:".HOMEURL."index.php");   
                }
                
                $query = "SELECT * FROM food where id=' $food_id'";
                $result = mysqli_query($conn,$query) or die(mysqli_error());
                $rows = mysqli_num_rows($result);
                if ($rows>0){
                    // check the numbers of data in db
                    while($rows=mysqli_fetch_assoc($result))
                    {
                        $id=$rows['id'];
                        $title = $rows['title'];
                        $description = $rows['description'];
                        $feature = $rows["featured"];
                        $active = $rows["active"];
                        $imagename= $rows["image_name"];
                        $price= $rows['price'];
                        $catagory_id = $rows['category_id'];
                    
                    ?>

 <fieldset>
                    <legend><?php echo "selectd food"; ?></legend>

                    <div class="food-menu-img">
                        <img src="images/food/<?php echo $imagename;?>" alt="<?php echo $imagename;?>" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>
                        <p class="food-price"><?php echo $price;?></p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>

        <?php
                    }
                }
                 
                  ?>

               
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="order" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
<?php  
    if(isset($_POST['order'])){
    $fullname= $_POST['full-name'];
    $contact = $_POST['contact']; 
    $email= $_POST['email'];
    $address= $_POST['address'];  
    $quantity =$_POST['qty']; 
    $total = $quantity * $price;
    $orderd_date = date('Y-m-d h:m:s');    
    $query ="INSERT INTO orders set food='$title',price='$price',quantity='$quantity',total='$total',ordered_date='$orderd_date',status='$active',customer_name='$fullname',customer_contact='$contact',customer_email='$email',customer_address='$address'";
    echo $query;
    $result = mysqli_query($conn,$query)or die(mysqli_error());
    if($result==TRUE){
        $_SESSION["add"]=$title." successfully ordered at ' $orderd_date '";
        header("Location:".HOMEURL."/index.php");
    }
    else{
        $_SESSION["add"]=" failed to add";
        if(isset($_SESSION['add'])){
       echo "<h1 class='error'>". $_SESSION['add']."</h1>";
       unset($_SESSION['    add']);
    }
    
    
    }
    
    
    } 
        
    
        
       




 include("./part/footer.php");?>