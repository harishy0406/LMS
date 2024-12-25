<?php
	session_start();
	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$query = "select * from category";
	$cat_name = "";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book's Category</title>
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
	        		<a class="dropdown-item" href="#">View Profile</a>
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
		<center><h4 style="font-size: 2rem; color:rgb(250, 250, 250);font-weight: bold;">Registered Book's Category</h4><br></center>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-8">
				<form>
					<table class="table-bordered" width="900px" style="text-align: center ; font-size: 1.2rem; color:rgb(255, 255, 255); border: 2px solidrgb(255, 255, 255);">
						<tr>
							<th>Category Name</th>
						</tr>
				
					<?php
						$query_run = mysqli_query($connection,$query);
						while ($row = mysqli_fetch_assoc($query_run)){
							?>
							<tr>
							<td><?php echo $row['cat_name'];?></td>
						</tr>

					<?php
						}
					?>	
				</table>
				</form>
				<br>
				<div style="text-align: left;">
					<a href="admin_dashboard.php" class="btn btn-success" style="font-size: 1rem;">Back</a>
				</div>	
			</div>
			</div>
			<div class="col-md-2"></div>
		</div>
		<footer>
        <p>Created with 💗 by 
            <a href="https://github.com/harishy0406/LMS" target="_blank">Harish Gautham</a>
        </p>
    </footer>
</body>
</html>
