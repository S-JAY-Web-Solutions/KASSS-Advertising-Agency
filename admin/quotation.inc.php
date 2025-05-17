<?php
require_once('../config.php');
session_start();
if (empty($_SESSION['userid']) || empty($_SESSION['email'])) {
    header('location:../signin.php');
}

$id = $_SESSION['userid'];
$email = $_SESSION['email'];

date_default_timezone_set('Asia/Colombo');

if (isset($_POST['reply'])) {
	$id = $_POST['id'];
	$reply_message = addslashes($_POST['reply_msg']);
	$date = date("Y-m-d");

	$sql = mysqli_query($conn,"UPDATE quotation SET `status`='1',reply='$reply_message',reply_date='$date' WHERE id='$id';");

	if ($sql === TRUE) {
		echo '<script>alert("Successfully Updated Reply!!");window.location="quotation.php";</script>';
	}else{
		echo '<script>alert("Reply Updated Failed!!");window.location="quotation.php";</script>';
	}
}

if (isset($_GET['move'])) {
	$id = $_GET['id'];
	$date = date("Y-m-d");

	$sql = mysqli_query($conn,"UPDATE quotation SET status=1,reply_date='$date' WHERE id='$id';");

	if ($sql === TRUE) {
		echo '<script>alert("Successfully Moved!!");window.location="quotation.php";</script>';
	}else{
		echo '<script>alert("Moving Failed!!");window.location="quotation.php";</script>';
	}
}

if (isset($_GET['delete'])) {
	$id = $_GET['id'];

	$sql = mysqli_query($conn,"DELETE FROM quotation WHERE id='$id';");

	if ($sql === TRUE) {
		echo '<script>alert("Successfully Deleted!!");window.location="quotation.php";</script>';
	}else{
		echo '<script>alert("Deleting Failed!!");window.location="quotation.php";</script>';
	}
}



?>