<?php
	function user_data($id,$field)
	{
		$q = "SELECT ".$field." FROM user WHERE PKUserId = '".$id."'";
		$d = mysqli_fetch_assoc(db_query($q));
		return $d[$field];
	}
	function food_data($id,$field)
	{
		$q = "SELECT ".$field." FROM food WHERE PKFoodId = '".$id."'";
		$d = mysqli_fetch_assoc(db_query($q));
		return $d[$field];
	}
?>