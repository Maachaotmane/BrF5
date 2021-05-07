<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Booking</title>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="">
		<meta name="description" content="">
		<link rel="stylesheet" href="<?php echo URLROOT; ?>css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo URLROOT; ?>css/style.css">

	</head>
	<body>
		
		
		<nav class="navbar navbar-default navbar-fixed-top " role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon icon-bar"></span>
						<span class="icon icon-bar"></span>
						<span class="icon icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">Booking</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right text-uppercase">
						<li><a href="<?php echo URLROOT; ?>">Home</a></li>						
						<li><a href="<?php echo URLROOT; ?>#pricing">Pricing</a></li>
						<li><a href="<?php echo URLROOT; ?>#service">services</a></li>
						<li><a href="<?php echo URLROOT; ?>#contact">Contact</a></li>
                        <button class="btn btn-primary bt" onclick="window.location.href='<?php echo URLROOT; ?>pages/login'">Login In</button>
						<button class="btn btn-primary bt" onclick="window.location.href='<?php echo URLROOT; ?>pages/register'">Register</button>
					</ul>
				</div>
			</div>
		</nav>
		