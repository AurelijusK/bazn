<?php 
include 'config.php'; 
?>
<?php




$sql = "INSERT INTO video (videotitle, videolink, videodate) VALUES ('" . $_POST['videotitle'] . "','" . $_POST['videolink'] . "','" .date("Y-m-d"). "')";			
if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
header("Location:videoadm.php");
 
