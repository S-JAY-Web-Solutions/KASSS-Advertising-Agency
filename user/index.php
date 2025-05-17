<?php
session_start();
if (empty($_SESSION['userid']) || empty($_SESSION['email'])) {
    header('location:../signin.php');
}

$id = $_SESSION['userid'];
$email = $_SESSION['email'];

require_once('../config.php');


$sql = mysqli_query($conn,"SELECT * FROM users WHERE id='$id' AND email = '$email';");
$row = mysqli_fetch_assoc($sql);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KASSS Advertising Agency</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>
<body>
	<header class="header">
		<div class="brand">
			<img src="../content/images/logo-width.png" alt="logo" class="brand-logo">
		</div>
		<nav class="navbar" id="navMenu">
			<div class="nav-content">
				<a href="../index.php" class="nav-item">Home</a>
				<a href="../about.php" class="nav-item">About</a>
				<a href="../services.php" class="nav-item">Services</a>
				<a href="../contacts.php" class="nav-item">Contacts</a>
				<a href="logout.php" class="nav-item nav-button">Sign-out &nbsp<i class="fa fa-sign-out"></i></a>
			</div>
		</nav>
	</header>
    <main>
        <div class="container">
            <div class="side-nav">
                <h2>User Dashboard</h2>
                <ul class="side-nav-bar">
                    <a href="index.php" class="side-nav-link"><li class="side-nav-item sub-active">Dashboard</li></a>
                    <a href="feedback.php" class="side-nav-link"><li class="side-nav-item">Feedback</li></a>
                    <a href="profile.php" class="side-nav-link"><li class="side-nav-item">My Account</li></a>
                    <a href="delete.php" class="side-nav-link"><li class="side-nav-item">Delete Account</li></a>

                    <a href="logout.php" class="side-nav-link"><li class="side-nav-item side-nav-logout">Logout &nbsp<i class="fa fa-sign-out"></i></li></a>
                </ul>
            </div>
            <div class="content">
                <div class="top">
                    <div class="account">
                        <img src="images/avatar.png" alt="user avatar">
                        <h3><?php echo $row['username']; ?></h3>
                    </div>
                    <div class="icons">
                        <i class="fa fa-bell"></i>
                        <a href="profile.php" style="color: white;"><i class="fa fa-cogs"></i></a>
                    </div>
                </div>
                <div class="middle">
                    <div class="box">
                        <span class="box-title">Ongoing Campaign : </span>
                        <span class="box-count">05</span>
                    </div>
                    <div class="box">
                        <span class="box-title">Completed Campaign : </span>
                        <span class="box-count">04</span>
                    </div>
                    <div class="box">
                        <span class="box-title">Total Payments : </span>
                        <span class="box-count">LKR 55,000.00</span>
                    </div>
                </div>
                <div class="bottom">
                    <div class="table1">
                        <table border="1" style="border-collapse: collapse;">
                            <caption>Campaign  Information</caption>
                            <tr>
                                <th>No.</th>
                                <th>Campaign Name</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>New Product Boost</td>
                                <td>25/04/2024</td>
                                <td>Completed</td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>FB Page Boost</td>
                                <td>04/04/2024</td>
                                <td>Completed</td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>FB Page Boost</td>
                                <td>15/03/2024</td>
                                <td>Completed</td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>New Ad Campaign</td>
                                <td>01/01/2024</td>
                                <td>Completed</td>
                            </tr>
                        </table>
                        <button class="table-btn camp-inf">View More</button>
                    </div>
                    
                    <div class="table2">
                        <table border="1" style="border-collapse: collapse;">
                            <caption>Payment  Information</caption>
                            <tr>
                                <th>No.</th>
                                <th>Payment Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>LKR 3000.00</td>
                                <td>01/01/2024</td>
                                <td>Approved</td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>LKR 1000.00</td>
                                <td>01/01/2024</td>
                                <td>Approved</td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>LKR 2500.00</td>
                                <td>01/01/2024</td>
                                <td>Approved</td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>LKR 4000.00</td>
                                <td>01/01/2024</td>
                                <td>Approved</td>
                            </tr>
                        </table>
                        <button class="table-btn pay-inf">View More</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>