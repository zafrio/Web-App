<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Confirmation</title>
	<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
	<script src='//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src='//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
	<script src='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<style type="text/css">
		#wrapper {
		  width: 100%;
		  margin: 0 auto;
		  margin-top: 12%;
		}
		h1 {
		  color: #2E4053;
		  text-shadow: -1px -2px 3px rgba(17, 17, 17, 0.3);
		  text-align: center;
		  font-family: "Poppins", sans-serif;
		  font-weight: 900;
		  text-transform: uppercase;
		  font-size: 80px;
		  margin-bottom: -5px;
		}
		h1 underline {
		  border-top: 5px solid #2E4053;
		  border-bottom: 5px solid #2E4053;
		}
		h3 {
			margin-top: 40px;
			text-align: center;
		  width: 100%;
		  font-family: "Poppins", sans-serif;
		  font-weight: 300;
		  color: #2E4053;
		}
	</style>
</head>
<body>
	<?php include('includes/header.php');?>

	<div id="wrapper">
		<h1>
		  <underline>Confirmation</underline>
		</h1>
		<h3>
		  <?php echo htmlentities($_SESSION['msg']);?>
		</h3>
	</div>

</body>
</html>