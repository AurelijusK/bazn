<?php 
include 'config.php'; 
?>
<?php
$sql = "SELECT *
FROM images
WHERE imggallery=".$_GET['galleryid']."
ORDER BY imgtime DESC";

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){

        while ($row = mysqli_fetch_array($result)){		

        unlink($row['imglink']); 
        unlink($row['imglink2']); 
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "Galerijoje nėra įkelta jokiu fotografijų.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}







$sql = "DELETE FROM gallery WHERE galleryid=".$_GET['galleryid']."";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

header("Location:galleriesadm.php");


?>