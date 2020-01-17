<?php
session_start();
if(!isset($_SESSION['login_user'])){
    header("location: signin/signup_ca.php");
}
echo $_SESSION['login_user'];
echo "hi";
if(isset($_POST['subData'])){
    require("./logout.php");
}
?>
    <form action="" method="post" >
        <input type="submit" name="subData" value="Logout">
    </form>