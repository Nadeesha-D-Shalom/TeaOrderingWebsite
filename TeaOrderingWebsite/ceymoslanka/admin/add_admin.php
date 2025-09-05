<?php
session_start();
include 'db.php';
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $dob = $_POST['dob'];
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
    $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if username exists
    $checkUser = "SELECT * FROM admin WHERE username = '$username'";
    $checkResult = mysqli_query($conn, $checkUser);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('Username already exists'); window.location.href='add_admin.php';</script>";
    } else {
        // Insert into database
        $sql = "INSERT INTO admin (username, email, password, full_name, dob, address, contact_number, employee_id)
                VALUES ('$username', '$email', '$password', '$full_name', '$dob', '$address', '$contact_number', '$employee_id')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Admin added successfully'); window.location.href='admin_dashboard.php';</script>";
            exit();
        } else {
            echo "<script>alert('Error adding admin'); window.location.href='add_admin.php';</script>";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Add New Admin</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="assets/headLogos/h1.png">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">CEYMOS LANKA (PVL) LTD<br>Add New Admin</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">

                        <form method="POST" class="signin-form">

                            <div class="form-group">
                                <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>

                            <div class="form-group">
                                <input type="date" name="dob" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="address" class="form-control" placeholder="Address" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="contact_number" class="form-control" placeholder="Contact Number" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="employee_id" class="form-control" placeholder="Employee ID" required>
                            </div>

                            <div class="form-group">
                                <input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Add Admin</button>
                            </div>

                            <div class="form-group d-md-flex">
                                <div class="w-50"></div>
                                <div class="w-50 text-md-right">
                                    <a href="admin_dashboard.php" style="color: #fff">Back to Dashboard</a>
                                </div>
                            </div>

                            <?php if ($error != "") echo "<p style='color:red; text-align:center;'>$error</p>"; ?>
                        </form>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
