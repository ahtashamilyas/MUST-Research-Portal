<!-- ?php
session_start();

// Check if the user is logged in as a user, otherwise redirect to the login page
// if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
//     header('Location: login.php');
//     exit();
// }

// User dashboard code goes here
?> -->
<!-- 
<!DOCTYPE html>
<html>
<head>
    <title>update Profile</title>
    <style>
        /* CSS styles for the user dashboard */
        /* ... */

        .content {
            padding: 20px;
            margin-left: 25%;
        }
    </style>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Function to load and display data for a specific navigation item
        function loadNavigationData(navItem) {
            $.ajax({
                url: 'fetch_data.php',
                type: 'POST',
                data: { navItem: navItem },
                success: function(response) {
                    $('#dashboard-content').html(response);
                },
                error: function() {
                    alert('An error occurred while fetching the data.');
                }
            });
        }

        // Event handler for navigation item clicks
        $(document).ready(function() {
            $('.navigation li a').on('click', function(e) {
                e.preventDefault();
                var navItem = $(this).data('navitem');
                loadNavigationData(navItem);
            });
        });
    </script> 
    <link rel="stylesheet" type="" href="/css/style1.css">
</head>
<body> -->
    <?php session_start(); include "../menuUser.php";
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "repos";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get updated user information from the form
    $newUsername = $_POST["newUsername"];
    $newEmail = $_POST["newEmail"];
    $newPassword = $_POST["newPassword"];
    // $userId = $_SESSION["user_id"]; // Assuming you have stored user ID in a session after login

    // Update user information in the database
    $sql = "UPDATE registration SET username='$newUsername', email='$newEmail', password='$newPassword'";

    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update-Profile</title>
    <style>
    h2 {
      text-align: center;
      color: #333;
      margin-top: 20px;
    }

    form {
      max-width: 600px;
      margin: 0 auto;
      background-color: #f7f7f7;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    </style>
</head>
<body>
    <h2>Update Profile</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="newUsername">New Username:</label>
        <input type="text" name="newUsername" required><br>

        <label for="newEmail">New Email:</label>
        <input type="email" name="newEmail" required><br>

        <label for="newPassword">New Password:</label>
        <input type="password" name="newPassword" required><br><br>
        <button style= "display: inline-block;
  background-color: lightblue;
  padding: 0.5rem 0.75rem;
  border-radius: .5rem;
  cursor: pointer;" >Update Profile</button>
    </form>
</body>
</html>