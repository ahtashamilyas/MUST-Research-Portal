<?php
session_start();

// Check if the user is logged in as a user, otherwise redirect to the login page
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit();
}

// User dashboard code goes here
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard - MUST Researchers</title>
</head>
<body>
    <?php include "menuUser.php" ?>
    
 <div class="content">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <p>If you want to edit your profile Please click on below Button.</p>
        <button style= "display: inline-block;
  background-color: lightblue;
  padding: 0.5rem 0.75rem;
  border-radius: .5rem;
  cursor: pointer;" onclick="location.href='/userNavBar/fetch_data.php';">Edit profile<button>
        <!-- Add your user-specific content here -->
    </div>
</body>
</html>
