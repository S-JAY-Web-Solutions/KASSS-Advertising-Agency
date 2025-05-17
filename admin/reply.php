<?php
require_once('../config.php');
session_start();
if (empty($_SESSION['userid']) || empty($_SESSION['email'])) {
    header('location:../signin.php');
}

$id = $_SESSION['userid'];
$email = $_SESSION['email'];

$sql = mysqli_query($conn,"SELECT * FROM users WHERE id='$id' AND email = '$email';");
$row = mysqli_fetch_assoc($sql);

if (empty($_GET['id'])) {
	header('location:contact.php');
}
if (isset($_GET['id'])) {
	$contact_id = $_GET['id'];

    $search = mysqli_query($conn,"SELECT * FROM contacts WHERE id='$contact_id';");
    $searchrow = mysqli_fetch_assoc($search);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KASSS Advertising Agency</title>

	<link rel="stylesheet" type="text/css" href="css/contact_styles.css">
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
                <h2>Admin Dashboard</h2>
                <ul class="side-nav-bar">
                    <a href="index.php" class="side-nav-link"><li class="side-nav-item ">Dashboard</li></a>
                    <a href="contact.php" class="side-nav-link"><li class="side-nav-item sub-active">Manage Contacts</li></a>
                    <a href="quotation.php" class="side-nav-link"><li class="side-nav-item">Manage Quotations</li></a>
                    <a href="packages.php" class="side-nav-link"><li class="side-nav-item">Manage Packages</li></a>

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
                        <span class="box-title">Ongoing Orders : </span>
                        <span class="box-count">05</span>
                    </div>
                    <div class="box">
                        <span class="box-title">Completed Orders : </span>
                        <span class="box-count">04</span>
                    </div>
                    <div class="box">
                        <span class="box-title">Total Fee : </span>
                        <span class="box-count">LKR 55,000.00</span>
                    </div>
                </div>
                <div class="bottom">
                    <div class="contact-forms">
                        <div class="form-view">
                            <form action="action.inc.php" method="POST">
                            <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($searchrow['id'] ?? ''); ?>" hidden>
                            <div class="form-group">
                                <label for="name">Name</label><br>
                                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($searchrow['name'] ?? ''); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label><br>
                                <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($searchrow['email'] ?? ''); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label><br>
                                <input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($searchrow['subject'] ?? ''); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label><br>
                                <input type="text" id="message" name="message" value="<?php echo htmlspecialchars($searchrow['message'] ?? ''); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label><br>
                                <input type="text" id="date" name="date" value="<?php echo htmlspecialchars($searchrow['date'] ?? ''); ?>" readonly>
                            </div>
                            <?php
                            if($searchrow['status'] == 0){ ?>
                            <h2 id="reply_title">Type Your Reply Here!!!</h2>
                                <div class="form-group">
                                    <label for="reply">Reply Message</label><br>
                                    <input type="text" id="reply" name="reply_msg" value="<?php echo htmlspecialchars($searchrow['reply'] ?? ''); ?>" required>
                                </div>
                            <?php   } else{
                                echo 'You already replied to this message';
                            } ?>
                            <div class="form-btn">
                                <a href="contact.php" id="back-btn">Back</a>
                                <button type="submit" id="reply-btn" name="reply">Reply </button>
                                <a href="action.inc.php?id=<?php echo"$contact_id"; ?>&delete=true" id="delete-btn">Delete</a>                            
                            </div>
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

