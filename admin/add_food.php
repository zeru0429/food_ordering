<?php include("./parts/menu.php"); ?>
<div class="main">
    <div class="wrapper">
    <h1>Add Catagory</h1 >              
    <form action="#" method="post" enctype='multipart/form-data'>
        <table class="halfwidth">
            <tr>
                <td>title</td>
                <td> <input type="text" name="title" placeholder='title'> </td>
            </tr>
            <tr>
                <td>Description</td>
               <td> <textarea name="description" id="description" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="price" placeholder='price'></td>
            </tr>
            <tr>
                <td>select image</td>
                <td> <input type="file" name="image"> </td>
            </tr>
            <tr>
                <td>Catagory</td>
                <td>
                <select name="catagory" id="catagory">
                    <?php
                    $query = "SELECT * FROM catagoy";
                    $result = mysqli_query($conn,$query) or die( mysqli_error()) ;

                    if($result==TRUE){ // check if query is successfully excuted
                        $rows = mysqli_num_rows($result);
            
                        if ($rows>0){// check the numbers of data in db
                            while($rows=mysqli_fetch_assoc($result)){
                                $id=$rows['id'];
                                $title = $rows['title'];
                             ?>
                    <option value="<?php echo $id;?>"><?php echo $title; ?></option> 
                   <?php 
                     }

                    }
                    else{
                        //no data here// empty database
                    }

                }

                ?>
                </select></td>
            </tr>
            <tr>
                <td>feature</td>
                <td><input type="radio" name="feature" value='yes'>yes</td>
                <td><input type="radio" name="feature" value='no'>no</td>
            </tr>
            <tr>
                <td>active</td>
                <td><input type="radio" name="active" value='yes'>yes</td>
                <td><input type="radio" name="active" value='no'>no</td>
            </tr>
            
            <tr>
                <td colspan="2"><input type="submit" name="addfood" value="addfood" class="btn-sec"></td>
            </tr>
        </table>
        </form>

</div>
</div>




<?php

if(isset($_POST['addfood'])){
    $title = $_POST['title'];
    $description=$_POST['description'];
    $price = $_POST["price"];
    $catagoryId= $_POST['catagory'];

    if(isset($_POST["feature"])){
        $feature = $_POST["feature"];
    }
    else{
        $feature ="no";
    }
    if(isset($_POST["active"])){
      $active =  $_POST["active"];
    }
    else{
        $active =  "no";
        
    }

    if(!isset($_FILES['image']['name'])){
        $image_name = "";
    }
    else{
        //to upload image we need three things
        //image name, source, destination
        $image_name = $_FILES['image']['name']; 
        $image_source = $_FILES['image']['tmp_name'];
     
        // to prevent image repleacement we rename image during uploading
        // 1st get extention
       // $parts = explode('.', $image_name);
        //$ext = end($parts);
        //$image_name ="food_catagory.'$ext'";
        $image_destination = "../images/food/".$image_name;
      
       //finally upload
        $uplode = move_uploaded_file($image_source,$image_destination);
        //print_r($uplode);
       
        if($uplode==FALSE){
            $_SESSION["add"]="faile to upload image";
            header("Location:".HOMEURL."/admin/food.php");
            die();
        }
        
    }
    
    $query ="INSERT INTO food (title,description,price,image_name,category_id,featured,active) VALUES('$title','$description','$price','$image_name','$catagoryId','$feature','$active')";
    
    // echo $query;
    // die();
    $result = mysqli_query($conn,$query)or die(mysqli_error());
    if($result==TRUE){
        $_SESSION["add"]=$title." add successfully";
        header("Location:".HOMEURL."admin/food.php");
    }
    else{
        $_SESSION["add"]=" failed to add";
        if(isset($_SESSION['add'])){
       echo "<h1 class='error'>". $_SESSION['add']."</h1>";
       unset($_SESSION['    add']);

    }


}


}

include("./parts/footer.php") ?>
