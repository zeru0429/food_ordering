<?php include("./part/menu.php");
 include("./config/constant.php");
 ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"Category"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php 
            if(isset($_GET['id'])){
                $catagory_id = $_GET['id'];   
            }
            else{ 
                echo "<h1> id is not found</h1>";
                header("location:".HOMEURL."index.php");
                
            }

            $query ="SELECT * FROM food WHERE category_id='$catagory_id'";
            $result = mysqli_query($conn,$query) or die(mysqli_error());

                if($result==TRUE)
                    { // check if query is successfully excuted
                    $rows = mysqli_num_rows($result);

                    if ($rows>0)
                       {    // check the numbers of data in db
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
                    <p class="food-detail">
                    <?php echo $description; ?>
                    </p>
                    <br>

                    <a href="order.php?id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            
            <?php

                             }
                        }
                    }
                ?>

            
           
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php   include("./part/footer.php");?>