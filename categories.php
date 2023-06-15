<?php include("./part/menu.php");
 include("./config/constant.php"); ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
    
            <?php 
             $query = "SELECT * FROM catagoy ";
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


            <a href="category-foods.php">
            <div class="box-3 float-container">
                <img src="images/catagory/<?php echo $imagename; ?>" alt="<?php echo $imagename; ?>" class="img-responsive img-curve">

                <h3 class="float-text text-white"><?php echo $imagename; ?></h3>
            </div>
            </a>
            
            
            <?php      }
    }}
?>

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->
    







    
    <?php   include("./part/footer.php");?>