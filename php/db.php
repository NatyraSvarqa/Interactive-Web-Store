<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "interactive_web_store";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Database connection failed");
}
?>