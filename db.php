<?php 
//db.php
// Database configuration
$servername = "localhost";
$username = "u408770847_quickrate";
$password = "Agevole@wbp409";
$database = "u408770847_quickrate";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>