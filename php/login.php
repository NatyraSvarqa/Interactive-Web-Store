<?php
include 'db.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if($user && password_verify($password, $user['password'])){
    $_SESSION['user'] = $user['email'];
    header("Location: index.html");
}else{
    echo "Wrong email or password";
}
?>