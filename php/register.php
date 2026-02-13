<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$check = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
mysqli_stmt_bind_param($check, "s", $email);
mysqli_stmt_execute($check);
mysqli_stmt_store_result($check);

if(mysqli_stmt_num_rows($check) > 0){
    echo "❌ Ky email ekziston tashmë. Provo login.";
    exit();
}

$stmt = mysqli_prepare($conn, "INSERT INTO users (firstname, lastname, username, email, password) VALUES (?, ?, ?, ?, ?)");

mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $username, $email, $password);

if(mysqli_stmt_execute($stmt)){
header("Location: ../signin.html?error=email_exists");
    exit();
}else{
    echo "Registration failed" . mysqli_error($conn);
}
?>