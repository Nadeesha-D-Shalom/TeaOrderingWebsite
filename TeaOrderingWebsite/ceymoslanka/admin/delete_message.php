    <?php
session_start();
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the message
    $sql = "DELETE FROM messages WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Message deleted successfully'); window.location.href='messages_view.php';</script>";
    } else {
        echo "<script>alert('Error deleting message'); window.location.href='messages_view.php';</script>";
    }

    mysqli_close($conn);
} else {
    // If no ID provided, redirect back
    header("Location: messages_view.php");
    exit();
}
?>
