<?php
$server = "localhost";
$user = "tosha_user";
$password = "password";
$database = "demo_app";

$conn = mysqli_connect($server,$user,$password,$database);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>