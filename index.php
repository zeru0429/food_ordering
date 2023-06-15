<?php include("./part/menu.php"); 
        include("./config/constant.php"); ?>

 <!-- fOOD sEARCH Section Starts Here -->
 <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
        <?php

if(isset($_SESSION['add'])){
    echo "<h1 class='success'>". $_SESSION['add']."</h1>";
    unset($_SESSION['add']);
 }
?>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


  <!-- CAtegories Section Starts Here -->
  <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php 
             $query = "SELECT * FROM catagoy where active='yes' and feature='yes' limit 3";
             $result = mysqli_query($conn,$query) or die(mysqli_error());
            
             if($result==TRUE){ // check if query is successfully excuted
                $rows = mysqli_num_rows($result);
            
                if ($rows>0){// check the numbers of data in db
                    while($rows=mysqli_fetch_assoc($result)){
                        $id=$rows['id'];
                        $title = $rows['title'];
                        $feature = $rows["feature"];
                        $active = $rows["active"];
                        $imagename= $rows["image_name"];
               
            
            ?>

                <a href="category-foods.php?id=<?php echo $id?>">
                    <div class="box-3 float-container">
                         <img src="images/catagory/<?php echo $imagename; ?>" alt="<?php echo $imagename; ?>" class="img-responsive img-curve">

                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                    </div>
                </a>


            <?php 
                }}}
            ?>


             <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    

    <!-- fOOD MEnu Section Starts Here -->
   
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                $query = "SELECT * FROM food where active='yes'";
                $result = mysqli_query($conn,$query) or die(mysqli_error());

                if($result==TRUE){ // check if query is successfully excuted
                    $rows = mysqli_num_rows($result);

                 if ($rows>0){// check the numbers of data in db
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

        <p class="text-center">
            <a href="food.php">See All Foods</a>
        </p>

        

   
    <!-- fOOD Menu Section Ends Here -->



   


  <?php   include("./part/footer.php");?>