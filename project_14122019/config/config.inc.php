<?php
    function db_connect() {
	date_default_timezone_set('Asia/Kolkata');
        // Define connection as a static variable, to avoid connecting more than once
        static $connection;

        // Try and connect to the database, if a connection has not been established yet
        if(!isset($connection)) {
             // Load configuration as an array. Use the actual location of your configuration file
            $DBServer = 'localhost'; // e.g 'localhost' or '192.168.1.100'
			$DBUser   = 'root';
			$DBPass   = '';
			$DBName   = 'foodninja';
            $connection = mysqli_connect($DBServer, $DBUser, $DBPass, $DBName);
        }

        // If connection was not successful, handle the error
        if($connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return mysqli_connect_error();
        }
        return $connection;
    }
	
	function db_query($query) 
	{
        // Connect to the database
        $connection = db_connect();

        // Query the database
		$result = mysqli_query($connection,"SET time_zone = '+5:30'");
        $result = mysqli_query($connection,$query);

        return $result;
    }
?>