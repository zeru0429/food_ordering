<?php include("./parts/menu.php") ?>
<div class="main">
    <div class="wrapper">
       
        <h1>Add Admin</h1>
        <br>
        <?php 
    if(isset($_SESSION['add'])){
        echo "<h5>". $_SESSION['add']."</h5>";
        unset($_SESSION['add']);
    }
    ?>
    <br>
        <form action="./insertAdmin.php" method="post">
        <table class="halfwidth">
            <tr>
                <td>Full name</td>
                <td> <input type="text" name="fullname" placeholder="fullname" > </td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" placeholder="username" ></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" placeholder="password" ></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="add admin" class="btn-sec"></td>
            </tr>
        </table>
        </form>

    </div>
</div>

<?php  include("./parts/footer.php") ?>