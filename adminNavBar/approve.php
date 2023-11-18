<?php
session_start();
include "C:/xampp/htdocs/RePoS/AdminUser/menuAdmin.php";

$servername = "localhost";
$uname = "root";
$pwd = "";
$dbname = "repos";

$conn = new mysqli($servername, $uname, $pwd, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$stmt_select = $conn->prepare("SELECT * FROM pending_approval WHERE ID = ?");
$stmt_select->bind_param("i", $id);
$stmt_select->execute();

$result = $stmt_select->get_result();
if (isset($_POST['approve'])) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Use prepared statements for insertion
        $stmt_insert = $conn->prepare("INSERT INTO registration(name, father_name, gender, cnic, contact, address, city, district, qualification, religion, role, username, password, email, image_name, image_data) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt_insert->bind_param("ssssssssssssssss", $name, $father_name, $gender, $cnic, $contact, $address, $city, $district, $qualification, $religion, $role, $username, $password, $email, $image_name, $image_data);

        $id = $row['ID'];
        $name = $row['name'];
        $father_name = $row['father_name'];
        $gender = $row['gender'];
        $cnic = $row['cnic'];
        $contact = $row['contact'];
        $address = $row['address'];
        $city = $row['city'];
        $district = $row['district'];
        $qualification = $row['qualification'];
        $religion = $row['religion'];
        $role = $row['role'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password'];
        $image_name = $row['image_name'];
        $image_data = $row['image_data'];

        if ($stmt_insert->execute()) {
            // Delete from pending table
            $stmt_delete = $conn->prepare("DELETE FROM pending_approval WHERE id = ?");
            $stmt_delete->bind_param("i", $id);
            $stmt_delete->execute();
            echo "Data approved and stored.";
        } else {
            echo "Error: " . $stmt_insert->error;
        }
    } else {
        echo "Invalid ID.";
    }
} elseif (isset($_POST['disapprove'])) {
    // Prepare and execute a DELETE statement
    $stmt_delete = $conn->prepare("DELETE FROM pending_approval WHERE id = ?");
    $stmt_delete->bind_param("i", $id);

    if ($stmt_delete->execute()) {
        echo "Data disapproved.";
    } else {
        echo "Error: " . $stmt_delete->error;
    }
}

$stmt_select->close();
$stmt_insert->close();
$stmt_delete->close();
$conn->close();
?>
