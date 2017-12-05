<?php
session_start();
if (!isset($_SESSION['username'])) {  //checks whether the admin is logged in
    header("Location: index.php");
}

include 'database.php';
$conn = getDatabaseConnection();

if (isset($_POST["average"])){
    getAverage();
}
else{
    if(isset($_POST["2000"])){
        getAlbums();
    }
    else if (isset($_POST["awards"])){
        getAwards();
    }
}


/*
Get the average number of artists from each genre.
*/

function getAverage(){
    global $conn;
    
    $sql = "SELECT COUNT(artist_id), genre
            FROM artist
            GROUP BY genre";

    $stmt = $conn -> prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    return $records;
}

/*
Gets Albums before 2000.
*/

function getAlbums(){
    global $conn;
    
    $sql = "SELECT *
            FROM albums
            INNER JOIN artist ON albums.artist_id=artist.artist_id
            WHERE year < 2000
            ORDER BY title";
            
    $stmt = $conn -> prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    return $records;
}

function getAwards(){
    global $conn;
    $sql = "SELECT *
            FROM awards
            INNER JOIN artist ON awards.artist_id=artist.artist_id
            INNER JOIN albums ON awards.album_id=albums.album_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    return $records;
}
function displayAwards(){
    $records = getAwards();
    echo ' <table class="table table-striped table table-inverse">
    <thead align = "left">
      <tr>
      <th>Awards</th>
        <th>Name</th>
        <th>Genre</th>
        <th>Album</th>
        <th>Year</th>
      </tr>
    </thead>
    <tbody>';
    foreach($records as $record){
      echo '<tr>';
      echo  "<td>" .$record["award_title"]. "<td>" . $record["name"] . "<td>" . $record["genre"] . "<td>" . $record["title"] . "<td>" . $record["year"];
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}

function displayAlbums(){
    $records = getAlbums();
    echo ' <table class="table table-striped table table-inverse">
    <thead align = "left">
      <tr>
      <th>Artist</th>
        <th>Title</th>
        <th>Genre</th>
        <th>Song Count</th>
        <th>Year</th>
      </tr>
    </thead>
    <tbody>';
    foreach($records as $record){
      echo '<tr>';
      echo  "<td>" .$record["name"]. "<td>" . $record["title"] . "<td>" . $record["genre"] . "<td>" . $record["song_count"] . "<td>" . $record["year"];
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    
}
//Displays the Average:
function displayAverage(){
    $records = getAverage();
 echo ' <table class="table table-striped table table-inverse">
    <thead align = "left">
      <tr>
        <th>Artist Count</th>
        <th>Genre</th>
      </tr>
    </thead>
    <tbody>';
    foreach($records as $record){
      echo '<tr>';
      echo  "<td>" . $record["COUNT(artist_id)"] . "<td>" . $record["genre"];
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
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
        <h1>Generate Reports:</h1>
        </div>
        <div id = "ButtonForms">
            Generate Form: Average Artist In each Genre:
            <button onclick="showAverage()">Show Average Artist</button>
            <br>
             Genrate Form: Albums before 2000
            <button onclick="showAlbums()">Show Albums before 2000</button>
            <br>
            Generate Form: Award List Sheet
            <button onclick = "showAwards()">Show Awards</button>
            <br>
        </div>
        <div id = "average" >

            <?=displayAverage()?>
        </div>
        <div id = "albums" >
  
            <?=displayAlbums()?>
        </div>
        <div id = "awards" >

            <?=displayAwards()?>
        </div>
    </body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script text = "javascript" src = "/js/util.js"></script>
</html>