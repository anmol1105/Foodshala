<?php
	require("layout.php");
	if(!isset($_REQUEST["PKFoodId"]))
	{
		echo "<script>alert('Invalid request!');window.location.href='index.php';</script>";
	}
	else if(!isset($_SESSION["PKUserId"]))
	{
		echo "<script>alert('Please login!');window.location.href='login.php?Type=C';</script>";
	}
	else if(user_data($_SESSION["PKUserId"],"Type")=="R")
	{
		echo "<script>alert('Restaurant cannot place order!');window.location.href='index.php';</script>";
	}

	page_head();
?>
<body>
	<?php menu();?>
	<div class="container">
		<div class="row">
			<div class="col col-md-6">
				<?php
					$q = "SELECT * FROM food WHERE PKFoodId = '".$_REQUEST["PKFoodId"]."'";
					$r = db_query($q);
					$d = mysqli_fetch_assoc($r);

					$q1 = "SELECT * FROM user WHERE PKUserId = '".$_SESSION["PKUserId"]."'";
					$r1 = db_query($q1);
					$d1 = mysqli_fetch_assoc($r1);
				?>
				<hr>
				<div class="card">
					<div class="card-head">
						<h5 class="text-center">Product details</h5>
					</div>
					<div class="card-body">
						<div>
							<a href="image/food/<?php echo $d["Image"];?>" target="_blank">
								<img src="image/food/<?php echo $d["Image"];?>" style="max-height: 150px;width: auto;" alt="Not found!">
							</a>
						</div>
						<label><?php echo $d["Name"];?></label>
						<div>
							<?php echo substr($d["Description"], 0,20);?>
						</div>
						<div>
							<?php echo $d["Price"];?>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-md-6">
				<form action="order_upload.php" method="POST">
					<div class="form">
						<hr>
						<h4 class="text-center text-info">Order Form</h4>
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control"value="<?php echo $d1['Name']?>" name="Name" placeholder="Enter your name">
							<input type="hidden" name="FKFoodId"value="<?php echo $_REQUEST['PKFoodId']?>" >
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control"value="<?php echo $d1['Email']?>" name="Email" placeholder="Enter your email">
						</div>
						<div class="form-group">
							<label>Mobile</label>
							<input type="text" class="form-control"value="<?php echo $d1['Mobile']?>" name="Mobile" placeholder="Enter your mobile" maxlength="10" minlength="10">
						</div>
						<div class="form-group">
							<label>Delivery Address:</label>
							<textarea rows="4" class="form-control" name="Address" placeholder="Enter delivery address"></textarea>
						</div>		
						<center>
							<hr>		
							<input type="submit" class="btn btn-sm btn-success" name="OrderSubmit" value="Submit">	
						</center>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php footer();?>
</body>
</html>