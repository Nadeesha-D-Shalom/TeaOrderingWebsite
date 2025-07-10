<?php
session_start();
include 'db.php';

// Redirect if not logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

$adminID = $_SESSION['admin_id'];
$success = $error = "";

// Handle password update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current = $_POST['current_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    if ($new !== $confirm) {
        $error = "New passwords do not match!";
    } else {
        $query = "SELECT password FROM admin WHERE id = $adminID";
        $res = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($res);

        if (password_verify($current, $row['password'])) {
            $hashed = password_hash($new, PASSWORD_DEFAULT);
            $update = "UPDATE admin SET password = '$hashed' WHERE id = $adminID";
            if (mysqli_query($conn, $update)) {
                $success = "Password updated successfully!";
                session_destroy(); // logout the user
            } else {
                $error = "Failed to update password.";
            }
        } else {
            $error = "Incorrect current password!";
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Update Password</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="assets/headLogos/h1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">CEYMOS LANKA (PVL) LTD</h2>
                    <h4>Update Your Password</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <form method="POST" class="signin-form">

                            <?php if ($error) echo "<p style='color:red; text-align:center;'>$error</p>"; ?>
                            <?php if ($success) {
                                echo "<p style='color:green; text-align:center;'>$success</p>";
                                echo "<script>
                                    setTimeout(function() {
                                        window.location.href = 'admin_login.php';
                                    }, 1000);
                                </script>";
                            } ?>

                            <div class="form-group">
                                <input type="password" name="current_password" class="form-control" placeholder="Current Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm New Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Update Password</button>
                            </div>

                            <div class="form-group d-md-flex">
                                <div class="w-100 text-md-right">
                                    <a href="admin_dashboard.php" style="color: #fff;">Back to Dashboard</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
