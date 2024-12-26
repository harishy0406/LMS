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
	<span><marquee>Welcome to library mangement system</marquee></span><br><br>
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
			  <li class="nav-item">
		        <a class="nav-link" href="return_book.php">Return Book</a>
		      </li>
			  
		    </ul>
		</div>
	</nav><br><br><br><br><br><br><br>
			<div class="row justify-content-center">
			<div class="col-md-2" style="margin: 10px">
				<div class="card bg-light" style="width: 300px">
					<div class="card-header text-center">Registered User</div>
					<div class="card-body">
						<p class="card-text text-center">No. total Users: <?php echo get_user_count(); ?></p>
						<a class="btn btn-danger d-block" href="Regusers.php">View Registered Users</a>
					</div>
				</div>
			</div>
			<div class="col-md-2" style="margin: 10px">
				<div class="card bg-light" style="width: 300px">
					<div class="card-header text-center">Total Book</div>
					<div class="card-body">
						<p class="card-text text-center">No of books available: <?php echo get_book_count(); ?></p>
						<a class="btn btn-success d-block" href="Regbooks.php">View All Books</a>
					</div>
				</div>
			</div>
			<div class="col-md-2" style="margin: 10px">
				<div class="card bg-light" style="width: 300px">
					<div class="card-header text-center">Book Categories</div>
					<div class="card-body">
						<p class="card-text text-center">No of Book's Categories: <?php echo get_category_count(); ?></p>
						<a class="btn btn-warning d-block" href="Regcat.php">View Categories</a>
					</div>
				</div>
			</div>
			<div class="col-md-2" style="margin: 10px">
				<div class="card bg-light" style="width: 300px">
					<div class="card-header text-center">No. of Authors</div>
					<div class="card-body">
						<p class="card-text text-center">No of Authors: <?php echo get_author_count(); ?></p>
						<a class="btn btn-primary d-block" href="Regauthor.php">View Authors</a>
					</div>
				</div>
			</div>
			<div class="col-md-2" style="margin: 10px">
				<div class="card bg-light" style="width: 300px">
					<div class="card-header text-center">Book Issued</div>
					<div class="card-body">
						<p class="card-text text-center">No of book issued: <?php echo get_issue_book_count(); ?></p>
						<a class="btn btn-success d-block" href="view_issued_book.php">View Issued Books</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer>
        <p>Created with 💗 by 
            <a href="https://github.com/harishy0406/LMS" target="_blank">Harish Gautham</a>
        </p>
    </footer>
</body>
</html>
