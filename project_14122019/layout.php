<?php 
	session_start();
	error_reporting(0);
	include("config/config.inc.php");
	include("include/common.php");
	function page_head()
	{
		?>
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<title>Food Shala</title>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
				<style>
					.fakeimg 
					{
						height: 200px;
						background: #aaa;
					}
				</style>
			</head>
		<?php
	}
	function menu()
	{
		?>
			<div class="container">
				
				<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
				<!-- Brand -->
					<a class="navbar-brand" href="index.php">Food Shala</a>

					<!-- Links -->
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Foods</a>
						</li>

						<?php
							if(!isset($_SESSION["PKUserId"]))
							{
								?>
									<!-- Dropdown -->
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
											LogIn
										</a>
										<div class="dropdown-menu">		
											<a class="dropdown-item" href="login.php?Type=C">Customer</a>
											<a class="dropdown-item" href="login.php?Type=R">Restaurant</a>
										</div>
									</li>
								<?php
							}
							else
							{
								?>
									<!-- Dropdown -->
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
											Welcome : <?php echo user_data($_SESSION["PKUserId"],"Name");?>
										</a>
										<div class="dropdown-menu">	
											<a class="dropdown-item" href="<?php if(user_data($_SESSION["PKUserId"],"Type")=="C"){echo 'c_dashboard.php';}else if(user_data($_SESSION["PKUserId"],"Type")=="R"){echo 'r_dashboard.php';}?>">Dashboard</a>	
											<a class="dropdown-item" href="logout.php">LogOut</a>
										</div>
									</li>
								<?php
							}
						?>
					</ul>
				</nav>
			</div>
		<?php
	}
	function footer()
	{
		?>	
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<?php
	}
?>