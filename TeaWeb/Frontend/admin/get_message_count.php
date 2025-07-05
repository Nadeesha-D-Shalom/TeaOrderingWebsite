<?php
include 'db.php';

$messageQuery = "SELECT COUNT(*) AS total FROM messages";
$messageResult = mysqli_query($conn, $messageQuery);
$messageData = mysqli_fetch_assoc($messageResult);

echo $messageData['total'];
?>
