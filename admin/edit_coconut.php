    <?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

if (!isset($_GET['id'])) {
    die("Invalid product ID.");
}

$id = intval($_GET['id']);
$error = $success = "";

// Fetch product details
$query = "SELECT * FROM coconut_products WHERE id = $id";
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);

if (!$product) {
    die("Coconut product not found.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);
    $imagePath = $product['image']; // Keep old image by default

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = __DIR__ . "/../uploads/coconutProduct/";
        $newImage = time() . "_" . basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $newImage;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $imagePath = "uploads/coconutProduct/" . $newImage;
        } else {
            $error = "Failed to upload new image.";
        }
    }

    // Update DB
    if (!$error) {
        $sql = "UPDATE coconut_products SET name='$name', description='$desc', image='$imagePath' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
            $success = "Coconut product updated successfully.";
            header("Location: coconut_manager.php");
            exit();
        } else {
            $error = "Database update failed.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Coconut Product</title>
    <link rel="icon" href="assets/headLogos/h1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f3f3f3;
            font-family: Arial, sans-serif;
            padding-top: 50px;
        }
        .container {
            max-width: 600px;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px #aaa;
        }
        img.preview {
            width: 120px;
            margin-bottom: 15px;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<div class="container">
    <h3 class="mb-4">Edit Coconut Product</h3>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Coconut Name</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4" class="form-control" required><?php echo htmlspecialchars($product['description']); ?></textarea>
        </div>
        <div class="form-group">
            <label>Current Image</label><br>
            <?php if (!empty($product['image'])): ?>
                <img src="../<?php echo $product['image']; ?>" class="preview" alt="Current Image">
            <?php else: ?>
                <p>No image uploaded.</p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Upload New Image (optional)</label>
            <input type="file" name="image" class="form-control-file" accept="image/*">
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Update Product</button>
            <a href="Coconut_manager.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>
