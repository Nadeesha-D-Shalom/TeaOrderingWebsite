<?php
session_start();
include 'db.php';

//  Only allow logged-in admins
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);

    //  Image Upload
    $imageName = "";
    if (!empty($_FILES["image"]["name"])) {
        $targetDir = "../uploads/coconutProduct/";
        $imageName = time() . "_" . basename($_FILES["image"]["name"]);
        $targetFile = $targetDir . $imageName;
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
    }

    $sql = "INSERT INTO coconut_products (name, description, image) VALUES ('$name', '$desc', '$imageName')";
    if (mysqli_query($conn, $sql)) {
        $success = "Coconut product added successfully!";
    } else {
        $error = "Failed to add product.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Coconut Product</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../assets/headLogos/h1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h3 class="text-center mb-4">Add New Coconut Product</h3>

        <?php if ($success) echo "<div class='alert alert-success'>$success</div>"; ?>
        <?php if ($error) echo "<div class='alert alert-danger'>$error</div>"; ?>

        <form method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow">
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Coconut name" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4" placeholder="Enter description"></textarea>
            </div>

            <div class="form-group">
                <label>Product Image</label>
                <input type="file" name="image" accept="image/*" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-success">Add Coconut Product</button>
            <a href="coconut_manager.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
