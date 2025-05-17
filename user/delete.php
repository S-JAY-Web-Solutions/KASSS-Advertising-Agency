<?php
session_start();
if (empty($_SESSION['userid']) || empty($_SESSION['email'])) {
    header('location:../login.php');
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

	<link rel="stylesheet" type="text/css" href="css/delete.css">
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
                    <a href="index.php" class="side-nav-link"><li class="side-nav-item ">Dashboard</li></a>
                    <a href="feedback.php" class="side-nav-link"><li class="side-nav-item">Feedback</li></a>
                    <a href="profile.php" class="side-nav-link"><li class="side-nav-item">My Account</li></a>
                    <a href="delete.php" class="side-nav-link"><li class="side-nav-item sub-active">Delete Account</li></a>

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
                        <marquee>
                            <h2> Welcome <?php echo $row['name']; ?>  &nbsp Welcome <?php echo $row['name']; ?> &nbsp Welcome <?php echo $row['name']; ?></h2> 
                        </marquee>
                    </div>
                </div>
                <div class="bottom">
                    <div class="alert-box">
                        <div class="container">
                            <form action="delete.inc.php" method="POST">
                                <div class="form-group">
                                    <label for="name"><i class="fa fa-user"></i> Name</label><br>
                                    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="username"><i class="fa fa-user"></i> Username</label><br>
                                    <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email"><i class="fa fa-envelope"></i> Email</label><br>
                                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" readonly>
                                </div>
                                <input type="text" id="id" name="id" value="<?php echo $row['id']; ?>" hidden>
                                <h2 style="text-align: center;">Are you sure?</h2>
                                <div class="form-btn">
                                    <input type="submit" name="no" value="No" class="no_btn">
                                    <input type="submit" name="yes" value="Yes" class="yes_btn">
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>