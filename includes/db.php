<?php

    $username = "root";
    $password = "";
    $hostname = "localhost";
    
    //connection to the database
    $db = new PDO("mysql:host=localhost;dbname=validaci_035", $username, $password) 
     or die("Unable to connect to MySQL");
    return $db;
    
?>