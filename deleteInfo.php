<?php
    include 'database.php';
    $conn = getDatabaseConnection();
    
    $sql = "DELETE FROM albums
            WHERE album_id =" . $_GET['album_id'];
            
            
    $stmt = $conn->prepare($sql);
    $stmt -> execute();
    header("Location: adminIndex.php");
?>