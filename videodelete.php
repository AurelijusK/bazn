<?php 
include 'config.php'; 
?>
<?php
$sql = "DELETE FROM video WHERE videoid=".$_GET['videoid']."";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

header("Location: {$_SERVER['HTTP_REFERER']}");


?>