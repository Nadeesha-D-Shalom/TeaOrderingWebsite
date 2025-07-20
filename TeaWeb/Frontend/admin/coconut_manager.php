<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

$adminID = $_SESSION['admin_id'];

// Fetch admin
$sql = "SELECT full_name FROM admin WHERE id = $adminID";
$result = mysqli_query($conn, $sql);
$admin = mysqli_fetch_assoc($result);

// Message count
$messageQuery = "SELECT COUNT(*) AS total FROM messages";
$messageResult = mysqli_query($conn, $messageQuery);
$messageData = mysqli_fetch_assoc($messageResult);
$totalMessages = $messageData['total'];

// Handle Add Coconut Product
$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);

    $savePath = "";
    if (!empty($_FILES["image"]["name"])) {
        $uploadDir = __DIR__ . "/../uploads/coconutProduct/";
        $imageName = time() . "_" . basename($_FILES["image"]["name"]);
        $targetFile = $uploadDir . $imageName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $savePath = "uploads/CoconutProduct/" . $imageName;
        } else {
            $error = "Failed to upload image.";
        }
    }

    if (!$error) {
        $sql = "INSERT INTO coconut_products (name, description, image) VALUES ('$name', '$desc', '$savePath')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success_msg'] = "Coconut product added successfully!";
            header("Location: coconut_manager.php");
            exit();
        } else {
            $error = "Database error while adding product.";
        }
    }
}

// Fetch all Coconut products
$products = mysqli_query($conn, "SELECT * FROM coconut_products ORDER BY created_at DESC");

// Show session message
if (isset($_SESSION['success_msg'])) {
    $success = $_SESSION['success_msg'];
    unset($_SESSION['success_msg']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Coconut Product Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/headLogos/h1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/adminStyle.css">
    <style>
        body {
            display: flex;
            font-family: Arial, sans-serif;
            background: url('images/bg.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
        }

        .top-navbar {
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #f8f9fa;
            align-items: center;
        }

        .add-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
            justify-content: flex-end;
        }

        .popup-form {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 8px;
            max-width: 600px;
            margin: 0 auto 40px;
            display: none;
        }

        table img {
            width: 80px;
            height: auto;
        }

        .fade-out {
            transition: opacity 1s ease-out;
        }

        .fade-out.hide {
            opacity: 0;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4>CEYMOS LANKA</h4>
        <ul>
            <li><a href="admin_dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="Coconut_manager.php" class="active"><i class="fas fa-mug-hot"></i> Coconut Product Manager</a></li>
            <li><a href="coconut_manager.php"><i class="fas fa-seedling"></i> Coconut Product Manager</a></li>
            <li><a href="spices_manager.php"><i class="fas fa-pepper-hot"></i> Spices Product Manager</a></li>
            <li><a href="rice_manager.php"><i class="fas fa-utensils"></i> Rice Product Manager</a></li>
            <li><a href="admin_manager.php"><i class="fas fa-user-shield"></i> Admin Manager</a></li>
            <li>
                <a href="messages_view.php">
                    <i class="fas fa-envelope"></i> Messages
                    <span class="badge badge-danger ml-2"><?php echo $totalMessages; ?></span>
                </a>
            </li>
            <li><a href="admin_login.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content-area">
        <div class="top-navbar">
            <div><i class="fas fa-user-circle"></i> <?php echo $admin['full_name']; ?></div>
            <div>
                Date: <?php echo date('Y-m-d'); ?> |
                Time: <span id="current-time"></span>
                <button onclick="logout()" class="btn btn-danger btn-sm ml-3">Logout</button>
            </div>
        </div>

        <div class="container mt-4">
            <!-- Top Buttons -->
            <div class="add-buttons">
                <button class="btn btn-success" onclick="toggleForm()">Add New</button>
            </div>

            <!-- Success/Error Alerts -->
            <?php if ($success): ?>
                <div class="alert alert-success fade-out" id="successAlert">
                    <i class="fas fa-check-circle"></i> <?php echo $success; ?>
                </div>
            <?php endif; ?>
            <?php if ($error): ?>
                <div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> <?php echo $error; ?></div>
            <?php endif; ?>

            <!-- Add Product Form -->
            <div class="popup-form" id="addForm">
                <form method="POST" enctype="multipart/form-data">
                    <h4 class="text-center mb-4">Add New Coconut Product</h4>
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control-file" accept="image/*">
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-success">Add Product</button>
                        <button type="button" class="btn btn-secondary" onclick="toggleForm()">Cancel</button>
                    </div>
                </form>
            </div>

            <!-- Product Table -->
            <div class="card">
                <div class="card-header bg-dark text-white"><strong>All Coconut Products</strong></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Coconut Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            while ($row = mysqli_fetch_assoc($products)): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td><?php echo nl2br(htmlspecialchars($row['description'])); ?></td>
                                    <td>
                                        <?php if (!empty($row['image'])): ?>
                                            <img src="../<?php echo $row['image']; ?>" alt="Coconut" style="width: 80px; height: auto;">
                                        <?php else: ?>
                                            <span class="text-muted">No image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    <td>
                                        <a href="edit_coconut.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="delete_coconut.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Coconut product?');">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <script>
                function toggleForm() {
                    const form = document.getElementById("addForm");
                    form.style.display = form.style.display === "none" || form.style.display === "" ? "block" : "none";
                }

                function logout() {
                    window.location.href = "admin_login.php";
                }

                function updateTime() {
                    document.getElementById('current-time').textContent = new Date().toLocaleTimeString();
                }
                setInterval(updateTime, 1000);
                updateTime();

                setTimeout(() => {
                    const alert = document.getElementById("successAlert");
                    if (alert) {
                        alert.classList.add("hide");
                        setTimeout(() => alert.remove(), 1000);
                    }
                }, 5000);
            </script>

</body>

</html>