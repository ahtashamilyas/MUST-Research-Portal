<html>
    <header>

    <!-- <link rel="stylesheet" type="" href="css/style.css"> -->
    <style>
            /* CSS styles for the admin dashboard */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #f2f2f2;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header h1 {
        margin: 0;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.2);
        }
        100% {
            transform: scale(1);
        }
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
        background-color: #f8f8ff;
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
    <h1>MUST Researcher Portal</h1>
    <div class="search-bar">
        <input type="text" placeholder="Search...">
        <input type="submit" value="Search">
</div>
<div class="user-info">
    <img src="admin_avatar.jpg" alt="Admin Avatar">
            <span>
                <?php  echo $_SESSION['username']; ?>
            </span>
</div>
</header>

<!-- <div class="navigation">
        <ul>
            ?php
            
            $navLinks = array(
                'Home' => '../adminNavBar/icons/home.png',
                'Manage City' => '../adminNavBar/icons/city.png ',
                'Manage District' => '../adminNavBar/icons/district.png',
                'Manage Faculty' => '../adminNavBar/icons/manage.png',
                'Manage Departments' => '../adminNavBar/icons/derpatment.png',
                'Manage Editions' => '../adminNavBar/icons/graph.png',
                'Manage Organization Record' => '../adminNavBar/icons/city.png',
                'Manage Paper Type' => '../adminNavBar/icons/document.png',
                'Manage Registered Users' => '../adminNavBar/icons/manage.png',
                'All Publications' => '../adminNavBar/icons/view.png',
                'Logout' => '../adminNavBar/icons/logout.png'
            );

            foreach ($navLinks as $linkText => $iconFile) {
                if ($linkText == "Manage City") {
                    echo '<li><a href="adminNavBar/manage_city.php"><img src="' . $iconFile . '" alt="' . $linkText . '">' . $linkText . '</a></li>';
                } else {
                    echo '<li><a href="#"><img src="' . $iconFile . '" alt="' . $linkText . '">' . $linkText . '</a></li>';
                }
            }
            ?>
        </ul>
    </div> -->
    </html>
    <div class="navigation">
    <link>
        <ul>
            <li><a href="/admin_dashboard.php"><img src="/icons1/home.png" alt="Home">Home</a></li>
            <li><a href="/adminNavBar/manage_city.php"><img src="/icons1/city.png" alt="manage city">Manage City</a></li>
            <li><a href="/adminNavBar/manage_district.php"><img src="/icons1/district.png" alt="manage District">Manage District</a></li>
            <li><a href="/adminNavBar/manage_faculty.php"><img src="/icons1/manage.png" alt="manage faculty">Manage Faculty</a></li>
            <li><a href="/adminNavBar/manage_department.php"><img src="/icons1/derpatment.png" alt="manage departemtn">Manage Departments</a></li>
            <li><a href="/adminNavBar/manage_edition.php"><img src="/icons1/graph.png" alt="manage edition">Manage Editions</a></li>
            <li><a href="/adminNavBar/manage_organization_Record.php"><img src="/icons1/city.png" alt="Organization Record">Manage Organization Record</a></li>
            <li><a href="/adminNavBar/manage_paper_type.php"><img src="/icons1/document.png" alt="paper type">Manage Paper Type</a></li>
            <li><a href="/adminNavBar/manage_register_user.php"><img src="/icons1/manage.png" alt="register user">Manage Registered Users</a></li>
            <li><a href="/adminNavBar/showallpapers.php"><img src="/icons1/view.png" alt="all publications">All Publications</a></li>
            <li><a href="/logout.php"><img src="/icons1/logout.png" alt="Logout">Logout</a></li>
        </ul>
    </div>