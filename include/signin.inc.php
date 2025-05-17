<?php
if(isset($_POST['submit'])){
	require_once('../config.php');


	$username = $_POST['username'];
	$password = $_POST['password'];

	function uidExists($conn,$username){
		$sql = "SELECT * FROM users WHERE username = ? OR email= ?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:../signin.php?error=stmtfailed");
		}

		mysqli_stmt_bind_param($stmt, "ss", $username,$username);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($result)) {
			return $row;
		}else{
			return false;
		}
	}

	function emptyInputs($username,$password){
		$result;
		if (empty($username) || empty($password)) {
			$result = true;
		}else{
			$result = false;
		}
		return $result;
	}

	function loginUser($conn,$username, $password){
		$uidExists = uidExists($conn, $username);
		if ($uidExists === false) {
			header("Location:../signin.php?error=invalidusername");
			exit();
		}


		$checkpw = password_verify($password,$uidExists['password']);
		if ($checkpw === false) {
			header("Location:../signin.php?error=invalidpassword");
			exit();
		}else if( $checkpw === true){
			session_start();
			$_SESSION['userid'] = $uidExists["id"];
			$_SESSION['username'] = $uidExists["username"];
			$_SESSION['email'] = $uidExists["email"];

			if ($uidExists['post'] == 'customer') {
				header("Location:../user/index.php");
			}else if($uidExists['post'] == 'admin'){
				header("Location:../admin/index.php");
			}
			
			exit();
		}
	}

	if (emptyInputs($username,$password) !== false) {
		header("Location:../signin.php?error=emptycredentials");
		exit();
	}

	loginUser($conn,$username,$password);

}
else{
	header('Location:../signin.php');
}
?>