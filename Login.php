<?php
session_start();

// Define a multidimensional array with user credentials
$users = [
    [
        'username' => 'admin',
        'password' => 'admin123',
        'role' => 'admin'
    ],
    [
        'username' => 'Adnan',
        'password' => 'adnan123',
        'role' => 'user'
    ], [
        'username' => 'Samina',
        'password' => 'samina123',
        'role' => 'user'
    ], [
        'username' => 'Rabia',
        'password' => 'rabia123',
        'role' => 'user'
    ],
    [
        'username' => 'user',
        'password' => 'user123',
        'role' => 'user'
    ]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the submitted credentials match any user
    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];

            // Redirect to the appropriate dashboard based on the user's role
            if ($user['role'] === 'admin') {
                header('Location: admin_dashboard.php');
                exit();
            } elseif ($user['role'] === 'user') {
                header('Location: user_dashboard.php');
                exit();
            }
        }
    }

    // If no match is found, display an error message
    $error = 'Invalid username or password';
}
?>
<!-- ?php
// Database connection settings
$servername = "Localhost";
$username = "root";
$password = "";
$dbname = "repos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$email = "";
$password = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query to fetch user with provided email and password
    $sql = "SELECT * FROM registration WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        session_start();
        $_SESSION["email"] = $email;
        header("Location: user_dashboard.php"); // Redirect to dashboard page
    } else {
        $error = "Invalid email or password.";
    }
}

$conn->close();
?> -->

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      display: flex;
      justify-content: center;
      font-family: Roboto, Arial, sans-serif;
      font-size: 15px;
      }
      body{
        background-color: lightblue;
      }
      form {
        background: white;
      border: 5px solid #f1f1f1;
      }
      input[type=text], input[type=password] {
      width: 100%;
      padding: 16px 8px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      }
      button {
      background-color: #26a9e0;
      color: white;
      padding: 14px 0;
      margin: 10px 0;
      border: none;
      cursor: grabbing;
      width: 100%;
      }
      h1 {
      text-align:center;
      fone-size:18;
      }
      button:hover {
      opacity: 0.8;
      }
      .formcontainer {
      text-align: left;
      margin: 24px 50px 12px;
      }
      .container {
      padding: 16px 0;
      text-align:left;
      }
      span.psw {
      float: right;
      padding-top: 0;
      padding-right: 15px;
      }
      /* Change styles for span on extra small screens */
      @media screen and (max-width: 300px) {
      span.psw {
      display: block;
      float: none;
      }}
    </style>
</head>
<body>
    <?php if (isset($error)) { ?>
        <script>
            alert('<?php echo $error; ?>');
        </script>
    <?php } ?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <h1>Login Form</h1>
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="username"><strong>Username</strong></label>
        <input type="text" placeholder="Enter Username" name="username" required>
        <label for="password"><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" name="password" required>
      </div>
      <button type="submit">Login</button>
      <div class="container" style="background-color: #eee">
        <label style="padding-left: 15px">
        <input type="checkbox"  checked="checked" name="remember"> Remember me
        </label>
        <span class="signup"><a href="userNavBar/main/registration.php">Sign Up</a></span>
        <span class="psw"><a href="#"> Forgot password?</a></span>
      </div>
    </form>
</body>
</html>
