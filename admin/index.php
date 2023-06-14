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
        <h2>5</h2>
        <br>
        Catagory
    </div>
    
    <div class="catagor text-center">
        <h2>5</h2>
        <br>
        Catagory
    </div>

    <div class="catagor text-center">
        <h2>5</h2>
        <br>
        Catagory
    </div>

    <div class="catagor text-center">
        <h2>5</h2>
        <br>
        Catagory
    </div>

<div class="clear-fixt"></div>
    </div>
    
    </div>


    <!----X-----  Main section -----X----->

    
    <?php  include("./parts/footer.php") ?>