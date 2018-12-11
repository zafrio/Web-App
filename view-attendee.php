<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>View Attendee</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<style type="text/css">
		body {
		  line-height: 1.25;
		}

		table {
		  border: 1px solid #ccc;
		  border-collapse: collapse;
		  margin: 0;
		  padding: 0;
		  width: 100%;
		  table-layout: fixed;
		}

		table caption {
		  font-size: 1.5em;
		  margin: .5em 0 .75em;
		}

		table tr {
		  background-color: #f8f8f8;
		  border: 1px solid #ddd;
		  padding: .35em;
		}

		table th,
		table td {
		  padding: .625em;
		  text-align: center;
		}

		table th {
		  font-size: .85em;
		  letter-spacing: .1em;
		  text-transform: uppercase;
		}

		@media screen and (max-width: 600px) {
		  table {
		    border: 0;
		  }

		  table caption {
		    font-size: 1.3em;
		  }
		  
		  table thead {
		    border: none;
		    clip: rect(0 0 0 0);
		    height: 1px;
		    margin: -1px;
		    overflow: hidden;
		    padding: 0;
		    position: absolute;
		    width: 1px;
		  }
		  
		  table tr {
		    border-bottom: 3px solid #ddd;
		    display: block;
		    margin-bottom: .625em;
		  }
		  
		  table td {
		    border-bottom: 1px solid #ddd;
		    display: block;
		    font-size: .8em;
		    text-align: right;
		  }
		  
		  table td::before {
		    /*
		    * aria-label has no advantage, it won't be read inside a table
		    content: attr(aria-label);
		    */
		    content: attr(data-label);
		    float: left;
		    font-weight: bold;
		    text-transform: uppercase;
		  }
		  
		  table td:last-child {
		    border-bottom: 0;
		  }
		}
	</style>
</head>
<body>
	<?php include('includes/header.php');?>
	<div>
	<table>
	  <thead>
    <tr>
      <th scope="col">Index</th>
      <th scope="col">Event Name</th>
      <th scope="col">Username</th>
      <th scope="col">DATE</th>
    </tr>
  </thead>
  <tbody>
    <?php $sql = "SELECT * from eventattend";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0){
		foreach($results as $result){	?>		
		  <tr>
			<td data-label="Account"><?php echo htmlentities($cnt);?></td>
			<td data-label="Event ID"><?php echo htmlentities($result->eventid);?></td>
			<td data-label="User Name"><?php echo htmlentities($result->user_name);?></td>
			<td data-label="Last Update"><?php echo htmlentities($result->date);?></td>
		  </tr>
		 <?php $cnt=$cnt+1;} }?>
  </tbody>
</table>
</div>

</body>
</html>