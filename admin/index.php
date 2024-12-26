<?php
session_start();

// Start output buffering to ensure no content is sent before headers
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>LMS | Login</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="./bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="./bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        overflow-x: hidden;
        background-image: url('bg1.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    #main_content {
        padding: 50px;
        background-color: transparent; /* Semi-transparent white background */
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        font-weight: bold;
        font-size: 1.2rem;
        color: white;
    }

    #side_bar {
        background-color: transparent;
        padding: 50px;
        width: 300px;
        height: 450px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        font-weight: bold;
        font-size: 1.2rem;
        color: white;
    }

    #side_bar h5 {
        font-size: 1.5rem;
        color: white;
    }

    #side_bar ul {
        font-size: 1.2rem;
        color: white;
    }

    #side_bar ul li {
        margin-bottom: 10px;
    }

    marquee {
        font-size: 1.5rem;
        font-weight: bold;
        color: white;
        padding: 10px;
        border-radius: 5px;
    }

    .navbar {
        background-color: black !important;
    }

    .navbar .nav-link, .navbar-brand {
        color: white !important;
        font-weight: bold;
        font-size: 1.2rem;
    }

    .navbar .nav-link:hover {
        color: #ccc !important;
    }

    #main_content h3 {
        font-size: 2.5rem;
    }

    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        text-align: center;
        padding: 10px;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        font-size: 1rem;
    }

    footer a {
        color: white;
        text-decoration: none;
        font-weight: bold;
    }

</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Library Management System (LMS)</a>
            </div>
        
            <ul class="nav navbar-nav navbar-right">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../signup.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../index.php">Login</a>
              </li>
              <li class="nav-item">
                    <a class="nav-link" href="../team.php">Team</a>
            </li>
            </ul>
        </div>
    </nav><br>
    <span><marquee>This is library management system. Library opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br>
    <div class="row">
        <div class="col-md-4" id="side_bar">
            <h5>Library Timing</h5>
            <ul>
                <li>Opening: 8:00 AM</li>
                <li>Closing: 8:00 PM</li>
                <li>(Sunday Off)</li>
            </ul>
            <h5>What We Provide ?</h5>
            <ul>
                <li>Full furniture</li>
                <li>Free Wi-fi</li>
                <li>News Papers</li>
                <li>Discussion Room</li>
                <li>RO Water</li>
                <li>Peaceful Environment</li>
            </ul>
        </div>
        <div class="col-md-8" id="main_content">
            <center><h3>Admin Login Form</h3></center>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email ID:</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Login</button>    
            </form>
            <?php 
            if(isset($_POST['login'])){
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection,"lms");
                $query = "select * from admins where email = '$_POST[email]'";
                $query_run = mysqli_query($connection,$query);
                while ($row = mysqli_fetch_assoc($query_run)) {
                    if($row['email'] == $_POST['email']){
                        if($row['password'] == $_POST['password']){
                            $_SESSION['name'] =  $row['name'];
                            $_SESSION['email'] =  $row['email'];
                            header("Location: admin_dashboard.php");
                            exit();  // Make sure to stop further script execution
                        }
                        else{
                            echo "<br><br><center><span class='alert-danger'>Wrong Password !!</span></center>";
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
    
    <!-- Footer -->
    <footer>
        <p>Created with 💗 by 
            <a href="https://github.com/harishy0406/LMS" target="_blank">Harish Gautham</a>
        </p>
    </footer>

</body>
</html>

<?php
// End output buffering and flush
ob_end_flush();
?>
