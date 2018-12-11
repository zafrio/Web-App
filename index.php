<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ZARONA | Event Management System</title>
	<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
	<script src='//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src='//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
	<script src='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
	<script src='//use.fontawesome.com/releases/v5.0.8/js/all.js'></script>
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet'>
</head>
<body>
	<?php include('includes/header.php');?>
	<!--- Image Slider -->
		<div id="slides" class="carousel slide" data-ride="carousel">
			<ul class="carousel-indicators">
				<li data-target="#slides" data-slide-to="0" class="active"></li>
				<li data-target="#slides" data-slide-to="1" class="active"></li>
				<li data-target="#slides" data-slide-to="2" class="active"></li>
			</ul>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="img/event3.jpg">
					<div class="carousel-caption">
						<h1>Discover Great Events or Create Your Own</h1>
						<br>
						<!--<button type="button" class="btn btn-outline-light btn-lg">Get Started</button>-->
						<a href="signup.php" class="btn btn-outline-light btn-lg" role="button">Get Started</a>
					</div> 
				</div> <!--End Active-->
				<div class="carousel-item">
					<img src="img/event4.jpg">
					<div class="carousel-caption">
						<h1>Create event more easy with us.</h1>
					</div>
				</div>
				<div class="carousel-item">
					<img src="img/event5.jpg">
					<div class="carousel-caption">
						<h1>“The power of imagination makes us infinite.” – John Muir</h1>
					</div>
				</div>
			</div>
		</div> <!-- End Slider -->

	<!--- Jumbotron -->
		<div class="container-fluid padding">
		<div class="row jumbotron text-center">
			<div class="col-12">
				<p class="lead">
					Why join us ?
				</p>
				<p>
					Events, large and small, can be a great way to promote your business, and perhaps turn a profit in the process.
				</p>
				<p>
					An event is more than just a learning experience. By changing physical surroundings and exposing to a large group of people, all of whom are in the same mindset, people can feel recharged, energised and inspired. Events are about the people that attend and the content, but the change of pace is something that attendees really relish too.
				</p>
			</div>
		</div>	
		</div>

	<!--- Welcome Section -->
		<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div id="about" class="col-12">
				<h1 class="display-4" style="font-family: 'Fredoka One';">ZARONA</h1>
			</div>
			<hr>
			<div class="col-12">
				<p class="lead">
					Welcome to our Event Management System website
				</p>
				<p>
					There are lot of things you can do with our event management system. We’re social creatures, and events are a great chance to get some face time with established connections, and to forge some new ones. Events are a way of creating and building bonds – and a strong network is essential for business success. From finding potential customers and generating leads to chinwagging with industry experts about best practice, the possibilities for connecting are endless.
				</p>
				<p class="lead">
					Come and join us and we can help you start planning your amazing team building event!
				</p>
			</div>
		</div>	
		</div>

	<!--- Three Column Section -->
		<div class="container-fluid padding">
		<div class="row text-center padding">
			<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
				<i class="fas fa-plus-square"></i>
				<h3>CREATE</h3>
				<p>Create great event.</p>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
				<i class="fab fa-connectdevelop"></i>
				<h3>CONNECT</h3>
				<p>Connect people.</p>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
				<i class="fab fa-cc-discover"></i>
				<h3>DISCOVER</h3>
				<p>Discover new things.</p>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
				<i class="fas fa-dollar-sign"></i>
				<h3>PROFIT</h3>
				<p>Make profit.</p>
			</div>
		</div>		
		</div>
	 
	<!--- Meet the team -->
		<div id="team" class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4">Meet the Team</h1>
			</div>
			<hr>
		</div>
		</div>

	<!--- Cards -->
		<div class="container-fluid padding">
		<div class="row padding">
			<div class="col-md-4">
				<div class="card">
					<img class="card-img-top" src="img/pic8.jpg">
					<div class="card-body" style="background: linear-gradient(135deg, rgba(256,256,256,1) 0%,rgba(220,244,255,1) 100%);">
						<h4 class="card-title">Nabil Farhan</h4>
						<p class="card-text">
							NABIL FARHAN BIN MAHMAD ZULHASNAN<br>1141128645<br>1141128645@student.mmu.edu.my
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<img class="card-img-top" src="img/pic7.jpg">
					<div class="card-body" style="background: linear-gradient(135deg, rgba(256,256,256,1) 0%,rgba(220,244,255,1) 100%);">
						<h4 class="card-title">Raja Roza Athirah</h4>
						<p class="card-text">
							RAJA ROZA ATHIRAH BINTI RAJA AZNIR SHAH<br>1142700942<br>1142700942@student.mmu.edu.my
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<img class="card-img-top" src="img/pic5.jpeg">
					<div class="card-body" style="background: linear-gradient(135deg, rgba(256,256,256,1) 0%,rgba(220,244,255,1) 100%);">
						<h4 class="card-title">Zafir Naim</h4>
						<p class="card-text">
							ZAFIR NAIM BIN ZULKIFLI<br>1142702599<br>1142702599@student.mmu.edu.my
						</p>
					</div>
				</div>
			</div>
			
		</div>
		</div>

	<!--- Footer -->
	<footer>
		<div class="container-fluid padding">
		<div class="row text-center">
			<div class="col-md-4">
				<img src="img/logo4.png">
				<hr class="light">
				<p>Web Application Development</p>
				<p>Assignment</p>
			</div>
			<div class="col-md-4">
				<p>Connect with us!</p>
				<div class="row padding">
					<div class="col">
						<a href="http://twitter.com"><i class="fab fa-twitter-square"></i></a>
					</div>
					<div class="col">
						<a href="http://facebook.com"><i class="fab fa-facebook-square"></i></a>
					</div>
					<div class="col">
						<a href="http://instagram.com"><i class="fab fa-instagram"></i></a>
					</div>
				</div>	
			</div>
			<div class="col-md-4">
				<img src="img/mmu1.png">
				<hr class="light">
				<p>Multimedia University</p>
				<p>Trimester 3</p>
				<p>2017/2018</p>
			</div>
		</div>
		</div>
	</footer>
</body>
</html>