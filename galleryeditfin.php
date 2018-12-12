<?php 
include 'header.php'; 
?>
<?php

if  (empty($_FILES['img']['name'])){
    $path='NULL';
    // var_dump($path);
} else {
    $picture_tmp = $_FILES["img"]["tmp_name"];
    // var_dump($picture_tmp);
    $picture_nameo = explode(".", $_FILES["img"]["name"]);
    // var_dump($picture_nameo);
    $picture_name = date('Y-m-d').'_'.date('G-i-s').".". end($picture_nameo);
    // var_dump($picture_name);
    $picture_type = ($_FILES["img"]["type"]);
    // var_dump($picture_type);
    $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
    
    if(in_array($picture_type, $allowed_type)) {
        $path = 'images/'.$picture_name; //change this to your liking
        move_uploaded_file($picture_tmp, $path);
    } else {
        echo 'File type not allowed';
    }
}


$sql = "INSERT INTO hint (userid, title, content, postimg, date) VALUES ('" . $_SESSION['id'] . "','" . $_POST['title'] . "','" . $_POST['content'] . "','" . $path . "','" .date("Y-m-d"). "')";			
if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
header("Location:allposts.php");
 

?>
<?php
include 'footer.php';
?>    