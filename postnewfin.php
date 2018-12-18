<?php 
include 'config.php'; 
?>
<?php




$sql = "INSERT INTO post (posttitle, postcontent, postautor, postdate) VALUES ('" . $_POST['posttitle'] . "','" . $_POST['postcontent'] . "','" . $_POST['postautor'] . "','" .date("Y-m-d"). "')";			
if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
header("Location:post.php");
 
