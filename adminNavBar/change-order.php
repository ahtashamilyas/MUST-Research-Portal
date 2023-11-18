<style>
      body {
      font-family: Arial, sans-serif;
    }
    h1 {
      text-align: center;
      color: #333;
      margin-top: 20px;
    }
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
.column-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* Adjust the number of columns */
    gap: 20px; /* Adjust the gap between columns */
}

.column-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 20px; /* Adjust the margin between rows */
}

.column {
    flex-basis: calc(33.33% - 10px); /* Adjust the width of each column */
}
.column-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* Adjust the number of columns */
    gap: 20px; /* Adjust the gap between columns */
}

.column-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 20px; /* Adjust the margin between rows */
}

.column {
    flex-basis: calc(33.33% - 10px); /* Adjust the width of each column */
}
</style>
<script>
function printTableContent() {
  // Hide all elements except the table
  var elementsToHide = document.querySelectorAll('body > *:not(table, h3, p, img)');
  for (var i = 0; i < elementsToHide.length; i++) {
    elementsToHide[i].style.display = 'none';
  }

  // Print the table
  window.print();

  // Show all elements again after printing
  for (var i = 0; i < elementsToHide.length; i++) {
    elementsToHide[i].style.display = '';
  }
}
</script>
<?php
session_start();
include "../menuAdmin.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "repos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get column names and data from Student table
$sql_student = "SELECT * FROM repos_data";
$result_student = $conn->query($sql_student);

// Store repos_data column order in session variable
if (!isset($_SESSION['data_column_order'])) {
    $_SESSION['data_column_order'] = array();
    foreach ($result_student->fetch_fields() as $field) {
        array_push($_SESSION['data_column_order'], $field->name);
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_column_order = array();
    for ($i = 1; $i <= count($_SESSION['data_column_order']); $i++) {
        $new_column_order[] = $_POST['column' . $i];
    }

    if (count($new_column_order) === count(array_unique($new_column_order))) {
        $_SESSION['data_column_order'] = $new_column_order;
    } else {
        echo "<p style='color:red;'>Error: Column names must be different.</p>";
    }
}
function performAction() {
    echo "Button clicked! Action performed.";
}

// Check if the button is clicked
if (isset($_POST['action_button'])) {
    performAction();
}
// Display Student table with user-defined column order
echo "<h3 style=\"text-align: Center\";>HEC-Report Researchers proformae<br>1.PROGRES REPORT PROFORMA: 1 OF 8</h3>";
echo "<p style=\"text-align: Center\";>HIGHER ECUDATION COMMISSION<br>INDIGENOUS 5000 RESEARCH FELLOWSHIP, H-8/1, ISLAMMABAD(PAKISTAN),<br>PHONE:(051)90808033 FAX:(051)90808035, E-MAIL: snaurin@hec.gov.pk</p><img src=\"/images/hec.png\" alt=\"hec\", style=\"position: relative; top:-10%; right:-15%; height: 80px;\">Period  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  FROM:__________       &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   TO:__________</p>";
// echo "<p style=\"text-align: Center\";>Period     FROM:__________             TO:__________</p>";
echo "<input type=\"button\", style=\" display: inline-block;
background-color: lightblue;
position: relative;  left: 73%; top: -20%;
padding: 0.5rem 0.75rem;
border-radius: .5rem;
cursor: pointer;\", onClick=\"printTableContent()\", value=\"Print Report\"/>";
echo "<table>";
echo "<tr>";
foreach ($_SESSION['data_column_order'] as $column_name) {
    echo "<th>".$column_name."</th>";
}
echo "</tr>";
while ($row = $result_student->fetch_assoc()) {
    echo "<tr>";
    foreach ($_SESSION['data_column_order'] as $column_name) {
        echo "<td><button>".$row[$column_name]."</button></td>";
    }
    echo "</tr>";
}
echo "</table>";

//-------------------------------------
// Display form to change column order
echo "<h2>Change Column Order</h2>";
echo "<form method='post'>";
echo "<div class='column-container'>";

$columns_per_row = 3; // You can adjust this number as needed

foreach ($_SESSION['data_column_order'] as $index => $column_name) {
    if ($index % $columns_per_row === 0) {
        echo "<div class='column-row'>";
    }

    echo "<div class='column'>";
    echo "Column " . ($index + 1) . ": <select name='column" . ($index + 1) . "'>";
    foreach ($_SESSION['data_column_order'] as $session_column) {
        echo "<option value='" . $session_column . "' " . ($session_column == $column_name ? "selected" : "") . ">" . $session_column . "</option>";
    }
    echo "</select>";
    echo "</div>";

    if (($index + 1) % $columns_per_row === 0 || $index === count($_SESSION['data_column_order']) - 1) {
        echo "</div>";
    }
}

echo "</div>";
echo "<input type='submit' style=\" display: inline-block;
background-color: lightblue;
padding: 0.5rem 0.75rem;
border-radius: .5rem;
cursor: pointer;\", value='Change'>";
echo "</form>";



?>
