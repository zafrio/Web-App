<?php
error_reporting(0);
if(isset($_POST['submit'])){
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "zarona";
	$dbh = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

	$username = mysqli_real_escape_string($dbh, $_POST['reg_username']);
	$password = mysqli_real_escape_string($dbh, $_POST['reg_password']);
	$fullname = mysqli_real_escape_string($dbh, $_POST['reg_fullname']);
	$email = mysqli_real_escape_string($dbh, $_POST['reg_email']);
	$gender = mysqli_real_escape_string($dbh, $_POST['reg_gender']);
	$account = mysqli_real_escape_string($dbh, $_POST['reg_account']);

	if(empty($username) || empty($username) || empty($username) || empty($username) || empty($username) || empty($username)){
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: ../signup.php?signup=email");
			exit();
		} else {
			$sql = "SELECT * FROM users WHERE username = '$username'";
			$result = mysqli_query($dbh, $sql);
			$resultCheck = mysqli_num_rows($result);

			if($resultCheck > 0){
				header("Location: ../signup.php?signup=usertaken");
				exit();
			} else {
				//Hashing the password
				$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
				//Insert the user into the database
				$sql = "INSERT INTO users (username,password,fullname,email,gender,account) VALUES ('$username','$password','$fullname','$email','$gender','$account');";
				mysqli_query($dbh, $sql);
			}
		}
	}
} else {
	header("Location: signup.php");
		exit();
}
?>