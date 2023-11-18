<!DOCTYPE html>
<html>
<head>
  <?php session_start(); include "C:/xampp/htdocs/RePoS/AdminUser/menuUser.php";?>
  <title>Research Paper Search</title>
  <style>
    .search-box {
      margin: 20px auto;
      width: 400px;
      padding: 10px;
      border: 1px solid #ccc;
    }

    .search-box input[type="text"] {
      width: 90%;
      padding: 8px;
      font-size: 16px;
    }

    .search-box input[type="submit"] {
      margin-top: 10px;
      padding: 8px 20px;
      font-size: 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
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

.year-filter {
      display: inline-block;
      margin-right: 10px;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f7f7f7;
    }
  </style>
</head>
<body>
  <h2>Research Paper Search</h2>
  <div class="search-box">
    <form method="POST" action="">
      <label for="year" class="year-filter">Filter by Year:</label>
      <select id="year" name="year">
        <option value="">All</option>

        <?php
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "repos";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Query to retrieve unique publication years from the database
        $yearQuery = "SELECT DISTINCT YEAR(publication_date) AS pub_year FROM repos_data";
        $yearResult = $conn->query($yearQuery);

        if ($yearResult->num_rows > 0) {
          while ($yearRow = $yearResult->fetch_assoc()) {
            $selected = ($_POST['year'] == $yearRow['pub_year']) ? 'selected' : '';
            echo '<option value="' . $yearRow['pub_year'] . '" ' . $selected . '>' . $yearRow['pub_year'] . '</option>';
          }
        }

        // Close the database connection
        $conn->close();
        ?>

      </select>
      <input type="text" id="search_text" name="search_text" placeholder="Enter search keyword">
      <input type="submit" value="Search">
    </form>
  </div>

  <?php
  // Connect to the database
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Retrieve the user input from the search box
  if (isset($_POST['search_text'])) {
    $searchText = $_POST['search_text'];
  } else {
    $searchText = '';
  }

  // Retrieve the selected year from the filter
  if (isset($_POST['year'])) {
    $selectedYear = $_POST['year'];
  } else {
    $selectedYear = '';
  }

  // Prepare the SQL query based on the user input and selected year
  $sql = "SELECT * FROM repos_data WHERE 
          (title LIKE '%$searchText%' OR
          author LIKE '%$searchText%' OR
          department LIKE '%$searchText%' OR
          paper_type LIKE '%$searchText%')";

  if (!empty($selectedYear)) {
    $sql .= " AND YEAR(publication_date) = '$selectedYear'";
  }

  // Execute the SQL query
  $result = $conn->query($sql);

  // Display the search results
  if ($result->num_rows > 0) {
    echo "<h2>Search Results</h2>";

    // Display the results in a user-friendly manner
    echo "<table>
            <tr>
              <th>Title</th>
              <th>Author</th>
              <th>Publication Date</th>
              <th>Department</th>
              <th>Paper Type</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>".$row['title']."</td>
              <td>".$row['author']."</td>
              <td>".$row['publication_date']."</td>
              <td>".$row['department']."</td>
              <td>".$row['paper_type']."</td>
            </tr>";
    }

    echo "</table>";
  } else {
    echo "No results found.";
  }

  // Close the database connection
  $conn->close();
  ?>

</body>
</html>
