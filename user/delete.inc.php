<?php
require_once('../config.php');


if (isset($_POST['yes']) && isset($_POST['id'])) {
	$id = $_POST['id'];
	$email = $_POST['email'];
	$name = $_POST['name'];

	$sql = mysqli_query($conn, "DELETE FROM users WHERE id= '$id' AND email='$email';");

	if ($sql === TRUE) {
		echo "<script>alert('Good bye ". $name .". Your Account Deleted Successfully!!');window.location='../signin.php';</script>";
	}else{
		echo "<script>alert('Your Account Not Deleted!!');window.location='delete.php';</script>";
	}

}
if (isset($_POST['no'])){
	$name = $_POST['name'];

	echo "<script>alert('". $name ." Your Account Not Deleted!!');window.location='index.php';</script>";
}
?>