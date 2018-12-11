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
	<title>Training</title>
	<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
	<script src='//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src='//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
	<script src='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
	<script src='//use.fontawesome.com/releases/v5.0.8/js/all.js'></script>
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<style type="text/css">
		/* Photo Grid FOR EVENTS PAGE */
		/* Image Container FOR EVENTS PAGE */
		body .body-container {
		  width: calc(100% - 50px);
		  margin: 20px auto;
		  max-width: 1200px;
		}

		@supports ((display: -ms-grid) or (display: grid)) {
		  body .body-container {
		    display: -ms-grid;
		    display: grid;
		    -ms-grid-columns: (1fr)[1];
		    grid-template-columns: repeat(1, 1fr);
		    grid-gap: 5px;
		  }
		  @media screen and (min-width: 720px) {
		    body .body-container {
		      -ms-grid-columns: (1fr)[2];
		      grid-template-columns: repeat(2, 1fr);
		    }
		  }
		}

		body .body-container figure {
		  margin: 0;
		}

		body .body-container figure{
		  background-color: #2E4053;
		}

		body .body-container figure p{
		  text-align: left;
		  color: #FFF;
		}

		body .body-container figure.fullwidth ul {
		  margin-top: 0;
		}

		body .body-container figure img {
		  max-width: 600px;
		  width: 100%;
		  padding: 0;
		  margin: 0 auto;
		  display: block;
		}
		/* END OF PHOTO GRID */
		/* END OF IMAGE CONTAINER */
	</style>
	<link href='//fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet'>
</head>
<body>
	<?php include('includes/header.php');?>
	<!--Event Content -->
	<div id="foliogrid" class="body-container">
		<?php $sql = "SELECT * from eventlist WHERE eventtype='Training'";
			$query = $dbh->prepare($sql);
			$query->execute();
			$results=$query->fetchAll(PDO::FETCH_OBJ);
			$cnt=1;
			if($query->rowCount() > 0){
			foreach($results as $result){	?>
				<figure class="item">
					<a href="eventresult.php?id=<?php echo htmlentities($result->id);?>&eventname=<?php echo htmlentities($result->eventname);?>">
						<img src="images/<?php echo htmlentities($result->eventimage);?>">
					</a>
					<p style="text-align: center; color: #FFF;"><?php echo htmlentities($result->eventname);?></p>
				</figure>
		<?php }} ?>
	</div>
</body>
</html>