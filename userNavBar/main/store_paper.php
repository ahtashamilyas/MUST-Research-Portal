<style>
    body {
      font-family: Arial, sans-serif;
    }

    h1 {
      text-align: center;
      color: #333;
      margin-top: 20px;
    }

    form {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f7f7f7;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    select,
    input[type="text"],
    input[type="date"],
    input[type="number"],
    input[type="url"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      margin-bottom: 10px;
      font-size: 16px;
    }

    select {
      height: 40px;
    }

    button {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 3px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
<?php session_start(); include "C:/xampp/htdocs/RePoS/AdminUser/menuUser.php"; ?>
<body>
    <h1>Research Paper Submission Form</h1>
<form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
    <label for="faculty">Select Faculty:</label>
    <select name="faculty" id="faculty">
      <option>Engineering</option>
      <option>Business</option>
      <option>Natural & Applied Sciences</option>
      <option>Social Sciences & Humanities</option>
      <option>Health & Medical Sciences</option>
      <option>Social Sciences & Humanities</option>
    </select>
    <br>
    <label for="department">Select Department:</label>
    <select name="department" id="department">
      <option>Computer Science & Information Technology</option>
      <option>Mathematics</option>
      <option>Software Engineering</option>
      <option>Electrical Engineering</option>
      <option>Mechanical Engineering</option>
      <option>Computer Systems Engineering</option>
      <option>Allied Health Sciences</option>
      <option>MUST Business</option>
    </select>
    <br>

    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required>
    <br>

    <label for="author">Author Name:</label>
    <input type="text" name="author" id="author" required>
    <br>

    <label for="publication-date">Publication Date:</label>
    <input type="date" name="publication-date" id="publication-date" required>
    <br>

    <label for="paper-type">Paper Type:</label>
    <select name="paper-type" id="paper-type">
      <option>Journal</option>
      <option>Conference</option>
      <option>Artical</option>
    </select>
    <br>

    <label for="volume">Select Volume:</label>
    <select name="volume" id="volume">
      <option>One</option>
      <option>Two</option>
      <option>Three</option>
      <option>Four</option>
      <option>Five</option>
      <option>Six</option>
      <option>Seven</option>
      <option>Eight</option>
      <option>Nine</option>
      <option>ten</option>
      <option>Eleven</option>
    </select>
    <br>
    <label for="publisher">Publisher Name:</label>
    <input type="text" name="publisher" id="publisher" required>
    <br>
    <label for="organization">Select Organization:</label>
    <select name="organization" id="organization">
      <option>IEEE</option>
      <option>PakJET</option>
      <option>ACM</option>
      <option>Elsevier</option>
      <option>Electronics</option>
      <option>MDPI</option>
      <option>SAGE</option>
      <option>SpringerLink</option>
      <option>Sinteza</option>
      <option>arxiv</option>
      <option>hindawi</option>
    </select>
    <br>
    <label for="publication-year">Publication Year:</label>
    <input type="number" name="publication-year" id="publication-year" required>
    <br>
    <label for="paper-link">Research Paper Link:</label>
    <input type="url" name="paper-link" id="paper-link" required>
    <br>
    <button type="submit">Submit</button>
  </form>
  </body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "repos";

// Create a new MySQLi instance (replace the connection details with your own)
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize an error variable to keep track of any errors
$error = false;

$fields = array(
  'faculty', 'department', 'title', 'author', 'publication-date', 'paper-type',
  'volume', 'publisher', 'organization', 'publication-year', 'paper-link'
);
foreach ($fields as $field) {
  if (empty($_POST[$field])) {
      echo "Please provide a value for " . ucfirst(str_replace('-', ' ', $field)) . ".<br>";
      $error = true;
  }
}
  if (!$error) {
// Prepare the SQL statement for insertion
$stmt = $conn->prepare("INSERT INTO pending_data (faculty, department, title, author, publication_date, paper_type, volume, publisher, organization, publication_year, paper_link) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind the form data to the statement parameters
$stmt->bind_param("sssssssssis", $_POST['faculty'], $_POST['department'], $_POST['title'], $_POST['author'], $_POST['publication-date'], $_POST['paper-type'], $_POST['volume'], $_POST['publisher'], $_POST['organization'], $_POST['publication-year'], $_POST['paper-link']);

// Execute the statement to insert the data into the database
$stmt->execute();
if($stmt==true){
  echo "<script>alert('Your Data is Submitted Successfully!. Please wait for Admin Aprovel.');</script>";
}else{
  echo "Error: " . $stmt . "<br>" . $conn->error;
}
// Get the last inserted ID
$paper_id = $stmt->insert_id;

// Close the statement
$stmt->close();
  }
// Close the database connection
$conn->close();}
?>