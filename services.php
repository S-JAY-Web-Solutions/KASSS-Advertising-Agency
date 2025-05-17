<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KASSS Advertising Agency</title>

	<link rel="stylesheet" type="text/css" href="content/css/services.css">
	<link rel="stylesheet" type="text/css" href="content/css/header_footer_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>
<body>
	<header class="header">
		<div class="brand">
			<img src="content/images/logo-width.png" alt="logo" class="brand-logo">
		</div>
		<nav class="navbar" id="navMenu">
			
			<div class="nav-content">
				<a href="index.php" class="nav-item ">Home</a>
				<a href="about.php" class="nav-item">About</a>
				<a href="services.php" class="nav-item active">Services</a>
				<a href="contacts.php" class="nav-item">Contacts</a>
				<a href="signin.php" class="nav-item nav-button">Sign-in &nbsp<i class="fa fa-sign-in"></i></a>
				<a href="signup.php" class="nav-item nav-button">Sign-up &nbsp<i class="fa fa-user-plus"></i></a>
			</div>
		</nav>
	</header>
	<main>
		<div class="packages">
		<?php
	
		require_once('config.php');

		$sql = mysqli_query($conn, "SELECT * FROM packages WHERE status = 1 ORDER BY price ASC;");

		$rowcount = mysqli_num_rows($sql);

			if ($rowcount > 0) {
    			while ($row = mysqli_fetch_assoc($sql)) {
    				echo '
                    <div class="package-card">
                        <div class="package-details">
                            <img src="content/uploads/'.$row['image'].'" class="package-img" alt="'.$row['name'].'">
                            <h3 class="package-title">'.$row['name'].'</h3>
                            <p class="package-price">LKR '.$row['price'].'.00</p>
                            <a href="service_view.php?id='.$row['id'].'" class="view-package-link">View Package</a>
                        </div>
                    </div>';
                }
    		}

		?>
		</div>
	</main>
	<footer>
		<div class="container">
			<div class="left-content">
				<a href="index.php"><img src="content/images/logo-width.png" alt="logo"></a>
				<p>KASSS Advertising is a full-service advertising agency dedicated to helping businesses grow their brands and achieve their marketing goals.</p>
			</div>
			<div class="center-content">
				<h3>Quick Links</h3>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="services.php">Products</a></li>
					<li><a href="contacts.php">Contact Us</a></li>
					<li><a href="privacy.html">Privacy Policy</a></li>
				</ul>
			</div>
			<div class="right-content">
				<h3>Follow us on</h3>
				<ul class="social-icons">
					<li><i class="fa fa-facebook"> Facebook</i></li>
					<li><i class="fa fa-twitter"></i> Twitter</li>
					<li><i class="fa fa-instagram"></i> Instagram</li>
					<li><i class="fa fa-linkedin"></i> Linkedin</li>
					<li><i class="fa fa-youtube"> Youtube</i></li>
				</ul>
			</div>
		</div>
		<div class="copyright">
			&copy;2024 All rights reserved | Design by <a href="https://www.sjaywebsolutions.lk/" target="_blank">S JAY Web Solutions (Pvt) Ltd</a>
		</div>
	</footer>
</body>
</html>