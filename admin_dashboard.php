<?php
session_start();

// // Check if the user is logged in as an admin, otherwise redirect to the login page
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: Login.php');
    exit();
}

// Admin dashboard code goes here
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - MUST Researchers</title>
</head>
<body>
  <?php include "menuAdmin.php" ?>


    <div class="content">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <p>This is your admin dashboard. Here, you can manage various aspects of the MUST Researchers system.</p>
        <!-- Add your admin-specific content here -->
    </div>
</body>
</html>
