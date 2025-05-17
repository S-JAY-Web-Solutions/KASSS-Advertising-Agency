<?php
require_once('../config.php');
session_start();
if (empty($_SESSION['userid']) || empty($_SESSION['email'])) {
    header('location:../signin.php');
}

$id = $_SESSION['userid'];
$email = $_SESSION['email'];

date_default_timezone_set('Asia/Colombo');

if (isset($_POST['submit'])) {
	$name = $_POST['title'];
	$description = addslashes($_POST['description']);
	$feature = $_POST['feature'];
	$price = $_POST['price'];
	$status = $_POST['status'];
	$date = date("Y-m-d");

	
	$target_file =  basename($_FILES["image"]["name"]);
	$move_file = move_uploaded_file($_FILES["image"]["tmp_name"], '../content/uploads/' . $target_file);

	if ($status == 'publish') {
		$status = 1;
	}else if ($status == 'draft') {
		$status = 0;
	}

	if ($move_file === TRUE) {
		$insert = mysqli_query($conn,"INSERT INTO packages(name,image,description,feature,price,status,date) VALUES ('$name','$target_file','$description','$feature','$price','$status','$date');");

		if ($insert == TRUE) {
			echo '<script>alert("Package Added Successfully!!"); window.location = "packages.php";</script>';
		}else{
			echo '<script>alert("Package Adding Failed!!"); window.location = "packages.php";</script>';
		}
	}
}

if (isset($_POST['edit'])) {
	$id = $_POST['id'];
	$name = $_POST['title'];
	$description = addslashes($_POST['description']);
	$feature = $_POST['feature'];
	$price = $_POST['price'];
	$status = $_POST['status'];

	if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
		
		$target_file =basename($_FILES["image"]["name"]);
		$move_file = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

		$update1 = mysqli_query($conn,"UPDATE packages SET image = '$target_file' WHERE id = '$id';");

		if ($move_file == TRUE) {
			if ($update1 == FALSE) {
			echo '<script>alert("Image Updating Failed!!"); window.location = "packages.php";</script>';
			}
		}
	}

	if ($status == 'publish') {
		$status = 1;
	}else if ($status == 'draft') {
		$status = 0;
	}

	$update2 = mysqli_query($conn,"UPDATE packages SET name= '$title',description='$description',feature = '$feature',price = '$price', status = '$status' WHERE id = '$id';");

	if ($update2 == TRUE) {
		echo '<script>alert("Package Updated Successfully!!"); window.location = "packages.php";</script>';
	}else{
		echo '<script>alert("Package Updating Failed!!"); window.location = "packages.php";</script>';
	}
}

if (isset($_POST['yes'])) {
	
	$id = $_POST['id'];

	$delete = mysqli_query($conn,"DELETE FROM packages WHERE id = '$id';");

	if ($delete === TRUE) {
		echo '<script>alert("Package Deleted Successfully!!"); window.location = "packages.php";</script>';
	}else{
		echo '<script>alert("Package Deleting Failed!!"); window.location = "packages.php";</script>';
	}
}

if (isset($_POST['no'])) {
	echo '<script>alert("Package Did Not Delete!!"); window.location = "packages.php";</script>';
}


?>