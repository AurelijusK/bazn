<?php 
include 'config.php'; 
?>
<?php
$sql = "DELETE FROM images WHERE imgid=".$_GET['imgid']."";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

header("Location: {$_SERVER['HTTP_REFERER']}");


?>