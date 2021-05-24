<?php
	require("layout.php");
	if(isset($_REQUEST["AddSubmit"]))
	{
		$Image = "";
		$Err = false;
		$Ext = pathinfo($_FILES["Image"]["name"], PATHINFO_EXTENSION);
  		if($Ext == "jpeg" || $Ext == "gif" || $Ext == "jpg" || $Ext == "png")
        {
        	$Err = true;
			$Target = "image/food/";
			$FileName = date("YmdHis").$_FILES["Image"]["name"];
	        $FileToUpload = $Target.$FileName;
	        $Move = move_uploaded_file($_FILES["Image"]["tmp_name"], $FileToUpload);
	        if($Move)
	        {
	        	$Err = false;
	        	$Image = $FileName;
	        }
	        else
	        {
	    		$ErrorMessage = "File uploading error!";
	        }
	    }
	    else
	    {
	    	$ErrorMessage = "Invalid file (only jpg,jpeg,gif,png).";
	    }
		
		if($Err == false)
		{
			$q = "INSERT INTO `food`(`FKuserId`, `Name`, `Image`, `Description`,`Price`, `Addon`, `Status`) VALUES ('".$_SESSION["PKUserId"]."','".$_REQUEST["Name"]."','".$Image."','".$_REQUEST["Description"]."','".$_REQUEST["Price"]."',Now(),1)";
			if(db_query($q) == true)
			{
				echo "<script>alert('Food add successfully.');window.history.back();</script>";
			}
			else
			{
				echo "<script>alert('Error! Try again.');window.history.back();</script>";
			}
		}
		else
		{
	    	// echo "<script>alert('".$ErrorMessage."');window.history.back();</script>";
		}
	}
?>