<?php
session_start();
include 'database.php';
$conn = getDatabaseConnection();

//check if working
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
       <div id = "frontPageTitle">
           <h1>Get a Random Album to Look for Info!</h1>
           <h2>Or, get scroll over to the users page to search through the music database!</h2>
       </div>
        <div id = "frontPageButton">
            <button id = "randomMusicButton" onclick = "randomize()">Randomize!</button>
        </div>
        <div id = "frontPageBody">
            
        </div>
    </body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script text = "javascript" src = "/js/util.js"></script>
</html>