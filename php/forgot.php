<?php
include 'db.php';

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $newpass = $_POST['password'];

    $hashed_pass = password_hash($newpass, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users SET password=? WHERE email=?");
    $stmt->bind_param("ss", $hashed_pass, $email);

    if($stmt->execute()) {
        if($stmt->affected_rows > 0){
            echo "Password reset successful.";
        } else {
            echo "Email not found.";
        }
    } else {
        echo "Error occurred.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Please fill in both email and new password.";
}