<?php
	require("functions.php");
	session_start();

	// Fetch data from the database
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, "lms");
	$name = "";
	$email = "";
	$mobile = "";
	$query = "SELECT * FROM admins WHERE email = '$_SESSION[email]'";
	$query_run = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($query_run)) {
		$name = $row['name'];
		$email = $row['email'];
		$mobile = $row['mobile'];
	}

	// Initialize the success message variable
	$success_message = "";

	// Check if the form was submitted
	if (isset($_POST['add_cat'])) {
		$connection = mysqli_connect("localhost", "root", "");
		$db = mysqli_select_db($connection, "lms");
		$query = "INSERT INTO category VALUES('', '$_POST[cat_name]')";
		$query_run = mysqli_query($connection, $query);
		
		// If category is added successfully
		if ($query_run) {
			$success_message = "Category added successfully!";
		} else {
			$success_message = "Failed to add category. Please try again.";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add New Category</title>
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
		.navbar {
			background-color: black!important;
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
			font-size: 1.5rem;
			font-weight: bold;
			color: White;
		}
		.btn-primary {
			font-size: 1.2rem;
			font-weight: bold;
			background-color: green;
			color: white;
			border: none;
			padding: 10px 20px;
		}
		.btn-primary:hover {
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
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span></font>
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email']; ?></strong></font>
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
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
		<div class="container-fluid">
		    <ul class="nav navbar-nav navbar-center">
		      <li class="nav-item">
		        <a class="nav-link" href="admin_dashboard.php">Dashboard</a>
		      </li>
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Books </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_book.php">Add New Book</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_book.php">Manage Books</a>
	        	</div>
		      </li>
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Category </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_cat.php">Add New Category</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_cat.php">Manage Category</a>
	        	</div>
		      </li>
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Authors</a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_author.php">Add New Author</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_author.php">Manage Author</a>
	        	</div>
		      </li>
	          <li class="nav-item">
		        <a class="nav-link" href="issue_book.php">Issue Book</a>
		      </li>
		    </ul>
		</div>
	</nav><br>
	<span><marquee>This is library mangement system. Library opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br>
		<center><h4 style="font-size: 2rem; color:rgb(250, 250, 250);font-weight: bold;">Add a new Category</h4><br></center>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="" method="post">
					<div class="form-group">
						<label for="name" class="form-label">Category Name:</label>
						<input type="text" class="form-control" name="cat_name" required>
					</div>
					<div class="d-flex justify-content-between">
						<button type="submit" name="add_cat" class="btn btn-primary">Add Category</button>
						<a href="admin_dashboard.php" class="btn btn-primary">Back</a>
					</div>
				</form>

				<!-- Display success message if added -->
				<?php if($success_message != ""): ?>
					<div class="alert alert-success mt-3">
						<?php echo $success_message; ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>
