<?php
include 'db.php';

$email = $_POST['email'];
$newpass = password_hash("123456", PASSWORD_DEFAULT);

$sql = "UPDATE users SET password='$newpass' WHERE email='$email'";

if(mysqli_query($conn, $sql)){
    echo "Password reset successful. New password: 123456";
}else{
    echo "Email not found";
}
?>