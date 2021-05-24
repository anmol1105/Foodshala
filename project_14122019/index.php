<?php
	require("layout.php");
	
	if(isset($_SESSION["PKUserId"]))
	{
		if(user_data($_SESSION["PKUserId"],"Type") == "R")
		{
			echo "<script>window.location.href='r_dashboard.php';</script>";
		}
	}
	page_head();
?>
<body>
	<?php menu();?>
	<div class="container">
		<div class="row">
			<div class="col col-md-12">
				<img src="image/frem1.jpg" width="100%" height="300px">
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php
				$q = "SELECT * FROM food WHERE Status = 1";
				$r = db_query($q);
				$i=0;
				while($d = mysqli_fetch_assoc($r))
				{
					$i++;
					?>
						<div class="col col-md-4">
							<div class="card">
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
									<div>
										<a href="order.php?PKFoodId=<?php echo $d["PKFoodId"];?>" class="btn btn-sm btn-success">Order</a>
									</div>
								</div>
							</div>
						</div>
					<?php
				}
			?>
		</div>
	</div>
	<?php footer();?>
</body>
</html>