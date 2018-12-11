<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submitupdate'])){
	$eid=intval($_GET['id']);
	$ename=$_POST['eventname'];
	$etype=$_POST['eventtype'];	
	$evenue=$_POST['eventvenue'];
	$edate=$_POST['eventdate'];
	$edetails=$_POST['eventdetails'];	
	$eimage=$_FILES["eventimage"]["name"];
	move_uploaded_file($_FILES["eventimage"]["tmp_name"],"images/".$_FILES["eventimage"]["name"]);
	$sql="UPDATE eventlist set eventname=:ename, eventdetails=:edetails, eventvenue=:evenue, eventtype=:etype, eventimage=:eimage, eventdate=:edate where id=:eid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':ename',$ename,PDO::PARAM_STR);
	$query->bindParam(':eid',$eid,PDO::PARAM_STR);
	$query->bindParam(':edetails',$edetails,PDO::PARAM_STR);
	$query->bindParam(':evenue',$evenue,PDO::PARAM_STR);
	$query->bindParam(':etype',$etype,PDO::PARAM_STR);
	$query->bindParam(':eimage',$eimage,PDO::PARAM_STR);
	$query->bindParam(':edate',$edate,PDO::PARAM_STR);

	$query->execute();
	$msg="Event Update Successful";
} elseif (isset($_POST['submitdelete'])) {
	$eid=intval($_GET['id']);
	$ename=strval($_GET['eventname']);
	$sql = "DELETE from eventlist where id=:eid";
	$query = $dbh -> prepare($sql);
	$query -> bindParam(':eid', $eid, PDO::PARAM_STR);
	$query->execute();
	$msg="Event Delete Successful";

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Event</title>
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
	<?php 
	$eid=intval($_GET['id']);
	$sql = "SELECT * from eventlist where id=:eid";
	$query = $dbh -> prepare($sql);
	$query -> bindParam(':eid', $eid, PDO::PARAM_STR);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0){
		foreach($results as $result){	?>
			<div class="modal-dialog text-center">
			<div class="col-sm-12 main-section">
				<h3>Update Event</h3>
	  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
					else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
				<div class="modal-content">

					<form class="col-12" name="package" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<input type="text" class="form-control" name="eventname" id="eventname" placeholder="Event Name" value="<?php echo htmlentities($result->eventname);?>" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="eventvenue" id="eventvenue" placeholder=" Event Venue" value="<?php echo htmlentities($result->eventvenue);?>" required>
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
							<input type="date" class="form-control" name="eventdate" id="eventdate" placeholder="Conference/Training" value="<?php echo htmlentities($result->eventdate);?>" required>
						</div>
						
						<div class="form-group">
							<textarea class="form-control" rows="5" cols="50" name="eventdetails" id="eventdetails" placeholder="Details" required><?php echo htmlentities($result->eventdetails);?></textarea>
						</div>
						<div class="form-group">
							<img src="images/<?php echo htmlentities($result->eventimage);?>" width="200">
							<input type="file" name="eventimage" id="eventimage" style="color: #FFF;" required>
						</div>

						<button type="submit" name="submitupdate" class="btn-primary btn">Update</button>

						<button type="submit" name="submitdelete" class="btn-primary btn">Delete</button>
					</form>

				</div> <!-- End of modal content-->
			</div>
	  		</div>
  	<?php }} ?>
</body>
</html>