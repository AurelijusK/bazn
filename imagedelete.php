<?php 
include 'config.php'; 
?>
<?php
$sql = "SELECT *
FROM images
WHERE imgid=".$_GET['imgid']."
ORDER BY imgtime DESC";

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);					
        unlink($row['imglink']); 
        unlink($row['imglink2']); 
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "Galerijoje nėra įkelta jokiu fotografijų.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}




$sql2 = "DELETE FROM images WHERE imgid=".$_GET['imgid']."";

if ($conn->query($sql2) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

header("Location: {$_SERVER['HTTP_REFERER']}");


?>


