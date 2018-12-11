<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit3'])){
	$pid=intval($_GET['id']);
	$sid=strval($_GET['eventname']);
	$username=$_SESSION['login'];
	$sql="INSERT INTO eventattend(eventid,user_name) VALUES(:sid,:username)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':sid',$sid,PDO::PARAM_STR);
	$query->bindParam(':username',$username,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId){
		$msg="Successfull.";
	} else {
		$error="Something went wrong. Please try again";
	}
}
elseif (isset($_POST['submit2'])) {
	$ename=strval($_GET['eventname']);
	$comment=$_POST['comment'];
	$username=$_SESSION['login'];
	$sql="INSERT INTO eventcomment(eventid,eventcomment,user_comment) VALUES(:ename,:comment,:username)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':comment',$comment,PDO::PARAM_STR);
	$query->bindParam(':username',$username,PDO::PARAM_STR);
	$query->bindParam(':ename',$ename,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId){
		$msg2="Successfull.";
	}
	else {
		$error2="Could not add comment. Please try again";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Event</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<style type="text/css">
		body .kotak{
			padding-top: 2%; 
		}
		body .container{
			padding-left: auto;
			padding-right: auto;
			border:1px solid #2E4053;
		}
		figure{
			background-color: #2E4053;
			border-radius: 20px;
			padding-top: 10px;
		}
		figure img{
			border-radius:7px;
		}
		.namagambar{
			text-align: center;
			color: #FFF;
			font-size: 1.1em;
			border: 3px solid #3b5070;
			border-radius: 5px;
			background-color: #445c75;
		}
		.desc{
			text-align: justify;
			color: #FFF;
			padding-bottom: 30px;
			padding: 5px 30px 5px 30px; 
		}

		.btn2{
			background-color: #445c75;
			color: #fff;
			font-size: 17px;
			border-radius: 5px;
			border-bottom: 4px solid #3b5070;
			border-top: 4px solid #3b5070;
			border-left: 4px solid #3b5070;
			border-right: 4px solid #3b5070;
		}
		.btn2:hover, .btn2:focus{
			background-color: #27364c!important;
			border-bottom: 4px solid #27364c!important;
			border-top: 4px solid #27364c!important;
			border-left: 4px solid #27364c!important;
			border-right: 4px solid #27364c!important;
		}

		.modal-content{
			background-color: #2E4053;
			opacity: .95;
			padding: 0 18px 30px; 
			border-color: #2E4053; 
		}
		.form-group input{
			text-align: left;
			height: 42px;
			border-radius: 5px;
			border: 0;
			font-size: 18px;
		}
		button {
			text-align: center;
			width: 100%;
		}
	</style>
</head>
<body>
	<?php include('includes/header.php');?>
	
	<?php 
	$pid=intval($_GET['id']);
	$sid=strval($_GET['eventname']);
	$sql = "SELECT * from eventlist where id=:pid and eventname=:sid";
	$query = $dbh->prepare($sql);
	$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
	$query -> bindParam(':sid', $sid, PDO::PARAM_STR);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0){
		foreach($results as $result){	?>
			<div class="kotak">
			<figure class="container" style="width:65%">
				<form name="attend" method="post">
				    <img src="images/<?php echo htmlentities($result->eventimage);?>" alt="" style="width:100%">
				    <div class="w3-container w3-center">
				      <p class="namagambar"><?php echo htmlentities($result->eventname);?></p>
				    </div>
				    <div>
				      <p class="desc"><?php echo htmlentities($result->eventdetails);?></p>
				    </div>
				    <div>
				      <p style="text-align: center; color: #FFF;"><?php echo htmlentities($result->eventdate);?></p>	
				    </div>
				    <div>
				      <p style="text-align: center; color: #FFF;"><?php echo htmlentities($result->eventvenue);?></p>	
				    </div>
				    <div>
				      <p style="text-align: center; color: #FFF;"><?php echo htmlentities($result->eventtype);?></p>	
				    </div>
				    <?php if($_SESSION['login']){?>
					<button type="submit" name="submit3" class="btn-primary btn2" style="position:relative; width: 50%; left:25%;">Attend</button>
				</form>
				<?php if($error){?><div class="errorWrap" style="color: #FFF; text-align: center;"><?php echo htmlentities($error); ?> </div><?php } 
					else if($msg){?><div class="succWrap" style="color: #FFF; text-align: center;"><?php echo htmlentities($msg); ?> </div><?php }?>
				<div class="container">
				    <div class="modal-content">
						<form class="col-12" name="comment" method="post">
							<div class="form-group">
								<input type="text" class="form-control" id="inviteuser" name="comment" placeholder="Comment about this event" autocomplete="off" required>
							</div>
							<button type="submit2" name="submit2" class="btn2">Comment</button>
						</form>
						<?php if($error2){?><div class="errorWrap" style="color: #FFF; text-align: center;"><?php echo htmlentities($error2); ?> </div><?php } 
					else if($msg2){?><div class="succWrap" style="color: #FFF; text-align: center;"><?php echo htmlentities($msg2); ?> </div><?php }?>
					</div> <!-- End of modal content-->
				</div>
				<?php } else {?> <?php } ?>
			</figure>
			</div>
		<?php }} ?>
</body>
</html>