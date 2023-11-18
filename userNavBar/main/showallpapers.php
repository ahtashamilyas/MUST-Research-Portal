<style>
  body {
      font-family: Arial, sans-serif;
    }
    /* table {
            display: grid;
            grid-template-columns: 150px auto; /* Adjust the width of the menu and table columns */
            /* grid-gap: 20px; /* Gap between menu and table */
            /* align-items: start;
            margin: 20px; */
        /* } */ 
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
</style>
<?php session_start(); include "C:/xampp/htdocs/RePoS/AdminUser/menuUser.php"; ?>
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
        <td><a href='$paperLink' targer='_blank'><button>Link</button></a></td>
      </tr>";
    }
 }else{
    echo "0 Results";
}
 $conn->close()
?>
</div>
</body>