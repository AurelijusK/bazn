<?php 
include 'config.php'; 
?>
<?php
$sql = "DELETE FROM gallery WHERE galleryid=".$_GET['galleryid']."";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

header("Location:galleries.php");


?>