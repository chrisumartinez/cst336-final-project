<?php

function getDatabaseConnection()
{
//    $host = "us-cdbr-iron-east-05.cleardb.net";
  //  $username = "b12a172bae1b47";
//    $password = "b4bb0fe0";
  //  $dbname="heroku_718defa20350e99";
    
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "bca5f27d7798a0";
    $password = "a62cdacd";
    $dbname="heroku_8a41c4f40f86f93";

// Create connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    return $conn;
    
  }

?>