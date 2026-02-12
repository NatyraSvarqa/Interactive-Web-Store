<?php
include 'db.php';

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (firstname, lastname, username, email, password)
        VALUES ('$fname','$lname','$username','$email','$password')";

if(mysqli_query($conn, $sql)){
    header("Location: login.html");
}else{
    echo "Registration failed";
}
?>