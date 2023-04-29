<?php
//declare database credentials
$server = "localhost";
$database = "school";
$username = "root";
$password = "";

//create connection
$conn = mysqli_connect($server, $username, $password, $database);


//check connection
if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}
?>