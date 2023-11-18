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
button{
  display: inline-block;
  background-color: lightblue;
  color: blue
  padding: 1rem 1.75rem;
  border-radius: .5rem;
  cursor: pointer;
}
.button1 {  position: relative;  left: 60%; top: -50;} /* Green */
.button2 {  position: relative;  left: 59%; top: -50;} /* Blue */
</style>
<script>
function printTableContent() {
  // Hide all elements except the table
  var elementsToHide = document.querySelectorAll('body > *:not(table)');
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
<?php session_start(); include "C:/xampp/htdocs/RePoS/AdminUser/menuAdmin.php"; ?>
<body>
<?php
$servername="localhost";
$user="root";
$password="";
$dbname="repos";

$conn= new mysqli($servername, $user, $password, $dbname);
if($conn->connect_error){
    die("Connection Failed: " .$conn->connect_error);
}
$sql = " SELECT * FROM repos_data";
 $result = $conn->query($sql);

 if($result->num_rows > 0){
    echo "<h1>Show All Research Papers!</h1>";
    // Define a function to perform an action
    function performAction() {
        echo "Button clicked! Action performed.";
    }

    // Check if the button is clicked
    if (isset($_POST['action_button'])) {
        performAction();
    }
    echo "<button type=\"submit\" class=\"button button2\", name=\"action_button\" onclick=\"location.href='change-order.php';\">Change Order</button>";
    echo "<input type=\"button\", style=\" display: inline-block;
    background-color: lightblue;
    color: blue
    padding: 1rem 1.75rem;
    border-radius: .5rem;
    cursor: pointer;\", class=\"button button1\", onClick=\"printTableContent()\" value=\"Print Report\"/>";
    echo "<table>
    <tr>
        <th>Research Paper</th>
        <th>Paper Type</th>
        <th>Publisher</th>
        <th>Organization</th>
        <th>Edition</th>
        <th>Faculty</th>
        <th>Department</th>
        <th>publication Date</th>
        <th>Volumn</th>
        <th>Link</th>"; 
    while($row = $result->fetch_assoc()){
      $paperLink = $row['paper_link'];
        echo "<tr>
        <td>".$row['title']."</td>
        <td>".$row['paper_type']."</td>
        <td>".$row['author']."</td>
        <td>".$row['organization']."</td>
        <td>".$row['paper_type']."</td>
        <td>".$row['faculty']."</td>
        <td>".$row['department']."</td>
        <td>".$row['publication_date']."</td>
        <td>".$row['volume']."</td>
        <td><a href='$paperLink' target='_blank'><button>Link</button></a></td>
      </tr>";
    }
 }else{
    echo "0 Results";
}
 $conn->close()
?>
</div>
</body>