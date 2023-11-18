<?php
session_start();

// // Check if the user is logged in as an admin, otherwise redirect to the login page
// if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
//     header('Location: login.php');
//     exit();
// }

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and process the form data

    // Connect to the database
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'repos';

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Retrieve the user's city from the form
    $userId = $_POST['user_id'];
    $newCity = $_POST['new_city'];

    // Update the user's city in the database
    $sql = "UPDATE registration SET city = '$newCity' WHERE id = '$userId'";

    if ($conn->query($sql) === TRUE) {
        $message = 'City updated successfully.';
    } else {
        $message = 'Error updating city: ' . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage City - Admin Panel - MUST Researchers</title>
    <style>
table {
  /* max-width: 500px; */
  position: relative;
  width: 50%;
   margin: 0 auto;
   padding-left : -20px;
  background-color: #f7f7f7;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 2.5px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
    </style>
</head>
<body>
    <?php include "../menuAdmin.php" ?>
    <!-- Header -->
    <!-- <header>
        <div class="header-title">
            <h1>MUST Researchers</h1>
        </div>
    </header> -->

    <!-- Navigation Bar -->
    <!-- <div class="navigation">
        <ul> -->
            <!-- ... Other navigation items ... -->
            <!-- <li><a href="manage_city.php"><img src="manage_city_icon.png" alt="Manage City">Manage City</a></li> -->
            <!-- ... Other navigation items ... -->
        <!-- </ul>
    </div> -->

    <!-- Content Section -->
    <div class="content">
        <h2>Manage City</h2>

        <?php
        // Display the success/error message if available
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }
        ?>

        <form method="POST" action="manage_city.php">
            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" name="user_id" required>

            <label for="new_city">New City:</label>
            <input type="text" id="new_city" name="new_city" required>

            <input type="submit" value="Update City">
        </form>
    </div>
    <?php
    $servername="localhost";
    $user="root";
    $password="";
    $dbname="repos";
    
    $conn1= new mysqli($servername, $user, $password, $dbname);
    if($conn1->connect_error){
        die("Connection Failed: " .$conn1->connect_error);
    }
    $sql1 = " SELECT ID, name, city FROM registration";
    $result1 = $conn1->query($sql1);
    if($result1->num_rows > 0){
        echo "<h1>Show All City!</h1>";
        echo "<table>
        <tr>
            <th>ID:</th>
            <th>Name:</th>
            <th>City</th>"; 
            while($row1 = $result1->fetch_assoc()){
                echo "<tr>
                <td>".$row1['ID']."</td>
                <td>".$row1['name']."</td>
                <td>".$row1['city']."</td>
                </tr>";
            }
        }else{
           echo "0 Results";
       }
    $conn1->close();
    
    ?>
</body>
</html>
