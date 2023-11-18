<?php
 session_start();
include "C:/xampp/htdocs/RePoS/AdminUser/menuAdmin.php";
// Admin view to approve or disapprove submissions
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "repos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `name`, `father_name`, `gender`, `cnic`, `contact`, `address`, `city`, `district`, `qualification`, `religion`, `role`, `username`, `password`, `email`, `image_name`, `image_data`, `ID` FROM pending_approval";
$result = $conn->query($sql);

$sql1 = "SELECT * FROM pending_data";
$result1 = $conn->query($sql1);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        echo "Name: " . $row["name"] . " - Father Name: " . $row["father_name"]. " - Gender " . $row["gender"]. " - CNIC: " . $row["cnic"]. " - Contact No: " . $row["contact"]. " - Address: " . $row["address"]. " - City: " . $row["city"]. " - District: " . $row["district"]. " - Qualification: " . $row["qualification"]. " - Religion: " . $row["religion"]. " - Role: " . $row["role"]. " - Username: " . $row["username"]. " - Password: " . $row["password"]. " - Email: " . $row["email"]. " - Image Name: " . $row["image_name"] /*" - Image Data: " . $row["image_data"]*/;
        echo '<form action="approve.php" method="post">';
        echo '<input type="hidden" name="id" value="' . $row["ID"] . '">';
        echo '<button type="submit" name="approve">Approve</button>';
        echo '<button type="submit" name="disapprove">Disapprove</button>';
        echo '</form>';
        echo '<hr>';
    }
} else {
    echo "<h1>No pending submissions From Register User.</h1>";
    echo "<hr>";
}

if ($result1->num_rows > 0) {
    while ($row1 = $result1->fetch_assoc()) {

        echo "Faculty: " . $row1["faculty"] . " - Department: " . $row1["department"]. " - title " . $row1["title"]. " - author: " . $row1["author"]. " -  publication_date: " . $row1["publication_date"]. " - paper_type: " . $row1["paper_type"]. " - volume: " . $row1["volume"]. " - publisher: " . $row1["publisher"]. " - organization: " . $row1["organization"]. " - publication_year: " . $row1["publication_year"]. " - paper_link: " . $row1["paper_link"] /*" - Image Data: " . $row["image_data"]*/;
        echo '<form action="/userNavBar/main/approve_data.php" method="post">';
        echo '<input type="hidden" name="id" value="' . $row1["id"] . '">';
        echo '<button type="submit" name="approve">Approve</button>';
        echo '<button type="submit" name="disapprove">Disapprove</button>';
        echo '</form>';
        echo '<hr>';
    }
} else {
    echo "<h1>No pending submissions From Research Data.</h1>";
}

$conn->close();
?>
