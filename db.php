<?php
$host = "localhost";
$user = "root";   // change if your MySQL user is different
$pass = "";       // change if your MySQL has a password
$db   = "nagriksetu";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
