<?php
session_start();
if (!isset($_SESSION['username'])) {  //checks whether the admin is logged in
    header("Location: index.php");
}
include 'database.php';
$conn = getDatabaseConnection();


function insertInfo(){
    $artist_name = $_POST["artist_name"];
    $album_title = $_POST["album_title"];
    $genre = $_POST["genre"];
    $year = $_POST["year"];
    $song_count = $_POST["song_count"];
    $artist_id = $_POST["artist_id"];
    
    
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
    <form method = "post" id = "form_insert"> 
        Artist Name:
        <br>
        <input type = "text" id = "artist_name" name = "artist_name" required />
        <br>
        Album Name:
        <br>
        <input type = "text" id = "album" name = "album_title" required />
        <br>
        Genre:
        <br>
        <input type = "text" id = "genre" name = "genre" required  />
        <br>
        Year:
        <br>
        <input type = "text" id = "year" name = "year" required  />
        <br>
        Song Count:
        <br>
        <input type = "text" id = "song_count" name = "song_count" required />
        <br>
        Artist ID:
        <br>
        <input type = "text" id = "artist_id" name = "artist_id" required />
        <br>
        <input type = "submit" value = "Submit" />
        
    </form>
    </body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</html>