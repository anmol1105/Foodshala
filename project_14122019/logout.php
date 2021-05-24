<?php
	session_start();
	unset($_SESSION["PKUserId"]);
	header("Location:index.php");
?>