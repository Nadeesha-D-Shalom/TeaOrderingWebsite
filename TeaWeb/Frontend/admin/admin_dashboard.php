<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - TeaWeb</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: Arial, sans-serif;
      display: flex;
      height: 100vh;
      background-color: #f5f5f5;
    }
    .sidebar {
      width: 250px;
      background-color: #1b263b;
      color: #fff;
      padding: 20px;
    }
    .sidebar h2 {
      margin-bottom: 20px;
      color: #fca311;
    }
    .sidebar ul {
      list-style: none;
    }
    .sidebar ul li {
      padding: 12px;
      margin: 10px 0;
      background-color: #2d3e50;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s;
    }
    .sidebar ul li:hover {
      background-color: #3d4f64;
    }

    .main-content {
      flex-grow: 1;
      padding: 20px;
      position: relative;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }
    .header h1 {
      color: #1d3557;
    }
    .header .right {
      text-align: right;
    }
    .header .right button {
      padding: 8px 15px;
      background-color: #e63946;
      border: none;
      color: white;
      border-radius: 4px;
      cursor: pointer;
    }
    .dashboard-widgets {
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    .dashboard-widgets span {
      display: block;
      margin-bottom: 10px;
      font-size: 16px;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
      <li>Tea Product Manager</li>
      <li>Coconut Product Manager</li>
      <li>Spices Product Manager</li>
      <li>Rice Product Manager</li>
      <li>Admin Manager</li>
    </ul>
  </div>

  <div class="main-content">
    <div class="header">
      <h1>Dashboard</h1>
      <div class="right">
        <span id="current-date"></span><br>
        <span id="current-time"></span><br>
        <button onclick="logout()">Logout</button>
      </div>
    </div>

    <div class="dashboard-widgets">
      <span><strong>Link Clicks:</strong> [Demo: 54 clicks]</span>
      <span><strong>Page Views:</strong> [Demo: 132 views]</span>
    </div>
  </div>

  <script>
    function updateDateTime() {
      const now = new Date();
      document.getElementById("current-date").textContent = "Date: " + now.toLocaleDateString();
      document.getElementById("current-time").textContent = "Time: " + now.toLocaleTimeString();
    }
    setInterval(updateDateTime, 1000);
    updateDateTime();

    function logout() {
      alert("Logging out...");
      window.location.href = "../index.html"; // update to your logout path if needed
    }
  </script>

</body>
</html>
