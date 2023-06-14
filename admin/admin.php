<?php include("./parts/menu.php"); ?>

    <!----------  Main section ----------->
    <div class="main">
    <div class="wrapper">
    <h1>Admin Manage</h1 >

    <br>
    
    <?php 
    if(isset($_SESSION['add'])){
        echo "<h2 class= 'success'>". $_SESSION['add']."</h2>";
        unset($_SESSION['add']);
    }
    
    ?>
    <br>
    <br>
    <a href="new-admin.php" class="btn-primary">Add Admin</a>
    <br> <br>
    <table class="fullwidth">
        <tr>
            <th>Id</th>
            <th>Full name</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>
        
        
        <?php
        $query = "SELECT id, fullname, username FROM userslist";
        $result = mysqli_query($conn,$query) or die(mysqli_error());;

        if($result==TRUE){ // check if query is successfully excuted
            $rows = mysqli_num_rows($result);

            if ($rows>0){// check the numbers of data in db
                while($rows=mysqli_fetch_assoc($result)){
                    $id=$rows['id'];
                    $fullname = $rows['fullname'];
                    $username = $rows["username"];
                 ?>
                    <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $fullname?></td>
                    <td><?php echo $username?></td>
                    <td>
                       <a href="update_admin.php?id=<?php echo $id;?>" class='btn-sec'>Update Admin</a>
                       <a href="change_password.php?id=<?php echo $id;?>" class='btn-sec'>Change Password</a>  
                       <a href="delete_admin.php?id=<?php echo $id;?>" class='btn-dang'>Delete Admin</a> 
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