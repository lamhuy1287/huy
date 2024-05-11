<?php
session_start();
// echo "file log out";
if(isset($_SESSION["admin"])){
    unset($_SESSION["admin"]);
}
header("location:./login.php");

?>