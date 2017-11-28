<?php
session_start();
if (!isset($_SESSION['username'])) {  //checks whether the admin is logged in
    header("Location: index.php");
}

include 'database.php';
$conn = getDatabaseConnection();


if(isset($_GET["album_id"])){
    echo'GETTING INFO.... <br>';
    $info = getInfo();
}

/*
return the record info for the album.
*/

function getInfo(){
    global $conn;
    
    
    $sql = "SELECT *
            FROM albums
            INNER JOIN artist ON artist.artist_id=albums.artist_id
            WHERE album_id =" . $_GET["album_id"];

    $stmt = $conn -> prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    return $record;
}


if(isset($_POST["updateInfo"])){
    
    global $conn;
    

    $sql2 = "UPDATE artist
            SET name = :name,
                genre = :genre
            WHERE artist_id =" . $_GET["artist_id"];
            
    print_r($sql2);
    echo'<br>';
    
    $np2 = array();
    $np2[":name"] = $_POST["name"];
    $np2[":genre"] = $_POST["genre"];
    
    
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute($np2);
    
    $sql =  "UPDATE albums
            SET title = :title,
                song_count = :song_count,
                year =  :year
            WHERE album_id =" . $_GET["album_id"];
    print_r($sql);
    echo'<br>';
            
    $np = array();

    $np[":title"] = $_POST["title"];
    $np[":song_count"] = $_POST["song_count"];
    $np[":year"] = $_POST["year"];
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);

    echo'Information Has been Updated! Returing to Index Page...';
    sleep(2);
    header("Location: adminIndex.php");
    
}




?>



<!DOCTYPE html>
<html>
    <title>
        
    </title>
    <head>
        <link  href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <div class="topnav" id="myTopnav">
  <a href="index.php">Home</a>
  <a href="user.php">Users</a>
  <a href="admin.php">Admins</a>
</div

    <body>
    <h1>Updating Album Info:</h1>
    <br />
        <form method="post" id = "updateInfo">
            Name:<input type="text" name="name" value="<?=$info['name']?>" />
            <br />
            Genre:<input type="text" name="genre" value="<?=$info['genre']?>"/>
            <br />
            Title:<input type  = "text" name = "title" value = "<?=$info["title"]?>" />
            <br/>
            Song_Count:<input type= "text" name ="song_count" value="<?=$info['song_count']?>"/>
            <br/>
            Year:<input type ="text" name= "year" value="<?=$info['year']?>"/>
            <br />
            <input type="submit" value="Update Info" name="updateInfo">
        </form>
    </body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</html>