<?php
	require("layout.php");
	if(isset($_REQUEST["OrderSubmit"]))
	{
		$q = "INSERT INTO `orders`(`FKFoodId`, `FKUserId`,`Price`, `Name`, `Email`, `Mobile`, `Address`,`Addon`, `Status`) VALUES ('".$_REQUEST["FKFoodId"]."','".$_SESSION["PKUserId"]."','".food_data($_REQUEST["FKFoodId"],"Price")."','".$_REQUEST["Name"]."','".$_REQUEST["Email"]."','".$_REQUEST["Mobile"]."','".$_REQUEST["Address"]."',Now(),0)";
		if(db_query($q) == true)
		{
			echo "<script>alert('Order placed successfully');window.location.href='c_dashboard.php';</script>";
		}
		else
		{
			echo "<script>alert('Error! Try again.');window.history.back();</script>";
		}
	}
?>