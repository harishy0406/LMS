<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
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

        .container {
            margin-top: 50px;
        }

        .member-card {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            background-color: #fff;
            margin-bottom: 20px;
        }

        .member-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .team-member-details input {
            width: 80%;
            margin: 10px 0;
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
        .github-box {
            background-color: #333;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-top: 30px;
        }

        .github-box a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="font-size: 2rem; color:rgb(250, 250, 250);font-weight: bold;" class="text-center mb-5">Meet Our Team</h2>
        
        <div class="row">
            <!-- Team Member 1 -->
            <div class="col-md-4">
                <div class="member-card">
                    <img src="profile.png" alt="Member 1" class="member-photo">
                    <div class="team-member-details">
                        <input type="text" value="Name: Haemanth" disabled>
                        <input type="text" value="RegNo: 21MIS" disabled>
                        <input type="text" value="Contact: 9876543210" disabled>
                    </div>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="col-md-4">
                <div class="member-card">
                    <img src="profile.png" alt="Member 2" class="member-photo">
                    <div class="team-member-details">
                        <input type="text" value="Name: M Harish Gautham" disabled>
                        <input type="text" value="RegNo: 22MIS0421" disabled>
                        <input type="text" value="Contact: 9876543211" disabled>
                    </div>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="col-md-4">
                <div class="member-card">
                    <img src="profile.png" alt="Member 3" class="member-photo">
                    <div class="team-member-details">
                        <input type="text" value="Name: Velan" disabled>
                        <input type="text" value="RegNo: 21MIS" disabled>
                        <input type="text" value="Contact: 987654321" disabled>
                    </div>
                </div>
            </div>
        </div>

        <!-- GitHub Box -->
        <div class="github-box">
            <p><strong>Check out our Project GitHub Repository:</strong></p>
            <a href="https://github.com/harishy0406/LMS" target="_blank">
                <i class="fab fa-github" style="font-size:20px; margin-right:5px;"></i> Click Here(GitHub)
            </a>
        </div>
        <br>
        <div class="d-flex justify-content-between">
				<a href="index.php" class="btn btn-primary">Back</a>
		</div>
        
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
