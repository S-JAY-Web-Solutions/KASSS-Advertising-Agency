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

$search = mysqli_query($conn,"SELECT * FROM packages;");
$searchrowcount = mysqli_num_rows($search);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KASSS Advertising Agency</title>

	<link rel="stylesheet" type="text/css" href="css/package_style.css">
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
                    <a href="contact.php" class="side-nav-link"><li class="side-nav-item">Manage Contacts</li></a>
                    <a href="quotation.php" class="side-nav-link"><li class="side-nav-item">Manage Quotations</li></a>
                    <a href="packages.php" class="side-nav-link"><li class="side-nav-item sub-active">Manage Packages</li></a>

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
                    <div class="package-details">
                        <div class="add-package">
                            <h2 style="text-align: center;">Add New Package</h2>
                            <form action="package.inc.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title">Title</label><br>
                                    <input type="text" name="title" class="form-item">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label><br>
                                    <input type="file" name="image" class="form-item" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label><br>
                                    <textarea name="description" class="form-item"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="feature">Feature</label><br>
                                    <input type="text" name="feature" class="form-item">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price (LKR)</label><br>
                                    <input type="number" name="price" class="form-item">
                                </div>
                                <div class="form-group">
                                    <label for="feature">Status</label><br>
                                    <select name="status" class="form-item">
                                        <option value="" selected disabled>Select Status</option>
                                        <option value="draft">Draft</option>
                                        <option value="publish">Publish</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" id="submit-btn">
                                </div>
                            </form>
                        </div>
                        <br><hr><br>
                        <div class="old-packages">
                            <table class="package_table">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Features</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                if ($searchrowcount > 0) {
                                    while($searchrow = mysqli_fetch_assoc($search)) {
                                        echo "<tr>
                                                <td id='id'>".$searchrow["id"]."</td>
                                                <td>".$searchrow["name"]."</td>
                                                <td>".$searchrow["feature"]."</td>
                                                <td> LKR ".$searchrow["price"].".</td>
                                                <td id='status'>";  
                                                if($searchrow['status'] == 0){
                                                    echo 'Draft';
                                                }else{
                                                    echo 'Publish';
                                                } 
                                            echo"</td>
                                                <td><div class='action_btn'>
                                                        <a href='editpackage.php?id=".$searchrow["id"]."' id='edit'><i class='fa fa-edit'></i></a>
                                                        <a href='deletepackage.php?id=".$searchrow["id"]."' id='delete'><i class='fa fa-trash'></i></a>
                                                    </div>
                                                </td>
                                            </tr>";
                                    }
                                }else {
                                    echo "<div class='notify'>0 results found.</div>";
                                }
                                ?>
                            </table>
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