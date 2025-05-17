<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KASSS Advertising Agency</title>

	<link rel="stylesheet" type="text/css" href="content/css/home_style.css">
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
				<a href="index.php" class="nav-item active">Home</a>
				<a href="about.php" class="nav-item">About</a>
				<a href="services.php" class="nav-item">Services</a>
				<a href="contacts.php" class="nav-item">Contacts</a>
				<a href="signin.php" class="nav-item nav-button">Sign-in &nbsp<i class="fa fa-sign-in"></i></a>
				<a href="signup.php" class="nav-item nav-button">Sign-up &nbsp<i class="fa fa-user-plus"></i></a>
			</div>
		</nav>
	</header>
	<main>
		<div class="home-hero">
			<div class="left-hero">
				<h2 class="subtitle">Welcome to<br>KASSS Advertising</h2>
				<p class="description">KASSS Advertising is a full-service advertising agency dedicated to helping businesses grow their brands and achieve their marketing goals.</p>
				<a href="services.php"><button class="hero-btn" id="btn1">Shop Now <i class="fa fa-shopping-cart"></i></button></a>
				<a href="contacts.php"><button class="hero-btn" id="btn2">Contact Us <i class="fa fa-phone"></i></button></a>	
			</div>
			<div class="right-hero">
				<img src="content/images/hero-girl.png" alt="advertisement image">
			</div>
		</div>
		<section class="short-about">
			<div class="overlay">
				<div class="short-about-content">
					<h3 class="section-title">Who We Are?</h3>
					<p class="section-desc">At our online advertising agency, we're not just marketers; we're storytellers in the digital realm. With three years of experience, we've mastered the art of blending creativity with strategy to create compelling campaigns that leave a lasting impression.</p>
					<p class="section-desc">Every click, every impression, and every interaction is a chance to craft a narrative that resonates with our audience. From conceptualization to execution, we're committed to delivering results that exceed expectations and elevate brands to new heights in the digital landscape.</p>
					<p class="section-desc">Join us as we continue to push boundaries, break barriers, and redefine what's possible in online advertising. Let's embark on this journey together and make your brand's story one that's unforgettable.</p>
				</div>
			</div>
		</section>
		<section class="testimonial">
			<div class="container">
				<h3>Testimonial</h3>
				<div class="content">
					<?php 
					require_once('config.php');
					$sql = mysqli_query($conn,"SELECT * FROM feedback ORDER BY RAND() LIMIT 4;");
					$rowcount = mysqli_num_rows($sql);

					if ($rowcount > 0) {
						while ($row = mysqli_fetch_assoc($sql)) {
							$userID =  $row['userID'];
							$search = mysqli_query($conn,"SELECT * FROM users WHERE id ='$userID';");
							$result = mysqli_fetch_assoc($search);
							echo "<div class='review-box'>
									<img src='content/images/person1.jpg' alt='person'>
									<h4>".$result['name']."</h4>
									<div class='social-icons'>
										<a href='#''><i class='fa fa-facebook'></i></a>
										<a href='#'><i class='fa fa-twitter'></i></a>
										<a href='#''><i class='fa fa-google-plus'></i></a>
										<a href='#''><i class='fa fa-linkedin'></i></a>
										<a href='#'><i class='fa fa-instagram'></i></a>
									</div>
									<p><i class='fa fa-quote-left'></i>
										".$row['feedback']."
										<i class='fa fa-quote-right'></i> </p>
									</div>";
						}
					}
					?>
					
				</div>
			</div>
		</section>
		<section class="quote-form">
			<div class="left-content">
				<img src="content/images/ad1.png"  alt="advertisement">
			</div>
			<div class="center-content">
				<h3>Get a quote</h3>
				<form action="include/quotation.inc.php" method="POST">
					<div class="form-group">
						<label for="name">Name</label><br>
						<input type="text" class="form-item" name="name" placeholder="Your Name.." id="name" required>
					</div>
					<div class="form-group">
						<label for="email">Email</label><br>
						<input type="email" class="form-item" name="email" placeholder="Your Email" id="email" required>
					</div>
					<div class="form-group">
						<label for="number">Phone Number</label><br>
						<input type="number" class="form-item" name="number" placeholder="Contact Number" id="number" required>
					</div>
					<div class="form-group">
						<label for="message">Message</label><br>
						<textarea  rows="10" cols="80" name="message" placeholder="Type your message here..." id="message"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn-submit">
					</div>

				</form>
			</div>
			<div class="right-content">
				<img src="content/images/ad2.png" alt="advertisement">
			</div>
		</section>
		<section class="home-services">
			<div class="title">
				<h2>Our Services</h2>
			</div>
			
			<marquee class="promo-marquee">Get 10% Discount | Use Promocode: #KASSS &nbsp &nbsp &nbsp Get 10% Discount | Use Promocode: #KASSS  &nbsp &nbsp &nbsp Get 10% Discount | Use Promocode: #KASSS  &nbsp &nbsp &nbsp Get 10% Discount | Use Promocode: #KASSS</marquee>
			<div class="container">
				<div class="services-content">
					<?php 
					require_once('config.php');
					$sql = mysqli_query($conn,"SELECT * FROM packages ORDER BY RAND() LIMIT 4;");
					$rowcount = mysqli_num_rows($sql);

					if ($rowcount > 0) {
						while ($row = mysqli_fetch_assoc($sql)) {
							echo "<div class='service-box'>
									<img src='content/uploads/".$row['image']."' alt='product image'>
									<h3 class='prodcut-name'>".$row['name']."</h3>
									<p class='product-price'>LKR ".$row['price']."</p>
									<p class='product-desc'>".$row['description']."</p>
									<a href='service_view.php?id=".$row['id']."' class='view-package-link'>View Package</a>
									</div>";
						}
					}
					?>
					
				</div>
			</div>
		</section>
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