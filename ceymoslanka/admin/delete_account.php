<?php
session_start();
include '../db.php';

// Redirect if not logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

$adminID = $_SESSION['admin_id'];
$success = $error = "";

// Handle delete account
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];

    $query = "SELECT password FROM admin WHERE id = $adminID";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);

    if (password_verify($password, $row['password'])) {
        $delete = "DELETE FROM admin WHERE id = $adminID";
        if (mysqli_query($conn, $delete)) {
            session_destroy(); // Logout
            echo "<script>
                alert('Account deleted successfully!');
                setTimeout(() => window.location.href = 'admin_login.php', 500);
            </script>";
            exit();
        } else {
            $error = "Failed to delete account!";
        }
    } else {
        $error = "Incorrect password!";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Delete Account</title>
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
                    <h4>Delete Your Account</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <form method="POST" class="signin-form">

                            <?php if ($error) echo "<p style='color:red; text-align:center;'>$error</p>"; ?>
                            <?php if ($success) echo "<p style='color:green; text-align:center;'>$success</p>"; ?>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Confirm Password to Delete" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-danger submit px-3" onclick="return confirm('Are you sure you want to delete your account permanently?');">Delete Account</button>
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
