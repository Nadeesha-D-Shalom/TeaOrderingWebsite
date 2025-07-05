<?php
include 'db.php'; // Connect to your database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert data into messages table
    $sql = "INSERT INTO messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($conn, $sql)) {
        // Success message and redirect
        echo "<script>alert('Message sent successfully!'); window.location.href='Home.html';</script>";
    } else {
        // Error message and redirect
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='Home.html';</script>";
    }

    mysqli_close($conn);
} else {
    // If form is not submitted via POST
    header("Location: Home.html");
    exit();
}
?>

