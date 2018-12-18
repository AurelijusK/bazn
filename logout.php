<?php 
session_start();
if(isset($_SESSION["id"])){
    unset($_SESSION["id"]);
    unset($_SESSION["name"]);
    unset($_SESSION["surname"]);
    //unset($_SESSION["pass"]);
}
session_destroy();
header("Location: index.php");
?>