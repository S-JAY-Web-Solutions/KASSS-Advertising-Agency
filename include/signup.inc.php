<?php
	require_once('../config.php');


	function emptyInputs($name,$email,$pnum,$username,$password,$repassword){
		if (empty($name) || empty($email) || empty($pnum) || empty($username) || empty($password) || empty($repassword)) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function checkPw($password,$repassword){
		if ($password !== $repassword ) {
			return FALSE;
		}else{
			return TRUE;
		}
	}

	function usernameExist($conn,$username){
		$sql = mysqli_query($conn , "SELECT * FROM users WHERE username = '$username';");
		$result = mysqli_fetch_assoc($sql);
		if (!empty($result)) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function accountExist($conn,$email){
		$sql = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email';");
		$result = mysqli_fetch_assoc($sql);

		if (!empty($result)) {
			return TRUE;
		}else{
			return FALSE;
		}
	}


	function createaccount($conn,$name,$email,$pnum,$username,$password){

		$hashed_pw = password_hash($password, PASSWORD_DEFAULT);

		$sql = mysqli_query($conn, "INSERT INTO users(name,email,phoneNumber,username,password) VALUES ('$name','$email','$pnum','$username','$hashed_pw')");
		if ($sql === TRUE) {
			return TRUE;
		}else{

			echo "<script>alert('User Account Creation Failed!');window.location='../signup.php';</script>";
			exit();
		}
	}

	function loginuser($conn,$username,$email,$password){

		$checkPw = verifyPw($conn,$email,$password);

		if ($checkPw === TRUE) {
			$sql = mysqli_query($conn , "SELECT * FROM users WHERE username = '$username' OR email = '$email' AND password ='$password';");
			
			if ($row = mysqli_fetch_assoc($sql)) {
				session_start();
				$_SESSION['userid'] = $row["id"];
				$_SESSION['username'] = $row["username"];
				$_SESSION['email'] = $row["email"];

				echo "<script>alert('Logged in to Account Successfully!');window.location='../user/index.php';</script>";
			}
		}
	}

	function verifyPw($conn,$email,$password){
		$sql = mysqli_query($conn , "SELECT * FROM users WHERE email = '$email';");
		$row = mysqli_fetch_assoc($sql);

		$result = password_verify($password, $row['password']);

		if ($result === TRUE) {
			return TRUE;
		}else{
			header('Location:../signin.php?error=passwordunmatched');
			exit();
		}	
	}


	if ($_POST['submit']) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pnum = $_POST['phonenumber'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$repassword = $_POST['confirmpassword'];

		$emptyInputs = emptyInputs($name,$email,$pnum,$username,$password,$repassword);
		$checkpw = checkPw($password,$repassword);
		$usernameExist = usernameExist($conn,$username);
		$accountExist = accountExist($conn,$email);

		if ($emptyInputs === TRUE) {
			header('Location:../signup.php?error=emptyinputs');
			exit();
		}
		if ($checkpw === FALSE) {
			header('Location:../signup.php?error=passwordcheck');
			exit();
		}
		if ($usernameExist === TRUE) {
			header('Location:../signup.php?error=usernameexist');
			exit();
		}
		if ($accountExist === TRUE) {
			header('Location:../signup.php?error=accountexist');
			exit();
		}

		$createaccount = createaccount($conn,$name,$email,$pnum,$username,$password);

		if ($createaccount === TRUE) {
			echo "<script>alert('User Account Created Successfully!');</script>";
			loginuser($conn,$username,$email,$password);
		}
	}
	else{
		echo "hi";
	}
?>