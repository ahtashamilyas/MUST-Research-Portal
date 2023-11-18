<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <style>
  html, body {
      display: flex;
      justify-content: center;
      height: 100%;
      }
   body, div, h1, form, input, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #666;
      }
      body{
        background: powderblue;
      }
      h1 {
      padding: 10px 0;
      font-size: 32px;
      font-weight: 300;
      text-align: center;
      }
      p {
      font-size: 12px;
      }
      hr {
      color: #a9a9a9;
      opacity: 0.3;
      }
      address{
        width: 150px; 
        height: 100px; 
      }
      .main-block {
      width: 650px; 
      min-height: 460px; 
      padding: 10px 0;
      margin: auto;
      border-radius: 5px; 
      border: solid 1px #ccc;
      box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
      background: #ebebeb; 
      }
      form {
      margin: 0 30px;
      }
      .account-type, .gender {
      margin: 15px 0;
      }
      input[type=radio] {
      display: none;
      }
      label#icon {
      margin: 0;
      border-radius: 5px 0 0 5px;
      }
      label.radio {
      position: relative;
      display: inline-block;
      padding-top: 4px;
      margin-right: 20px;
      text-indent: 30px;
      overflow: visible;
      cursor: pointer;
      }
      label.radio:before {
      content: "";
      position: absolute;
      top: 2px;
      left: 0;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: #1c87c9;
      }
      label.radio:after {
      content: "";
      position: absolute;
      width: 9px;
      height: 4px;
      top: 8px;
      left: 4px;
      border: 3px solid #fff;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      input[type=text], input[type=password] {
      width: calc(100% - 57px);
      height: 36px;
      margin: 13px 0 0 -5px;
      padding-left: 10px; 
      border-radius: 0 5px 5px 0;
      border: solid 1px #cbc9c9; 
      box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
      background: #fff; 
      }
      input[type=password] {
      margin-bottom: 15px;
      }
      #icon {
      display: inline-block;
      padding: 9.3px 15px;
      box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
      background: #1c87c9;
      color: #fff;
      text-align: center;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 100%;
      padding: 10px 0;
      margin: 10px auto;
      border-radius: 5px; 
      border: none;
      background: #1c87c9; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background: #26a9e0;
      }
    </style>
  <title>User Registration Form</title>
</head>
<body>
  <div class="main-block">
  <h1>Sign Up as an auther!</h1>
  
  <form action="registration.php" method="post" enctype="multipart/form-data">
    <hr>
    <label id="icon" for="name"><i class="fas fa-user"></i></label>
    <input type="text" id="name" name="name" placeholder="Name" required><br><br>
    
    <label id="icon" for="father_name"><i class="fas fa-user"></i></label>
    <input type="text" id="father_name" name="father_name" placeholder="Father Name" required><br><br>
    <hr>
    <div class="gender">
          <input type="radio" id="male" name="gender" value="Male">
          <label for="male" class="radio">Male</label>
          <input type="radio" id="female" name="gender" value="Female">
          <label for="female" class="radio">Female</label>
        </div><br><br>
    
    <label id="icon" for="cnic"><i class="fa-regular fa-id-card"></i></label>
    <input type="text" id="cnic" name="cnic" placeholder="Enter your CNIC Number" required><br><br>
    
    <label id="icon" for="contact"><i class="fa fa-phone"></i></label><input type="text" id="contact" name="contact" placeholder="Enter your Contact Number" required><br><br>
    <hr>
    <label icon="icon" for="address">Address:</label>
    <textarea id="address" name="address" placeholder="Enter your Address" required></textarea><br><br>
    
    <label for="city">City:</label>
    <select id="city" name="city">
    <option>--</option>
      <option>Mirpur AJK</option>
      <option>Islamgarh</option>
      <option>Muzaffarabad</option>
      <option>Kotli</option>
      <option>Rawalakot</option>
      <option>Bhimber</option>
      <!-- Add more options as needed -->
    </select><br><br>
    <label for="district">District:</label>
    <select id="district" name="district">
    <option >--</option>
      <option>Mirpur AJK</option>
      <option>Kotli</option>
      <option>Muzaffarabad</option>
      <option>chakswari</option>
      <option>Rawalakot</option>
      <option>Bhimber</option>
      <!-- Add more options as needed -->
    </select><br><br>
    
    <label for="qualification">Qualification:</label>
    <input type="text" id="qualification" name="qualification" placeholder="Enter your Qualification" required><br><br>
    
    <label for="religion">Religion:</label>
    <select id="religion" name="religion">
      <option>Islam</option>
      <option>Christianity</option>
      <option>Hinduism</option>
      <!-- Add more options as needed -->
    </select><br><br>
    
    <label for="role">Role:</label>
    <select id="role" name="role">
      <option>User</option>
      <option>Admin</option>
      <!-- Add more options as needed -->
    </select><br><br>
    <hr>
    <label id="icon" for="uname"><i class="fas fa-user"></i></label>
    <input type="text" id="uname" name="uname" placeholder="Enter Username" required><br><br>
    
    <label id="icon" for="pwd"><i class="fas fa-unlock-alt"></i></label>
    <input type="password" id="pwd" name="pwd" placeholder="Enter your Password" required><br><br>
    
    <label id="icon" for="email"><i class="fas fa-envelope"></i>
  </label><input type="text" id="email" name="email" placeholder="Enter your Email Address" required><br><br>
    
    <label for="image">Upload Image:</label>
    <input type="file" id="image" name="image">
    <div class=""btn-black>
    <button type="Submit">Sumbit</button>
    </div>
  </form>
