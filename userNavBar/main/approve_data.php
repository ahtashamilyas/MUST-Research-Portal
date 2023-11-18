<?php
 session_start();
 include "C:/xampp/htdocs/RePoS/AdminUser/menuAdmin.php";
// Approve or disapprove action
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "repos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];

if (isset($_POST['approve'])) {
    $sql_select = "SELECT * FROM pending_data WHERE ID = $id";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $faculty = $row['faculty'];
        $department = $row['department'];
        $title = $row['title'];
        $author = $row['author'];
        $publication_date = $row['publication_date'];
        $paper_type = $row['paper_type'];
        $volume = $row['volume'];
        $publisher = $row['publisher'];
        $organization = $row['organization'];
        $publication_year = $row['publication_year'];
        $paper_link = $row['paper_link'];
        
        // Insert into main table
        $sql_insert = "INSERT INTO repos_data(faculty, department, title, author, publication_date, paper_type, volume, publisher, organization, publication_year, paper_link) VALUES ('$faculty', '$department', '$title', '$author', '$publication_date', '$paper_type', '$volume', '$publisher', '$organization', '$publication_year', '$paper_link')";
        if ($conn->query($sql_insert) === true) {
            // Delete from pending table
            $sql_delete = "DELETE FROM pending_data WHERE id = $id";
            $conn->query($sql_delete);
            echo "Data approved and stored.";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    } else {
        echo "Invalid ID.";
    }
} elseif (isset($_POST['disapprove'])) {
    $sql_delete = "DELETE FROM pending_data WHERE id = $id";
    if ($conn->query($sql_delete) === true) {
        echo "Data disapproved.";
    } else {
        echo "Error: " . $sql_delete . "<br>" . $conn->error;
    }
}

$conn->close();
?>
