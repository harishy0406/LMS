<?php
	session_start();
	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$author_id = "";
	$author_name = "";
	$query = "select * from authors where author_id = $_GET[aid]";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
		$author_name = $row['author_name'];
		$author_id = $row['author_id'];
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
            font-size: 1.5rem;
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
		<center><h4 style="font-size: 2rem; color:rgb(250, 250, 250);font-weight: bold;">Edit Author</h4><br></center>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<?php if(isset($_SESSION['success_message'])) { ?>
					<div class="success-message">
						<?php 
							echo $_SESSION['success_message']; 
							unset($_SESSION['success_message']);
						?>
					</div>
				<?php } ?>
				<form action="" method="post">
					<div class="form-group">
						<label for="name">Author Name:</label>
						<input type="text" class="form-control" name="author_name" value="<?php echo $author_name; ?>" required>
					</div>
					<div class="d-flex justify-content-between">
						<button type="submit" name="update_author" class="btn btn-primary">Update Author</button>
						<a href="manage_author.php" class="btn btn-primary">Back</a>
					</div>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>
<?php
	if(isset($_POST['update_author'])){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$query = "update authors set author_name = '$_POST[author_name]' where author_id = $_GET[aid]";
		$query_run = mysqli_query($connection,$query);
		$_SESSION['success_message'] = "Author updated successfully!";
		header("location:edit_author.php?aid=$_GET[aid]");
		exit();
	}
?>
