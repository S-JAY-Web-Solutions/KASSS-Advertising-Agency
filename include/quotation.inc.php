<?php

	require_once('../config.php');


	date_default_timezone_set('Asia/Colombo');

	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phonenumber = $_POST['number'];
		$message = $_POST['message'];
		$date = date("Y-m-d");

		$sql = mysqli_query($conn,"INSERT INTO quotation(name,email,phoneNumber,message,date) VALUES('$name','$email','$phonenumber','$message','$date');");

		if ($sql == TRUE) {
			echo "<script>alert('Inquiry Sent Successfully!!!');window.location='../index.php';</script>";
		}else{
			echo "<script>alert('Inquiry Send Failed!!!');window.location='../index.php';</script>";
		}
	}

?>