<?php
	require("layout.php");
	if(!isset($_REQUEST["Type"]))
	{
		echo "<script>alert('Invalid request!');window.location.href='index.php';</script>";
	}
	if(isset($_REQUEST["LoginSubmit"]))
	{
		$q = "SELECT PKUserId FROM user WHERE `Email` = '".$_REQUEST["Email"]."' AND `Password` = '".md5($_REQUEST["Password"])."' AND `Type` = '".$_REQUEST["Type"]."'";
		$r = db_query($q);
		$d = mysqli_fetch_assoc($r);
		if(mysqli_num_rows($r)>0)
		{
			$_SESSION["PKUserId"] = $d["PKUserId"];
			if($_REQUEST["Type"]=="C")
			{
				echo "<script>alert('Login successfully');window.location.href='c_dashboard.php';</script>";
			}
			else if($_REQUEST["Type"]=="R")
			{
				echo "<script>alert('Login successfully');window.location.href='r_dashboard.php';</script>";
			}
		}
		else
		{
			echo "<script>alert('Error! Invalid details.');window.history.back();</script>";
		}
	}
	page_head();
?>
<body>
	<?php menu();?>
	<div class="container">
		<div class="row">
			<div class="col col-md-6 m-auto">
				<form action="login.php" method="POST">
					<div class="form">
						<hr>
						<h4 class="text-center text-info">Log In Form</h4>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="Email" placeholder="Enter your email">
							<input type="hidden" name="Type" value="<?php echo $_REQUEST['Type']?>">
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input type="password" class="form-control" name="Password" placeholder="Enter you password">
						</div>	
						<a href="signup.php?Type=<?php echo $_REQUEST['Type']?>">Not Registered! SignUp</a>	
						<center>
							<hr>		
							<input type="submit" class="btn btn-sm btn-success" name="LoginSubmit" value="Submit">	
						</center>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php footer();?>
</body>
</html>