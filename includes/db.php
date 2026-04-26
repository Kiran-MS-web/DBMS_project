<?php
// db.php
$servername = "sql112.infinityfree.com";
$username = "if0_41757643";
$password = "Sumanth035";
$dbname = "if0_41757643_iwp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
