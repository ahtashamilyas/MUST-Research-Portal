<!-- <link rel="stylesheet" type="" href="css/style1.css"> -->
<header>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background: #f2f2f2;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header h1 {
    margin: 0;
    animation: pulse 1s infinite;
}

.user-info {
    display: flex;
    align-items: center;
}

.user-info img {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin-right: 10px;
}

.navigation {
    background-color: #f8f8f8;
    width: 15%;
    min-width: 200px;
    padding: 20px;
    height: 100vh;
    float: left;
}

.content {
    padding: 20px;
    margin-left: 25%;
}

.navigation ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.navigation li {
    margin-bottom: 10px;
}

.navigation li a {
    text-decoration: none;
    color: #333;
    display: flex;
    align-items: center;
    position: relative;
}

.navigation li a img {
    width: 20px;
    height: 20px;
    margin-right: 10px;
}

.navigation li a::before {
    content: '';
    position: absolute;
    top: 50%;
    left: -10px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: transparent;
    transition: background-color 0.3s ease;
    transform: translateY(-50%);
}

.navigation li a:hover::before {
    background-color: #f26969;
}
.search-bar {
        text-align: center;
        padding: 10px;
    }

    .search-bar input[type="text"] {
        padding: 5px;
        width: 300px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .search-bar input[type="submit"] {
        padding: 5px 10px;
        background-color: #4caf50;
        border: none;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }

    .search-bar input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
     <h1>MUST Scholar</h1>
     <div class="search-bar">
        <input type="text" placeholder="Search...">
        <input type="submit" value="Search">
</div>

<div class="user-info">
            <img src="user_avatar.jpg" alt="User Avatar">
            <span>
                <?php  echo $_SESSION['username']; ?>
            </span>
        </div>
</header>
     <!-- <div class="user-info"> -->
     <!-- ?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "repos";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve image data from the database
$sql = "SELECT image_data FROM registration WHERE name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    header("Content-type: image/jpeg"); // Adjust this according to the image type you are using
    echo $row['image_data'];
} else {
    echo "Image not found.";
}
$conn->close();
?></div> -->

<div class="navigation">
    <link>
        <ul>
            <li><a href="/user_dashboard.php"><img src="/icons1/home.png" alt="Home">Home</a></li>
            <li><a href="/userNavBar/fetch_data.php"><img src="/icons1/update.png" alt="Update Profile">Update Profile</a></li>
            <li><a href="/userNavBar/main/store_paper.php"><img src="/icons1/document.png" alt="Add New Publication">Add new Publication</a></li>
            <li><a href="/userNavBar/main/showallpapers.php"><img src="/icons1/view.png" alt="View Research Papers">View your all Research Papers</a></li>
            <li><a href="/userNavBar/main/Search.php"><img src="/icons1/search.png" alt="Search Research Papers">Search Research Papers</a></li>
            <li><a href="/logout.php"><img src="/icons1/logout.png" alt="Logout">Logout</a></li>
        </ul>
    </div>