<?php
	
require_once('config.php');

if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
$sql = mysqli_query($conn,"SELECT * FROM packages WHERE status = 1 AND id = '$id';");
$row = mysqli_fetch_assoc($sql);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KASSS Advertising Agency</title>

	<link rel="stylesheet" type="text/css" href="content/css/services.css">
	<link rel="stylesheet" type="text/css" href="content/css/header_footer_style.css">
	<script src="content/js/script.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>
<body>
	<header class="header">
		<div class="brand">
			<img src="content/images/logo.png" alt="logo" class="brand-logo">
		</div>
		<nav class="navbar" id="navMenu">

			<div class="nav-content">
				<a href="index.php" class="nav-item active">Home</a>
				<a href="about.php" class="nav-item">About</a>
				<a href="services.php" class="nav-item active">Services</a>
				<a href="contacts.php" class="nav-item">Contacts</a>
				<a href="signin.php" class="nav-item nav-button">Sign-in &nbsp<i class="fa fa-sign-in"></i></a>
				<a href="signup.php" class="nav-item nav-button">Sign-up &nbsp<i class="fa fa-user-plus"></i></a>
			</div>
		</nav>
	</header>
    <main>
    	<section class="sub_hero">
            <div class="sub_hero_container">
                <h1 style="font-size: 48px"><?php echo $row['name']; ?></h1>
            </div>
        </section>
    	<div class="package">
    		<div class="single-package-details">
    			<div class="image">
    				<img src="content/uploads/<?php echo $row['image']; ?>" class="single-package-img">
    			</div>
    			<div class="details">
	    			<h4 class="desc-title">Description</h4>
	    			<p class="single-package-desc"><?php echo $row['description']; ?></p>
	    			<h4 class="feature-title">Feature</h4>
	    			<p class="single-package-feature"><?php echo $row['feature']; ?></p>
	    			<p class="single-package-price">LKR <?php echo $row['price']; ?>.00</p>
	    		</div>
    		</div>
    	</div>

    </main>
    <footer>
		<div class="container">
			<div class="left-content">
				<a href="#"><img src="content/images/logo_black.png" alt="logo"></a>
				<p>Our mission is to revolutionize wildlife safaris through our innovative Safari Management System. We strive to simplify the safari experience for operators and travelers alike while prioritizing the conservation of wildlife and their habitats.</p>
			</div>
			<div class="center-content">
				<h3>Quick Links</h3>
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#about">About Us</a></li>
					<li><a href="#products">Products</a></li>
					<li><a href="#contact">Contact Us</a></li>
					<li><a href="#policy">Privacy Policy</a></li>
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