<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<style>
		/* Photo Grid */
		/* Image Container */
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

		h1{
			text-align: center;
		}

	</style>
</head>
<body>
	<?php include('includes/header.php');?>

	<h1>Search Page</h1>

	<!-- Photo Grid -->
	<div id="foliogrid" class="body-container">
		<?php
			$connect = mysqli_connect("localhost", "root", "", "zarona");  
			if(isset($_POST['submit-search'])){
			    $search = $_POST['search'];
			    $sql = "SELECT * FROM eventlist WHERE eventname LIKE '%$search%'";
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
			<?php }} else {
			    	echo "There are no results matching your search!";
			    } 
			}	
		?>  
	</div>
</body>
</html>

