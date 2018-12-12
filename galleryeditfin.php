<?php 
include 'config.php'; 
?>
<?php


if  (empty($_FILES['img']['name'])){
    $path='NULL';
   
} else {
    $picture_tmp = $_FILES["img"]["tmp_name"];
    // var_dump($_FILES["img"]);
    $picture_nameo = explode(".", $_FILES["img"]["name"]);
    // var_dump($picture_nameo);
    $picture_name = date('Y-m-d').'_'.date('G-i-s').".". end($picture_nameo);
    // var_dump($picture_name);
    $picture_type = ($_FILES["img"]["type"]);
    // var_dump($_FILES["img"]);
    $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
  
    if(in_array($picture_type, $allowed_type)) {
        $path = 'images/'.$picture_name; //change this to your liking
        // var_dump($path);
        move_uploaded_file($picture_tmp, $path);
        $sql = "INSERT INTO images (imggallery, imglink, imgtitle) VALUES ('" . $_GET['galleryid'] . "','" . $path . "','" . $_POST['imgtitle'] . "')";			
        if(mysqli_query($conn, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        header("Location:galleryedit.php?galleryid=".$_GET['galleryid']."");
        } else {
            echo 'Netinkamas failas, bandykite kitą!';
        }
        }
?>
