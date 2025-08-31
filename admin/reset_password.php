<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password != $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.location.href='forgot_password.php';</script>";
        exit();
    }

    // Update password query
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql = "UPDATE admin SET password = '$hashed_password' WHERE username = '$username'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Password reset successfully!'); window.location.href='admin_login.php';</script>";
    } else {
        echo "<script>alert('Username not found!'); window.location.href='forgot_password.php';</script>";
    }

    mysqli_close($conn);
} else {
    header("Location: admin_login.php");
    exit();
}
