<?php
	session_start();
	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$cat_id = "";
	$cat_name = "";
	$query = "select * from category where cat_id = $_GET[cid]";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
		$cat_name = $row['cat_name'];
		$cat_id = $row['cat_id'];
	}

	// Check if the session has a success message
	if (isset($_SESSION['success_message'])) {
		$success_message = $_SESSION['success_message'];
		unset($_SESSION['success_message']); // Clear the message after displaying it
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
	  <style>
        body {
            background-image: url('bg3.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
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
        }
        .navbar .nav-link:hover {
            color: #ccc !important;
        }
        .form-label {
            font-size: 1.2rem;
            color: white;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-primary {
            font-size: 1.2rem;
            padding: 10px 20px;
            background-color: green;
            border: none;
        }
        .btn-primary:hover {
            background-color: darkgreen;
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
        }
        footer a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
		.success-message {
			background-color: #28a745;
			color: white;
			padding: 15px;
			border-radius: 5px;
			margin-bottom: 20px;
			font-size: 1.2rem;
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
	        		<a class="dropdown-item" href="">View Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="#">Edit Profile</a>
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
	
	<?php if (isset($success_message)): ?>
		<div class="success-message">
			<?php echo $success_message; ?>
		</div>
	<?php endif; ?>

	<center><h4 style="font-size: 2rem; color:rgb(250, 250, 250);font-weight: bold;">Edit Category</h4><br></center>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="" method="post">
				<div class="form-group">
					<label for="name">Category Name:</label>
					<input type="text" class="form-control" name="cat_name" value="<?php echo $cat_name; ?>" required>
				</div>
				<div class="d-flex justify-content-between">
					<button type="submit" name="update_cat" class="btn btn-primary">Update Category</button>
					<a href="manage_cat.php" class="btn btn-primary">Back</a>
				</div>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>

<?php
	if (isset($_POST['update_cat'])) {
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$query = "update category set cat_name = '$_POST[cat_name]' where cat_id = $_GET[cid]";
		$query_run = mysqli_query($connection,$query);

		// Set success message in session
		$_SESSION['success_message'] = "Category updated successfully!";
		header("Location: edit_cat.php?cid=" . $_GET['cid']); // Redirect to the same page to show the message
		exit(); // Make sure no further code is executed
	}
?>
