<?php 
require_once("includes/config.php");
// check for user availability
if(!empty($_POST["user"])) {
	$username= $_POST["user"];
	$sql ="SELECT username FROM users WHERE username=:username";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':username', $username, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query -> rowCount() > 0)
	{
		echo "<span style='color:white'> Username already exists .</span>";
	 	echo "<script>$('#submit').prop('disabled',true);</script>";
	} else{
		
		echo "<span style='color:white'> Username available for Registration .</span>";
	 	echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
?>
