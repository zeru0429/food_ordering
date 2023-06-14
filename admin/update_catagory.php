<?php include("./parts/menu.php") ;
if(!isset($_GET['id'])){
    header("location:".HOMEURL."admin/catagory.php");
}

$id = $_GET['id'];
$query = "SELECT id, title,	image_name, feature,active FROM catagoy where id=$id";
$result=mysqli_query($conn, $query);
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

<div class="main">
    <div class="wrapper">
    <h1>Update Catagory</h1 >              
    <form action="#" method="post" enctype='multipart/form-data'>
        <table class="halfwidth">
            <tr>
                <td>title</td>
                <td> <input type="text" value="<?php echo $title; ?>" name="title" placeholder='title'> </td>
            </tr>
            <tr>
                <td>select image</td>
                <td> <input type="file" name="image"> </td> 
            </tr>
            <tr>
                <td>image</td>
            <?php
                if(!isset($imagename)){
                    echo "<td>no image added    </td>";
                }
                else{ 
                    ?> 
                    <td>
                 <img src="../images/catagory/<?php echo $imagename; ?>" alt="" width="50vh"></td>
                 <?php } ?>
            </tr>
            <tr>
                <td>feature</td> 
                
                <td><input type="radio" name="feature" value='yes'<?php  if($feature=="yes") echo "checked"; ?> >yes</td>
                <td><input type="radio" name="feature" value='no'<?php if($feature=='no') echo "checked";?>    >no</td>
            </tr>
            <tr>
                <td>active</td>
                <td><input type="radio" name="active" value='yes' <?php  if($active=="yes") echo "checked"; ?>>yes</td>
                <td><input type="radio" name="active" value='no'<?php if($active=="no") echo "checked" ?>   > no</td>
            </tr>
            
            <tr>
                <td colspan="2"><input type="submit" name="addcatagory" value="addcatagory" class="btn-sec"></td>
            </tr>
        </table>
        </form>
        <?php
            }

        }
        else{
            //no data here// empty database
            echo "<h1 class='error'>admin is not available </h1>";
        }

    }
    ?>
</div>
</div>

<?php  

if(isset($_POST['addcatagory'])){
    $title = $_POST['title'];

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
        $image_name = $image_name;
    }
    else{
        //to upload image we need three things
        //image name, source, destination
        $image_name = $_FILES['image']['name']; 
        $image_source = $_FILES['image']['tmp_name'];
        $image_destination = "../images/catagory/".$image_name;
      
       //finally upload
        $uplode = move_uploaded_file($image_source,$image_destination);
        //print_r($uplode);
       
        if($uplode==FALSE){
            $_SESSION["add"]="faile to upload image";
            header("Location:".HOMEURL."/admin/catagory.php");
            die();
        }
        
    }


    $query ="UPDATE catagoy SET title='$title',image_name='$image_name',feature='$feature',active='$active' WHERE id='$id'";
    $result = mysqli_query($conn,$query)or die(mysqli_error());
    $result = mysqli_query($conn,$query) or die(mysqli_error());
    if($result == True){
        $_SESSION["add"]=$title." updated successfully";
         header("Location:".HOMEURL."admin/catagory.php");
         
     }else{
         $_SESSION["add"]=" failed to Update";
         if(isset($_SESSION['add'])){
        echo "<h1 class='error'>". $_SESSION['add']."</h1>";
        unset($_SESSION['add']);
    }
}

}






include("./parts/footer.php") ?>