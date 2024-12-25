<?php
	session_start();
	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$name = "";
	$email = "";
	$mobile = "";
	$address = "";
	$query = "select * from users where email = '$_SESSION[email]'";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
		$name = $row['name'];
		$email = $row['email'];
		$mobile = $row['mobile'];
		$address = $row['address'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow-x: hidden;
            background-image: url('bg2.jpg');
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
        font-size: 2rem;
        font-weight: bold;
        color: White;
    }
	.btn-custom {
        font-size: 1.2rem;
        font-weight: bold;
        background-color: green;
        color: white;
        border: none;
        padding: 10px 20px;
    }

    .btn-custom:hover {
        background-color: darkgreen;
    }
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="admin_dashboard.php">Library Management System (LMS)</a>
			</div>
			<font style="color: white"><span><strong>Student_ID: <?php echo $_SESSION['id'];?></strong></font>
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
		<center><h4 style="font-size: 2.2rem; color:rgb(250, 250, 250); font-weight: bold;">Edit Profile</h4><br></center>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
			<form action="update.php" method="post">
			<div class="form-group">
				<label for="name" class="form-label">Name:</label>
				<input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
			</div>
			<div class="form-group">
				<label for="email" class="form-label">Email:</label>
				<input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
			</div>
			<div class="form-group">
				<label for="mobile" class="form-label">Mobile:</label>
				<input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>">
			</div>
			<div class="form-group">
				<label for="address" class="form-label">Address:</label>
				<textarea rows="3" cols="40" name="address" class="form-control"><?php echo $address; ?></textarea>
			</div>
			<div class="d-flex justify-content-between">
                <button type="submit" name="update" class="btn btn-custom">Update</button>
                <a href="user_dashboard.php" class="btn btn-custom">Back</a>
            </div>
</form>

			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>
