<?php
session_start();
include 'db.php';

// Fetch all messages
$sql = "SELECT * FROM messages ORDER BY submitted_at DESC";
$result = mysqli_query($conn, $sql);

$messageQuery = "SELECT COUNT(*) AS total FROM messages";
$messageResult = mysqli_query($conn, $messageQuery);
$messageData = mysqli_fetch_assoc($messageResult);
$totalMessages = $messageData['total'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin - View Messages</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/headLogos/h1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: url('images/bg.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            background-color: rgba(27, 38, 59, 0.95);
            color: white;
            padding: 20px;
            min-height: 100vh;
        }

        .sidebar h4 {
            color: #fca311;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar ul li {
            padding: 12px;
            background-color: #2d3e50;
            border-radius: 5px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .sidebar ul li:hover {
            background-color: #3d4f64;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }

        .content-area {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .top-navbar {
            width: 100%;
            background-color: rgba(255, 255, 255, 0.95);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .top-navbar-left h2 {
            display: flex;
            align-items: center;
            color: #1d3557;
            margin: 0;
        }

        .top-navbar-left h2 i {
            font-size: 30px;
            margin-right: 10px;
        }

        .top-navbar-right {
            display: flex;
            align-items: center;
        }

        .top-navbar-right span {
            margin-right: 20px;
            font-weight: bold;
            color: #1d3557;
        }

        .top-navbar-right button {
            background-color: #e63946;
            border: none;
            padding: 8px 16px;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .main-content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
            background-color: rgba(0, 0, 0, 0.1);
        }

        .message-table {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table th,
        table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>CEYMOS LANKA</h4>
        <ul>
            <li><a href="admin_dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="tea_manager.php"><i class="fas fa-mug-hot"></i> Tea Product Manager</a></li>
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
        </ul>
    </div>


    <!-- Content Area -->
    <div class="content-area">

        <!-- Top Navbar -->
        <div class="top-navbar">
            <div class="top-navbar-left">
                <h2><i class="fas fa-envelope"></i> Messages</h2>
            </div>

            <div class="top-navbar-right">
                <span id="current-date"></span>
                <span id="current-time"></span>
                <button onclick="logout()">Logout</button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="message-table">
                <h3 class="text-center mb-4">Submitted Messages</h3>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Submitted At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['subject']); ?></td>
                                <td><?php echo htmlspecialchars($row['message']); ?></td>
                                <td><?php echo $row['submitted_at']; ?></td>
                                <td>
                                    <a href="delete_message.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this message?');">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script>
        function updateDateTime() {
            const now = new Date();
            document.getElementById('current-date').textContent = "Date: " + now.toLocaleDateString();
            document.getElementById('current-time').textContent = "Time: " + now.toLocaleTimeString();
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();

        function logout() {
            alert("Logging out...");
            window.location.href = "admin_login.php";
        }
    </script>

</body>

</html>