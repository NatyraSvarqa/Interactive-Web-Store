<?php
include 'db.php';

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $newpass = $_POST['password']; 

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Invalid email format.";
        exit;
    }

     if(strlen($newpass) < 8 || 
       !preg_match('/[A-Z]/', $newpass) || 
       !preg_match('/[0-9]/', $newpass)) {
        echo "Password must be at least 8 characters long and contain 1 uppercase letter and 1 number.";
        exit;
    }


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
?>