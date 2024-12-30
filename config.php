<?php

$host = "localhost";       
$username = "root";
$email = "";
$Ph_Number = "";      
$password = "";      
$database = "user_management"; 


$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>