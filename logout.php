<?php
// Start or resume the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect the user to the login page or any other page you want
    header("Location: login.php");
    exit();
} else {
    // If the user is not logged in, you can handle the appropriate action
    // For example, redirect to the login page with an error message
    header("Location: login.php?error=not_logged_in");
    exit();
}
?>
