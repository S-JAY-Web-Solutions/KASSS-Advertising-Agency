<?php

require_once('../config.php');


if (isset($_POST['acc_submit']) && isset($_POST['id'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pnum = $_POST['phonenumber'];
	$username = $_POST['username'];

	$sql = mysqli_query($conn,"UPDATE users SET name='$name',email='$email',phoneNumber='$pnum',username='$username' WHERE id = '$id';");

	if ($sql === TRUE) {
		session_start();
		$_SESSION['userid'] = $id;
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		echo "<script>alert('Account Updated Successfully!!');window.location='profile.php';</script>";
	}else{
		echo "<script>alert('Account Update Failed!!');window.location='profile.php';</script>";
	}
}

if (isset($_POST['login_update']) && isset($_POST['id'])) {
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];

	if ($password != $repassword) {
		echo "<script>alert('Passwords do not match, Please try again!!');window.location='profile.php';</script>";
		exit();
	}

	$hashedPw = password_hash($password, PASSWORD_DEFAULT);

	$sql = mysqli_query($conn,"UPDATE users SET username='$username',password='$hashedPw' WHERE id = '$id';");

	if ($sql === TRUE) {
		echo "<script>alert('Login Credentials Updated Successfully!!');window.location='profile.php';</script>";
	}else{
		echo "<script>alert('Login Credentials Update Failed!!');window.location='profile.php';</script>";
	}
}



?>