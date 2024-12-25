<?php
session_start();

// Database connection
$connection = mysqli_connect("localhost", "root", "", "lms");

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize variables
$book_name = $book_no = $author_id = $cat_id = $book_price = "";

// Fetch data to pre-fill the form
if (isset($_GET['bn'])) {
    $book_no = intval($_GET['bn']); // Sanitize input
    $query = "SELECT * FROM books WHERE book_no = $book_no";
    $query_run = mysqli_query($connection, $query);

    if ($query_run && mysqli_num_rows($query_run) > 0) {
        $row = mysqli_fetch_assoc($query_run);
        $book_name = $row['book_name'];
        $author_id = $row['author_id'];
        $cat_id = $row['cat_id'];
        $book_price = $row['book_price'];
    } else {
        echo "Error: Book not found.";
        exit();
    }
}

// Update the book details
if (isset($_POST['update'])) {
    $book_name = mysqli_real_escape_string($connection, $_POST['book_name']);
    $author_id = intval($_POST['author_id']);
    $cat_id = intval($_POST['cat_id']);
    $book_price = floatval($_POST['book_price']);

    $update_query = "UPDATE books SET 
        book_name = '$book_name',
        author_id = $author_id,
        cat_id = $cat_id,
        book_price = $book_price
        WHERE book_no = $book_no";

    if (mysqli_query($connection, $update_query)) {
        $_SESSION['success_message'] = "Book details successfully updated.";
        header("Location: edit_book.php?bn=$book_no");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
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

    <div class="container mt-5">
        <h2 class="text-center" style="font-size: 2rem; color:rgb(250, 250, 250);font-weight: bold;">Edit Book</h2>
		<?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success text-center">
            <?php 
                echo $_SESSION['success_message']; 
                unset($_SESSION['success_message']); // Clear the message after displaying
            ?>
        </div>
    	<?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label for="book_no" class="form-label">Book Number:</label>
                <input type="text" id="book_no" class="form-control" value="<?php echo $book_no; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="book_name" class="form-label">Book Name:</label>
                <input type="text" name="book_name" id="book_name" class="form-control" value="<?php echo $book_name; ?>" required>
            </div>
            <div class="form-group">
                <label for="author_id" class="form-label">Author ID:</label>
                <input type="number" name="author_id" id="author_id" class="form-control" value="<?php echo $author_id; ?>" required>
            </div>
            <div class="form-group">
                <label for="cat_id" class="form-label">Category ID:</label>
                <input type="number" name="cat_id" id="cat_id" class="form-control" value="<?php echo $cat_id; ?>" required>
            </div>
            <div class="form-group">
                <label for="book_price" class="form-label">Book Price:</label>
                <input type="number" step="0.01" name="book_price" id="book_price" class="form-control" value="<?php echo $book_price; ?>" required>
            </div>
			<div class="d-flex justify-content-between">
				<button type="submit" name="update" class="btn btn-primary">Update Book</button>
				<a href="manage_book.php" class="btn btn-primary">Back</a>
			</div>
        </form>
    </div>

    <footer>
        <p>Created with 💗 by 
            <a href="https://github.com/harishy0406/LMS" target="_blank">Harish Gautham</a>
        </p>
    </footer>
</body>
</html>
