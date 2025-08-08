<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Validate and get ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid request.");
}

$id = intval($_GET['id']);

// Fetch the product to delete the image
$query = "SELECT image FROM coconut_products WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $imagePath = "../" . $row['image'];
    if (file_exists($imagePath) && !empty($row['image'])) {
        unlink($imagePath); // Delete image file
    }

    // Delete from DB
    $deleteSql = "DELETE FROM coconut_products WHERE id = $id";
    if (mysqli_query($conn, $deleteSql)) {
        $_SESSION['success_msg'] = "Coconut product deleted successfully!";
    } else {
        $_SESSION['success_msg'] = "Failed to delete the Coconut product.";
    }
} else {
    $_SESSION['success_msg'] = "Product not found.";
}

// Redirect back to manager
header("Location: coconut_Manager.php");
exit();
?>
