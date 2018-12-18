<?php 
include 'config.php'; 
?>
<?php
$sql = "DELETE FROM post WHERE postid=".$_GET['postid']."";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

header("Location: {$_SERVER['HTTP_REFERER']}");


?>