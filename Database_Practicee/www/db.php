<?php
$servername = "mysql";   
$username = "root";     
$password = "root_password";  
$dbname = "csc226";  
$port = 3306;          

//conection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
