<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link href="assets/css/styles.css" rel="stylesheet">
		<script src="assets/js/main.js"></script>
	</head>
	<body>
		<header>
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
				<a class="navbar-brand" href="<?php echo base_url(); ?>">Where's The Item?</a>
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="aboutUs">About Us</a>
					</li>
				</ul>
				<?php
				if ($user_data != null):
				$user_image_url = $user_data[0]["picUrl"] != null ? $user_data[0]["picUrl"] : "assets/images/user_default.png";
				?>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link no-vert-pad" href="dashboard">
							<img src="<?php echo $user_image_url; ?>" class="rounded-circle user-img nav-space" alt="User">
							<span class="nav-space"><?php echo $user_data[0]["name"]; ?></span>
						</a>
					</li>
				</ul>
				<?php
				echo form_open('login');
				echo form_submit('submit', 'Logout', 'class="btn btn-outline-secondary nav-space"');
				echo form_close();
				?>
				<?php else: ?>
				<a class="btn btn-outline-primary nav-space" href="register">Register</a>
				<a class="btn btn-outline-secondary nav-space" href="login">Login</a>
				<?php endif; ?>
			</nav>
		</header>
