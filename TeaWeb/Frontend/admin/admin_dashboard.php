<?php
session_start();
include 'db.php';

// ✅ Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

$adminID = $_SESSION['admin_id']; // ✅ Get the logged-in admin's ID

// Fetch admin details
$sql = "SELECT username, email, full_name, dob, address, contact_number, employee_id FROM admin WHERE id = $adminID";
$result = mysqli_query($conn, $sql);
$admin = mysqli_fetch_assoc($result);

// Fetch total messages
$messageQuery = "SELECT COUNT(*) AS total FROM messages";
$messageResult = mysqli_query($conn, $messageQuery);
$messageData = mysqli_fetch_assoc($messageResult);
$totalMessages = $messageData['total'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CEYMOS LANKA Admin Dashboard</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/headLogos/h1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .top-navbar-left {
            display: flex;
            align-items: center;
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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
            overflow-y: auto;
            background-color: rgba(0, 0, 0, 0.1);
        }

        .profile-card {
            background-color: rgba(255, 255, 255, 0.84);
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            max-width: 500px;
            width: 100%;
        }

        .profile-card h3 {
            color: #1d3557;
            margin-bottom: 20px;
            text-align: center;
        }

        .profile-card p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .profile-card p span {
            font-weight: bold;
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
                    <span id="messageCount" class="badge badge-danger ml-2"><?php echo $totalMessages; ?></span>
                </a>
            </li>
            <li><a href="admin_login.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Content Area -->
    <div class="content-area">

        <!-- Top Navbar -->
        <div class="top-navbar">
            <div class="top-navbar-left">
                <h2><i class="fas fa-user-circle"></i> <?php echo $admin['full_name']; ?></h2>
            </div>

            <div class="top-navbar-right">
                <span id="current-date"></span>
                <span id="current-time"></span>
                <button onclick="logout()">Logout</button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="profile-card">
                <h3>Admin Profile</h3>
                <p><span>Full Name:</span> <?php echo $admin['full_name']; ?></p>
                <p><span>Email:</span> <?php echo $admin['email']; ?></p>
                <p><span>Date of Birth:</span> <?php echo $admin['dob']; ?></p>
                <p><span>Address:</span> <?php echo $admin['address']; ?></p>
                <p><span>Contact Number:</span> <?php echo $admin['contact_number']; ?></p>
                <p><span>Employee ID:</span> <?php echo $admin['employee_id']; ?></p>
                <p><span>Age:</span> <?php echo date('Y') - date('Y', strtotime($admin['dob'])); ?> years</p>
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
            window.location.href = "admin_login.php";
        }

        // Live message count updater
        setInterval(function () {
            fetch('get_message_count.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('messageCount').textContent = data;
                });
        }, 3000);
    </script>

</body>

</html>
