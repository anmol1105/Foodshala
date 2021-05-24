<?php
	require("layout.php");
	if(!isset($_REQUEST["Type"]))
	{
		echo "<script>alert('Invalid request!');window.location.href='index.php';</script>";
	}
	if(isset($_REQUEST["SignupSubmit"]))
	{
		$q1 = "SELECT PKUserId FROM user WHERE Email = '".$_REQUEST["Email"]."'";
		if(mysqli_num_rows(db_query($q1))>0)
		{
			echo "<script>alert('Email already exist! Try again.');window.history.back();</script>";
		}
		else
		{
			$q = "INSERT INTO `user`(`Name`, `Email`, `Mobile`, `Type`, `Password`, `Addon`, `Status`) VALUES ('".$_REQUEST["Name"]."','".$_REQUEST["Email"]."','".$_REQUEST["Mobile"]."','".$_REQUEST["Type"]."','".md5($_REQUEST["Password"])."',Now(),1)";
			if(db_query($q) == true)
			{
				echo "<script>alert('Sign up successfully');window.location.href='login.php?Type=".$_REQUEST["Type"]."';</script>";
			}
			else
			{
				echo "<script>alert('Error! Try again.');window.history.back();</script>";
			}
		}
	}
	page_head();
?>
<body>
	<?php menu();?>
	<div class="container">
		<div class="row">
			<div class="col col-md-6 m-auto">
				<form action="signup.php" method="POST">
					<div class="form">
						<hr>
						<h4 class="text-center text-info">Sign Up Form</h4>
						<div class="form-group">
							<label><input type="radio" name="Type" <?php if($_REQUEST['Type']=="C"){echo "checked";}?> value="C>"> Customer </label>
							<label><input type="radio" name="Type" <?php if($_REQUEST['Type']=="R"){echo "checked";}?> value="R>"> Restaurant </label>
						</div> 
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="Name" placeholder="Enter your name">
							<input type="hidden" name="Type" value="<?php echo $_REQUEST['Type']?>">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="Email" placeholder="Enter your email">
						</div>
						<div class="form-group">
							<label>Mobile</label>
							<input type="text" class="form-control" name="Mobile" placeholder="Enter your mobile" maxlength="10" minlength="10">
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input type="password" class="form-control" name="Password" placeholder="Enter you password">
						</div>		
						<center>
							<hr>		
							<input type="submit" class="btn btn-sm btn-success" name="SignupSubmit" value="Submit">	
						</center>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php footer();?>
</body>
</html>