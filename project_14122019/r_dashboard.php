<?php
	require("layout.php");
	if(isset($_SESSION["PKUserId"]))
	{
		if(!user_data($_SESSION["PKUserId"],"Type") == "R")
		{
			// echo "<script>alert('Invalid request!');window.location.href='index.php';</script>";
		}
	}
	page_head();
?>
<body>
	<?php menu();?>
	<div class="container">
		<div class="row">
			<div class="col col-md-12">
				<div class="form">
					<hr>
					<h4 class="text-center text-info">Restaurant Dashboard</h4>
					<div class="col">
						<button class="btn btn-sm btn-info" id="AddForm">Add Food</button>
						<button class="btn btn-sm btn-info" id="ViewOrder">View Orders</button>
						<br><br>
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="FoodWrap">
			<div class="col col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-borederd">
						<thead>
							<tr>
								<th>Sr. No. </th>
								<th>Food Name</th>
								<th>Image</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$q = "SELECT * FROM food WHERE FKUSerId = '".$_SESSION["PKUserId"]."'";
								$r = db_query($q);
								$i=0;
								$farray = array();
								while($d = mysqli_fetch_assoc($r))
								{
									array_push($farray, $d["PKFoodId"]);
									$i++;
									?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $d["Name"];?></td>
											<td>
												<a href="image/food/<?php echo $d["Image"];?>" target="_blank">
													<img src="image/food/<?php echo $d["Image"];?>" style="max-height: 150px;width: auto;" alt="Not found!">
												</a>
											</td>
											<td><?php echo $d["Description"];?></td>
											<td><?php echo $d["Price"];?></td>
										</tr>
									<?php
								}
							?>
						</tbody>
					</table>
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
								<th>Name</th>
								<th>Price</th>
								<th>Mobile</th>
								<th>Address</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($farray as $key => $value)
								{
									$q = "SELECT * FROM orders WHERE FKFoodId = '".$value."'";
									$r = db_query($q);
									$i=0;
									while($d = mysqli_fetch_assoc($r))
									{
										$i++;
										?>
											<tr>
												<td><?php echo $i;?></td>
												<td><?php echo $d["Name"];?></td>
												<td><?php echo $d["Price"];?></td>
												<td>
													<?php echo $d["Mobile"];?>
												</td>
												<td><?php echo $d["Address"];?></td>
											</tr>
										<?php
									}
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row" id="AddFormWrap">
			<div class="col col-md-6 m-auto">
				<form action="r_upload.php" method="POST" enctype="multipart/form-data">
					<div class="form">
						<hr>
						<h4 class="text-center text-warning">Add Food</h4>
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="Name" placeholder="Enter food name" required>
						</div>
						<div class="form-group">
							<label>Image</label>
							<input type="file" class="form-control" name="Image" required>
						</div>
						<div class="form-group">
							<label>Description:</label>
							<textarea class="form-control" rows="5" placeholder="Food Description" name="Description"></textarea>
						</div>
						<div class="form-group">
							<label>Price</label>
							<input type="text" class="form-control" name="Price" placeholder="Enter food price" required>
						</div>
						<center>
							<hr>		
							<input type="submit" class="btn btn-sm btn-success" name="AddSubmit" value="Submit">	
						</center>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php footer();?>
	<script>
		$("#AddFormWrap").hide();
		$("#FoodWrap").show();
		$("#OrderWrap").hide();
		$("#AddForm").click(function()
			{
				$("#AddFormWrap").slideToggle(200);
				$("#FoodWrap").hide();
				$("#OrderWrap").hide();
			});
		$("#ViewOrder").click(function()
			{
				$("#OrderWrap").slideToggle(200);
				$("#AddFormWrap").hide();
				$("#FoodWrap").hide();
			});
	</script>
</body>
</html>