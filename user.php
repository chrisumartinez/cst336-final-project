<?php
session_start();

include 'database.php';
$conn = getDatabaseConnection();

function displayTable(){
    if (isset($_POST["sort"])){
        $param = $_POST["sort"];
        showAllRecords($param);
    }
}



/*
show all the records and albums of artists.
*/
function showAllRecords($param){
    global $conn;
    
    
    //get correct syntax for searching:
    if($param == "album"){
        $param = "albums.title";
    }
    else{
        if($param == "genre"){
            $param == "genre";
        }
        else{
             $param = "name";
        }
       
    }
    
    
    $sql = "SELECT *
            FROM artist
            INNER JOIN albums ON albums.artist_id=artist.artist_id
            ORDER BY " . $param;
            
        
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo '<br>';
    
    echo ' <table class="table table-striped">
    <thead align = "left">
      <tr>
        <th>Name</th>
        <th>Album</th>
        <th>Genre</th>
      </tr>
    </thead>
    <tbody>';
    foreach($records as $record){
        echo '<tr>';
      echo  "<td>" . $record["name"] . "<td>" . $record["title"] . "<td>" . $record["genre"];
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
    <form method = "post">
        <div class="btn-group" id = "btn-group" role="group" aria-label="Basic example" >
        <br>
        <input type = "submit" name = "sort" value = "artist" />
         <input type = "submit" name = "sort" value = "genre" />
          <input type = "submit" name = "sort" value = "album" />
        
</div>
        
    </form>

    <div id = "userlist">
        <?=displayTable()?>
    </div>
    </body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</html>