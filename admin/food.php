<?php include("./parts/menu.php") ?>

   <!----------  Main section ----------->
   <div class="main">
    <div class="wrapper">
    <h1>Food Manage</h1 >
    <br>
    <a href="add_food.php" class="btn-primary">Add Food</a>
    <br> <br>
    <table class="fullwidth">
        <tr>
            <th>id</th>
            <th>title</th>
            <th>description</th>
            <th>price</th>
            <th>image</th>
            <th>catagory id </th>
            <th>featured</th>
            <th>active</th>
            
        </tr>

        <?php
        $query = "SELECT * FROM food";
        $result = mysqli_query($conn,$query) or die(mysqli_error());;

        if($result==TRUE){ // check if query is successfully excuted
            $rows = mysqli_num_rows($result);

            if ($rows>0){// check the numbers of data in db
                while($rows=mysqli_fetch_assoc($result)){
                    $id=$rows['id'];
                    $title = $rows['title'];
                    $description = $rows['description'];
                    $feature = $rows["featured"];
                    $active = $rows["active"];
                    $imagename= $rows["image_name"];
                    $catagory_id = $rows['category_id'];
                    $price= $rows['price'];
                 ?>
        <tr width="80vh">
            <td><?php echo $id; ?></td>
            <td><?php echo $title; ?></td>
            <td>  <?php echo $description; ?></td>
            <td><?php echo $price; ?></td>
            
            <?php
                if(!isset($imagename)){
                    echo "<td>no image</td>";
                }
                else{ 
                    ?> 
                <td><img src="../images/food/<?php echo $imagename; ?>" alt="" width="50vh"></td>
                 <?php 
                 } 
                 ?>
            <td><?php echo $catagory_id; ?></td>
            <td><?php echo $feature; ?></td>
            <td><?php echo $active; ?></td>
            <td>
                       <a href="update_food.php?id=<?php echo $id;?>" class='btn-sec'>Update food</a>
                       <a href="delete_food.php?id=<?php echo $id;?>&image_name=<?php echo $imagename;?>" class='btn-dang'>Delete food</a> 
            </td>
                
        </tr>
        <?php 
            
        }

    }
    else{
        //no data here// empty database
    }

}


?>

    </table>

<div class="clear-fixt"></div>
    </div>
    
    </div> 


    <!----X-----  Main section -----X----->





<?php  include("./parts/footer.php") ?>