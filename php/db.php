<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "student_project";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Database connection failed");
}
?>