</div>
</body>
</html>
<!-- ----------------------------------------------------------------------------------------------------------------------- -->
<?php
// Validate and process the registration form

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $name = $_POST['name'];
  $fatherName = $_POST['father_name'];
  $gender = $_POST['gender'];
  $cnic = $_POST['cnic'];
  $contact = $_POST['contact'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $district = $_POST['district'];
  $qualification = $_POST['qualification'];
  $religion = $_POST['religion'];
  $role = $_POST['role'];
  $uname = $_POST['uname'];
  $pwd = $_POST['pwd'];
  $email = $_POST['email'];

  // Perform server-side validation
  $errors = [];

  // Validate name (required)
  if (empty($name)) {
    $errors[] = "Name is required";
  }

  // Validate father's name (required)
  if (empty($fatherName)) {
    $errors[] = "Father's Name is required";
  }

  // Validate CNIC (required and numeric)
  if (empty($cnic)) {
    $errors[] = "CNIC is required";
  } elseif (!is_numeric($cnic)) {
    $errors[] = "CNIC must be a numeric value";
  }

  // Validate contact (required and numeric)
  if (empty($contact)) {
    $errors[] = "Contact is required";
  } elseif (!is_numeric($contact)) {
    $errors[] = "Contact must be a numeric value";
  }

  // Validate username (required)
  if (empty($uname)) {
    $errors[] = "Username is required";
  }

  // Validate password (required and minimum length)
  if (empty($pwd)) {
    $errors[] = "Password is required";
  } elseif (strlen($pwd) < 6) {
    $errors[] = "Password must be at least 6 characters long";
  }

  // Validate email (required and valid format)
  if (empty($email)) {
    $errors[] = "Email is required";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
  }

  // If there are any validation errors, display them
  if (!empty($errors)) {
    foreach ($errors as $error) {
      echo "<p>$error</p>";
    }
  } else {
    // If validation is successful, store the data in the database

    // Perform necessary database operations (e.g., using MySQLi)

    // Connect to the database
    $servername = "localhost";
    $usernam = "root";
    $passwd = "";
    $dbname = "repos";

    $conn = new mysqli($servername, $usernam, $passwd, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Process image upload
    $image = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];

    // Read image data
    $imgData = addslashes(file_get_contents($image));

    // Prepare and execute the SQL query to insert the data into the database
    $sql = "INSERT INTO pending_approval(name, father_name, gender, cnic, contact, address, city, district, qualification, religion, role, username, password, email, image_name, image_data) VALUES ('$name', '$fatherName', '$gender', '$cnic', '$contact', '$address', '$city', '$district', '$qualification', '$religion', '$role', '$uname', '$pwd', '$email','$image_name', '$imgData')";

    if ($conn->query($sql) === TRUE) {
      // echo '<script>window.location.href = "/Login.php";</script>';
      echo "<script>alert('Your Data is Submitted Successfully! Please wait for Admin Approval. We will send you an Email when your Account is Activated.');</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
  }
}
?>
