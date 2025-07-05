<?php
session_start();
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location: admin_manager.php');
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM admin WHERE id = $id";
$result = mysqli_query($conn, $sql);
$admin = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $employee_id = $_POST['employee_id'];

    $sqlUpdate = "UPDATE admin SET
                    full_name = '$full_name',
                    username = '$username',
                    email = '$email',
                    dob = '$dob',
                    address = '$address',
                    contact_number = '$contact_number',
                    employee_id = '$employee_id'
                  WHERE id = $id";

    if (mysqli_query($conn, $sqlUpdate)) {
        echo "<script>alert('Admin updated successfully'); window.location.href='admin_manager.php';</script>";
    } else {
        echo "<script>alert('Error updating admin');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Admin</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-4">Update Admin</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control" value="<?php echo $admin['full_name']; ?>" required>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $admin['username']; ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $admin['email']; ?>" required>
        </div>
        <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" name="dob" class="form-control" value="<?php echo $admin['dob']; ?>" required>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="<?php echo $admin['address']; ?>" required>
        </div>
        <div class="form-group">
            <label>Contact Number</label>
            <input type="text" name="contact_number" class="form-control" value="<?php echo $admin['contact_number']; ?>" required>
        </div>
        <div class="form-group">
            <label>Employee ID</label>
            <input type="text" name="employee_id" class="form-control" value="<?php echo $admin['employee_id']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Admin</button>
        <a href="admin_manager.php" class="btn btn-secondary">Back</a>
    </form>
</body>
</html>
