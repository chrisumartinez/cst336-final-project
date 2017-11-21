<?php

function getDatabaseConnection()
{
//    $host = "us-cdbr-iron-east-05.cleardb.net";
  //  $username = "b12a172bae1b47";
//    $password = "b4bb0fe0";
  //  $dbname="heroku_718defa20350e99";
    
    $host = "localhost";
    $username = "chrisumartinez";
    $password = "";
    $dbname="final_project";

// Create connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    return $conn;
    
  }

?>