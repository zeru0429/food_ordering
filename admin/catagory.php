<?php include("./parts/menu.php") ?>

   <!----------  Main section ----------->
   <div class="main">
    <div class="wrapper">
    <h1>Catagory Manage</h1 >
    <br>
    <?php   if(isset($_SESSION['add'])){
       echo "<h1 class='error'>". $_SESSION['add']."</h1>";
       unset($_SESSION['add']);}  
    
    ?>
    <br>
    <a href="addcatagory.php" class="btn-primary">Add Catagory</a>
    <br> <br>
    <table class="fullwidth">
        <tr>
            <th>id</th>
            <th>title</th>
            <th>image</th>
            <th>featur</th>
            <th>active</th>
        </tr>
        <?php
        $query = "SELECT id, title,	image_name, feature,active FROM catagoy";
        $result = mysqli_query($conn,$query) or die(mysqli_error());;

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

        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $title; ?></td>
            <td>
            <?php
                if(!isset($imagename)){
                    echo "<td>no image</td>";
                }
                else{ 
                    ?> 
                 <img src="../images/catagory/<?php echo $imagename; ?>" alt="" width="50vh"></td>
                 <?php } ?>

              
            
            <td><?php echo $feature; ?></td>
            <td><?php echo $active; ?></td>
            <td>
                       <a href="update_catagory.php?id=<?php echo $id;?>" class='btn-sec'>Update Admin</a>
                       <a href="delete_catagory.php?id=<?php echo $id;?>&image_name=<?php echo $imagename;?>" class='btn-dang'>Delete Admin</a> 
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