<?php
	require("functions.php");
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
	  <style type="text/css">
		body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow-x: hidden;
            background-image: url('bg3.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
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
		.form-label {
        font-size: 2.2rem;
        font-weight: bold;
        color: green;
    }
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="admin_dashboard.php">Library Management System (LMS)</a>
			</div>
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></font>
		    <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="view_profile.php">View Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="change_password.php">Change Password</a>
	        	</div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="../logout.php">Logout</a>
		      </li>
		    </ul>
		</div>
	</nav><br>
	<span><marquee>This is library mangement system. Library opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br>
	<center><h4 style="font-size: 2.2rem; color:rgb(250, 250, 250);font-weight: bold;">Change Student Password</h4><br></center>
		<div class="row">
		<div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="update_password.php" method="post">
                    <div class="form-group">
                        <label for="password" class="form-label">Enter Password:</label>
                        <input type="password" class="form-control custom-input" name="old_password">
                    </div>
            <div class="form-group">
            <label for="New Password" class="form-label">Enter New Password:</label>
            <input type="password" name="new_password" class="form-control custom-input">
        </div>
		<div class="d-flex justify-content-between">
        <button type="submit" name="update" class="btn btn-custom">Update Password</button>
		<a href="admin_dashboard.php" class="btn btn-custom">Back</a>
</div>
    </form>
</div>

<style>
    .form-label {
        font-size: 2rem; /* Increase font size */
        font-weight: bold; /* Make text bold */
        color: white; /* Change text color */
    }

    .custom-input {
        font-size: 1.2rem; /* Increase input text size */
        color: black; /* Text color inside input */
        border: 2px solid darkblue; /* Add border color */
    }

    .custom-input:focus {
        outline: none;
        border-color: green; /* Highlight color when focused */
        box-shadow: 0 0 5px green;
    }

    .btn-custom {
        font-size: 1.2rem; /* Button text size */
        font-weight: bold;
        background-color: Green;
        color: white;
        border: none;
        padding: 10px 20px;
        text-decoration: none;
        text-align: center;
        display: inline-block;
        cursor: pointer;
    }

    .btn-custom:hover {
        background-color: darkgreen;
    }
</style>

			<div class="col-md-4"></div>
		</div>
</body>
</html>
