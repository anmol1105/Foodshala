<?php
	require("layout.php");
	if(user_data($_SESSION["PKUserId"],"Type") !== "C")
	{
		echo "<script>alert('Invalid request!');window.location.href='index.php';</script>";
	}
	page_head();
?>
<body>
	<?php menu();?>
	<div class="container">
		<div class="row">
			<div class="col col-md-12 m-auto">
				<div class="form">
					<hr>
					<h4 class="text-center text-info">Customer Dashboard</h4>
					
				</div>
			</div>
		</div>
		<div class="row" id="OrderWrap">
			<div class="col col-md-12">
				<h5 class="text-left text-danger">Order History</h5>
				<div class="table-responsive">
					<table class="table table-striped table-borederd">
						<thead>
							<tr>
								<th>Sr. No. </th>
								<th>Order Name</th>
								<th>Price</th>
								<th>Image</th>
								<th>Address</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$q = "SELECT * FROM orders WHERE FKUserId = '".$_SESSION["PKUserId"]."'";
								$r = db_query($q);
								$i=0;
								while($d = mysqli_fetch_assoc($r))
								{
									$i++;
									?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo food_data($d["FKFoodId"],"Name");?></td>
											<td><?php echo food_data($d["FKFoodId"],"Price");?></td>
											<td>
												<a href="image/food/<?php echo food_data($d["FKFoodId"],"Image");?>" target="_blank">
													<img src="image/food/<?php echo food_data($d["FKFoodId"],"Image");?>" style="max-height: 150px;width: auto;" alt="Not found!">
												</a>
											</td>
											<td><?php echo $d["Address"];?></td>
										</tr>
									<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php footer();?>
</body>
</html>