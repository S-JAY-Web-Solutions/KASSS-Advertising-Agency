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

	<link rel="stylesheet" type="text/css" href="css/profile_style.css">
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
                    <a href="profile.php" class="side-nav-link"><li class="side-nav-item sub-active">My Account</li></a>
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
                        <marquee>
                            <h2> Welcome <?php echo $row['name']; ?>  &nbsp Welcome <?php echo $row['name']; ?> &nbsp Welcome <?php echo $row['name']; ?></h2> 
                        </marquee>
                    </div>
                </div>
                <div class="bottom">
                    <div class="account_details">
                        <form action="update.php" method="POST">
                            <h2 style="text-align: center;padding: 20px 0px;">Your Account Informations</h2>
                            <div class="row_details">
                                <div class="form-group">
                                    <label for="name"><i class="fa fa-user"></i> Name</label><br>
                                    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email"><i class="fa fa-envelope"></i> Email</label><br>
                                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                                </div>
                            </div>
                            <div class="row_details">
                                <div class="form-group">
                                    <label for="phonenumber"><i class="fa fa-phone"></i> Phone Number</label><br>
                                    <input type="text"  name="phonenumber" value="<?php echo $row['phoneNumber']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="username"><i class="fa fa-user"></i> Username</label><br>
                                    <input type="text"  name="username" value="<?php echo $row['username']; ?>" required>
                                </div>
                            </div>
                            <br><br>
                            <input type="text" id="id" name="id" value="<?php echo $row['id']; ?>" hidden>
                            <input type="submit" name="acc_submit" class="update-btn" value="Update">
                        </form>
                        <form action="update.php" method="POST">
                            <h2 style="text-align: center;padding: 20px 0px;">Your Account Login Informations</h2>
                            <div class="form-group-login">
                                <label for="username"><i class="fa fa-user"></i> Username</label><br>
                                <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" required>
                            </div>
                            <div class="form-group-login">
                                <label for="password"><i class="fa fa-lock"></i> New Password</label><br>
                                <input type="password" id="password" name="password" required>
                            </div>
                            <div class="form-group-login">
                                <label for="repassword"><i class="fa fa-lock"></i> Re Enter New Password</label><br>
                                <input type="password" id="repassword" name="repassword"  required>
                            </div>
                            <br><br>
                            <input type="text" id="id" name="id" value="<?php echo $row['id']; ?>" hidden>
                            <input type="submit" name="login_update" class="login_update-btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>