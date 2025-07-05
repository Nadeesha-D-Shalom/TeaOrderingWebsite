<?php
session_start();
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM admin WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Admin deleted successfully'); window.location.href='admin_manager.php';</script>";
    } else {
        echo "<script>alert('Error deleting admin'); window.location.href='admin_manager.php';</script>";
    }
} else {
    header('Location: admin_manager.php');
    exit();
}
?>
