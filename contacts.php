<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KASSS Advertising Agency</title>

	<link rel="stylesheet" type="text/css" href="content/css/contacts_style.css">
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
				<a href="services.php" class="nav-item">Services</a>
				<a href="contacts.php" class="nav-item active">Contacts</a>
				<a href="signin.php" class="nav-item nav-button">Sign-in &nbsp<i class="fa fa-sign-in"></i></a>
				<a href="signup.php" class="nav-item nav-button">Sign-up &nbsp<i class="fa fa-user-plus"></i></a>
			</div>
		</nav>
	</header>

	<main>
        <section class="sub_hero">
            <div class="sub_hero_container">
                <h1>Contact Us</h1>
            </div>
        </section>
        <section class="info">
            <div class="container">
                <?php
                    if(isset($_GET['notify'])){
                        if($_GET['notify'] == 'success'){
                            echo '<div class="notify"> Successfully Sent a Contacts Form!! </div>';
                        }
                    }else if (!isset($_GET['notify']) OR isset($_GET['notify']) AND $_GET['notify'] =='failed' ) {
                        ?>
                    <div class="form">
                        <h2>Send a Message Now!!</h2>
                        <form action="include/contacts.inc.php" method="POST">
                            <div class="form-group">
                                <label for="full_name"><i class="fa fa-user"></i> Full Name</label><br>
                                <input type="text" name="full_name" placeholder="John Doe" class="form-item" required>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fa fa-envelope"></i> E-mail</label><br>
                                <input type="email" name="email" placeholder="john@example.com" class="form-item" required>
                            </div>
                            <div class="form-group">
                                <label for="subject"><i class="fa fa-folder"></i> Subject</label><br>
                                <input type="text" name="subject" placeholder="Regarding about consultation" class="form-item" required>
                            </div>
                            <div class="form-group">
                                <label for="message"><i class="fa fa-send"></i> Message</label><br>
                                <textarea name="message" class="form-item-textarea" placeholder="Your message...." required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn-submit" name="submit">
                            </div>
                        </form>
                    </div>
                <?php } ?>
                <div class="information">
                    <div class="content">
                        <h2>Contact informations</h2>
                        <div class="info-box">
                            <i class="fa fa-map-marker"></i> &nbsp
                            <p>931/10, Kajugahawaththa Rd, Gothatuwa</p>
                        </div>
                        <div class="info-box">
                            <i class="fa fa-phone"></i>  &nbsp
                            <p>+94 70 3999 709 | +94 77 497 0990</p>
                        </div>
                        <div class="info-box">
                            <i class="fa fa-envelope"></i>  &nbsp
                            <p>contact@kasss.lk | hello@kasss.lk</p>
                        </div>
                    </div>
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