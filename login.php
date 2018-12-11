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
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
	<script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<style type="text/css">
		/* LOGIN PAGE */
		.main-section{
		  margin: 0 auto;
		  margin-top: 30%;
		  padding: 0;
		}
		.modal-content{
		  background-color: #2E4053;
		  opacity: .95;
		  padding: 0 18px; 
		  box-shadow: 0px 0px 3px #848484;
		}
		.form-group{
		  margin-top: 30px;
		}
		.form-group:last-of-type{
		  margin-top: -5px;
		  margin-bottom: 15px;
		}
		.form-group input{
		  height: 42px;
		  border-radius: 5px;
		  border: 0;
		  font-size: 18px;
		  padding-left: 54px;
		}
		.form-group::before{
		  font-family: 'Font Awesome\ 5 Free';
		  content: "\f007";
		  position: absolute;
		  font-size: 22px;
		  color: #555e60;
		  left: 28px;
		  padding-top: 4px;
		}
		.form-group:last-of-type::before{
		  content: "\f023";
		}
		button{
		  width: 60%;
		  margin: 5px 0 5px;
		}
		.btn-signin{
		  background-color: #445c75;
		  color: #fff;
		  font-size: 19px;
		  padding: 7px 14px;
		  border-radius: 5px;
		  border-bottom: 4px solid #3b5070;
		}
		.btn-signin:hover, .btn-signin:focus{
		  background-color: #27364c!important;
		  border-bottom: 4px solid #27364c!important;
		}
		.svg-inline--fa{
		  font-size: 20px;
		  margin-right: 7px;
		}

		.forgot a{
		  color: #c2fbfe;
		}

		.forgot p{
		  font-size: 0.9em;
		  color: #FFF;
		  margin-top: -15px;
		}

		.forgot p:last-of-type{
		  margin-top: -15px;
		}
		.form-check-inline{
			font-size: 0.9em;
			color: #FFF;
		}

		/* END OF LOGIN PAGE */
	</style>
</head>
<body>
	<?php include('includes/header.php');?>

	<?php
	error_reporting(0);
	if(isset($_POST['login']))
	{
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$account=$_POST['account'];
		$sql ="SELECT username,pass,account FROM users WHERE username=:username and pass=:password and account=:account";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':username', $username, PDO::PARAM_STR);
		$query-> bindParam(':password', $password, PDO::PARAM_STR);
		$query-> bindParam(':account', $account, PDO::PARAM_STR);
		$query-> execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		if($query->rowCount() > 0)
		{
			$_SESSION['username']=$_POST['username'];
			if($account=='attendee'){
				$_SESSION['login']=$_POST['username'];
				echo "<script type='text/javascript'> document.location = 'attendee.php'; </script>";
			}elseif ($account == 'organizer') {
				$_SESSION['organizerlogin']=$_POST['username'];
				echo "<script type='text/javascript'> document.location = 'eventlist.php'; </script>";
			}
		} else{
			$_SESSION['msg']="Incorrect username or password. Please try again.";
			header('location:success.php');
			//echo "<script>alert('Invalid Details');</script>";

		}
	}

	?>

	<div class="modal-dialog text-center">
		<div class="col-sm-8 main-section">
			<div class="modal-content">

				<form class="col-12 loginform" method="post">
					<div class="form-group">
						<input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" required>
					</div>
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="account" id="organizer" value="organizer" required>
					  <label class="form-check-label" for="organizer">Organizer</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="account" id="attendee" value="attendee" required>
					  <label class="form-check-label" for="attendee">Attendee</label>
					</div>
					<button type="submit" name="login" class="btn-signin"><i class="fas fa-sign-in-alt"></i>Login</button>
				</form>

				<div class="col-12 forgot">
					<p>New user? <a href="signup.php">Create new account</a></p>
				</div>

			</div> <!-- End of modal content-->
		</div>
  	</div>

</body>
</html>