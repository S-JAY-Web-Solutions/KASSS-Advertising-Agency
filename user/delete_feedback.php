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


if (isset($_GET['delete']) && $_GET['delete'] == TRUE) {
	$feedbackid = $_GET['feedbackid'];

	$update = mysqli_query($conn,"DELETE FROM feedback WHERE id = '$feedbackid' AND userID= '$id';");

	if ($update == TRUE) {
		$update2 = mysqli_query($conn,"UPDATE users SET feedback = 0 WHERE id ='$id' AND email = '$email';");

        if ($update2 == TRUE) {
            echo "<script>alert('Feedback Deleted Successfully!!!');window.location='feedback.php';</script>";
        }else{
            echo "<script>alert('Feedback Delete Failed!!!');window.location='feedback.php';</script>";
        }
	}else{
		echo "<script>alert('Feedback Delete Failed!!!');window.location='feedback.php';</script>";
	}
}

?>