<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit'])){
	$ename=$_POST['eventname'];
	$etype=$_POST['eventtype'];	
	$evenue=$_POST['eventvenue'];
	$edate=$_POST['eventdate'];
	$edetails=$_POST['eventdetails'];	
	$eimage=$_FILES["eventimage"]["name"];
	move_uploaded_file($_FILES["eventimage"]["tmp_name"],"images/".$_FILES["eventimage"]["name"]);
	$sql="INSERT INTO eventlist(eventname,eventdetails,eventvenue,eventtype,eventimage,eventdate) VALUES(:ename,:edetails,:evenue,:etype,:eimage,:edate)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':ename',$ename,PDO::PARAM_STR);
	$query->bindParam(':edetails',$edetails,PDO::PARAM_STR);
	$query->bindParam(':evenue',$evenue,PDO::PARAM_STR);
	$query->bindParam(':etype',$etype,PDO::PARAM_STR);
	$query->bindParam(':eimage',$eimage,PDO::PARAM_STR);
	$query->bindParam(':edate',$edate,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId){
		$msg="Event Created Successfully";
	} else {
		$error="Something went wrong. Please try again";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create Event</title>
	<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
	<script src='//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src='//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
	<script src='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
	<script src='//use.fontawesome.com/releases/v5.0.8/js/all.js'></script>
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<style type="text/css">
		.errorWrap {
		    padding: 10px;
		    margin: 0 0 20px 0;
		    background: #fff;
		    border-left: 4px solid #dd3d36;
		    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
		    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
		}
		.succWrap{
		    padding: 10px;
		    margin: 0 0 20px 0;
		    background: #fff;
		    border-left: 4px solid #5cb85c;
		    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
		    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
		}
		
		.main-section{
			margin: 0 auto;
			margin-top: 10%;
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
			border: 4px solid #3b5070;
		}
		.btn:hover, .btn:focus{
			background-color: #27364c!important;
			border: 4px solid #27364c!important;
		}
	</style>
</head>
<body>
	<?php include('includes/header.php');?>
		<div class="modal-dialog text-center">
		<div class="col-sm-12 main-section">
			<h3>Create Event</h3>
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
			<div class="modal-content">

				<form class="col-12" name="package" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" class="form-control" name="eventname" id="eventname" placeholder="Event Name" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="eventvenue" id="eventvenue" placeholder=" Event Venue" required>
					</div>

					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="eventtype" id="eventtype" value="Conference" required>
					  <label class="form-check-label" for="Conference" style="color: #FFF;">Conference</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="eventtype" id="eventtype" value="Training" required>
					  <label class="form-check-label" for="Training" style="color: #FFF;">Training</label>
					</div>

					<div class="form-group">
						<input type="date" class="form-control" name="eventdate" id="eventdate" placeholder="Conference/Training" required>
					</div>
					
					<div class="form-group">
						<textarea class="form-control" rows="5" cols="50" name="eventdetails" id="eventdetails" placeholder="Details" required></textarea>
					</div>
					<div class="form-group">
						<input type="file" name="eventimage" id="eventimage" style="color: #FFF;" required>
					</div>

					<button type="submit" name="submit" class="btn-primary btn">Create</button>

					<button type="reset" class="btn-inverse btn">Reset</button>
				</form>

			</div> <!-- End of modal content-->
		</div>
  	</div>
</body>
</html>