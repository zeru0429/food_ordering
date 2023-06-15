<?php   include("./part/menu.php"); include("./config/constant.php"); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on Your Search <a href="#" class="text-white">"Momo"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

           <?php 
            $serch_item=$_POST['search']; 
            $query = "SELECT * FROM food where title like '%$serch_item%' or description like '%$serch_item%' ";
            $result = mysqli_query($conn,$query) or die(mysqli_error());;
            $rows = mysqli_num_rows($result);
           if($rows>0){
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
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/food/<?php echo $imagename; ?>" alt="<?php echo $imagename; ?>" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price"><?php echo $price; ?></p>
                    <p class="food-detail"> <?php echo $description; ?></p>
                    <br>
                    <a href="order.php?id=<?php echo $id;?>"  class="btn btn-primary">Order Now</a>
                </div>
            </div>

        <?php 
                        }
           }
           else{
            echo "<div class='error'> <h2 class='error'>Food is not found</h2></div>";
           }


           ?>
 


            <div class="clearfix"></div>
           
            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php   include("./part/footer.php");?>