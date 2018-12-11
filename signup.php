<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Sign Up</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<style type="text/css">
		.main-section{
			margin: 0 auto;
			margin-top: 15%;
			padding: 0;
		}
		.modal-content{
			background-color: #2E4053;
			opacity: .95;
			padding: 0 18px; 
			box-shadow: 0px 0px 3px #848484;
		}
		.form-group:first-child{
			margin-top: 30px;
		}
		.form-group input{
			text-align: left;
			height: 42px;
			border-radius: 5px;
			border: 0;
			font-size: 18px;
		}
		button{
			width: 40%;
			margin: 15px 0 5px;
		}
		.btn{
			background-color: #445c75;
			color: #fff;
			font-size: 19px;
			padding: 7px 14px;
			border-radius: 5px;
			border-bottom: 4px solid #3b5070;
		}
		.btn:hover, .btn:focus{
			background-color: #27364c!important;
			border-bottom: 4px solid #27364c!important;
		}

		.forgot a{
			color: #c2fbfe;
		}

		.forgot p{
			font-size: 0.9em;
			color: #FFF;
		}

		.forgot p:last-of-type{
			margin-top: -15px;
		}
		.form-check-inline{
			font-size: 0.9em;
			color: #FFF;
		}
	</style>
</head>
<body>
	<?php include('includes/header.php');?>

	<?php
		error_reporting(0);
		if(isset($_POST['submit'])){
			$uname=$_POST['reg_username'];
			$password=md5($_POST['reg_password']);
			$cpassword=md5($_POST['reg_password_confirm']);
			$fullname=$_POST['reg_fullname'];
			$email=$_POST['reg_email'];
			$gender=$_POST['reg_gender'];
			$account=$_POST['reg_account'];
			if($password != $cpassword){
				$_SESSION['msg']="Passwords doesn't match. Please try again.";
				header('location:success.php');
			} else {
				$sql="INSERT INTO  users(username,pass,fullname,email,gender,account) VALUES(:uname,:password,:fullname,:email,:gender,:account)";
				$query = $dbh->prepare($sql);
				$query->bindParam(':uname',$uname,PDO::PARAM_STR);
				$query->bindParam(':password',$password,PDO::PARAM_STR);
				$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
				$query->bindParam(':email',$email,PDO::PARAM_STR);
				$query->bindParam(':gender',$gender,PDO::PARAM_STR);
				$query->bindParam(':account',$account,PDO::PARAM_STR);
				$query->execute();
				$lastInsertId = $dbh->lastInsertId();
				if($lastInsertId){
					$_SESSION['msg']="You are Successfully registered. Now you can login ";
					header('location:success.php');
				} else {
					$_SESSION['msg']="Something went wrong. Please try again.";
					header('location:success.php');
				}
			}
		}
	?>
	<script>
	function checkAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
			url: "check-availability.php",
			data:'user='+$("#reg_username").val(),
			type: "POST",
			success:function(data){
			$("#user-availability-status").html(data);
			$("#loaderIcon").hide();
			},
			error:function (){}
		});
	}
	</script>

	<div class="modal-dialog text-center">
		<div class="col-sm-8 main-section">
			<div class="modal-content">

				<form class="col-12" name="signup" method="post">
					<div class="form-group">
						<input type="text" class="form-control" id="reg_username" onBlur="checkAvailability()" name="reg_username" placeholder="Username" autocomplete="off" required>
						<span id="user-availability-status" style="font-size:12px;"></span>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="Password" required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="reg_password_confirm" name="reg_password_confirm" placeholder="Confirm Password" required>
					</div>
					
					<div class="form-group">
						<input type="text" class="form-control" id="reg_fullname" name="reg_fullname" placeholder="Full Name" autocomplete="off" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="reg_email" name="reg_email" placeholder="Email" autocomplete="off" required>
					</div>

					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="reg_gender" id="male" value="male" required>
					  <label class="form-check-label" for="male">Male</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="reg_gender" id="female" value="female" required>
					  <label class="form-check-label" for="female">Female</label>
					</div>
					<br>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="reg_account" id="organizer" value="organizer" required>
					  <label class="form-check-label" for="organizer">Organizer</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="reg_account" id="attendee" value="attendee" required>
					  <label class="form-check-label" for="attendee">Attendee</label>
					</div>

					<button type="submit" name="submit" class="btn">Sign Up</button>
				</form>

				<div class="col-12 forgot">
					<p>Already have an account? <a href="login.php">Login here</a></p>
				</div>

			</div> <!-- End of modal content-->
		</div>
  	</div>

</body>
</html>