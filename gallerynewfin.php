<?php 
include 'config.php'; 
?>
<?php




$sql = "INSERT INTO gallery (gallerytitle, gallerydate) VALUES ('" . $_POST['gallerytitle'] . "','" .date("Y-m-d"). "')";			
if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
$sql = "SELECT * FROM gallery
        ORDER BY gallerytime DESC
        LIMIT 1";
 if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result) ;      
            header("Location:gallery.php?galleryid=".$row['galleryid']."");
    }
 }
 
