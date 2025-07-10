<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $otp = $_POST['otp'];

    if (isset($_SESSION['reset_email']) && isset($_SESSION['otp'])) {
        if ($email === $_SESSION['reset_email'] && $otp === $_SESSION['otp']) {
            $_SESSION['otp_verified'] = true;
            header("Location: reset_password.php");
            exit();
        } else {
            echo "<script>alert('Invalid OTP or Email'); window.location.href='verify_otp.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('OTP expired or not set'); window.location.href='forgot_password.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Verify OTP</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/headLogos/h1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">OTP Verification</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-4 p-md-5">
                    <h3 class="mb-4 text-center">Enter OTP</h3>
                    <form action="" method="POST" class="signin-form">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="otp" class="form-control" placeholder="Enter OTP" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Verify</button>
                        </div>
                        <div class="form-group text-md-right">
                            <a href="forgot_password.php" style="color: #fff;">Resend OTP</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
