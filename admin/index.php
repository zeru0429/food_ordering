<?php include("./parts/menu.php") ?>

    <!----------  Main section ----------->
    <div class="main">
    <div class="wrapper">
    <h1>Dashbord</h1 >
<?php if(isset($_SESSION['login'])){
               echo "<h1 class='success'>". $_SESSION['login']."</h1>";
               unset($_SESSION['login']);
            }  
             ?>
    <div class="catagor text-center">
  <?php  $query = "SELECT * from catagoy";
    $result=mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);

    ?>
        <h2><?php echo $rows?></h2>
        <br>
        Catagory
    </div>
    
    <div class="catagor text-center">
    <?php  $query = "SELECT * from food";
    $result=mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);

    ?>
        <h2><?php echo $rows?></h2>
        <br>
        Food
    </div>

    <div class="catagor text-center">
    <?php  $query = "SELECT * from orders";
    $result=mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);

    ?>
        <h2><?php echo $rows?></h2>
        <br>
        Toatal Order
    </div>

    <div class="catagor text-center">
    <?php  $query = "SELECT SUM(total) as total_sum from orders where status ='yes'";
    $result=mysqli_query($conn, $query);
    $rows=mysqli_fetch_assoc($result);
    $total=$rows['total_sum'];    ?>
        <h2><?php echo $total; ?></h2>
        <br>
        Total Revenue
    </div>

<div class="clear-fixt"></div>
    </div>
    
    </div>


    <!----X-----  Main section -----X----->

    
    <?php  include("./parts/footer.php") ?>