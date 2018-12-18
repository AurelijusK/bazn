<?php 
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db="bazn";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db);
    header("Content-type: text/html; charset=utf-8");
    mysqli_set_charset( $conn,'utf8');
    mysqli_query($conn, "SET SESSION character_set_results = 'UTF8'");
    mysqli_query( $conn, 'SET NAMES UTF8');
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>