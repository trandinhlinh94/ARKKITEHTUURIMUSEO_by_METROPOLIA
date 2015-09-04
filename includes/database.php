<?php 

/**
 * @author Linh Tran
 * title: Database connection configuration
 */

function db_connect() {
	// Define $connection as static to avoid connecting more than once 
	static $connection;

	// Try to connect to the database if a connection has not been established yet 
	if(isset($connection)) {

		// load the configuration file, use the actual location of configuration file 
		$config = parse_ini_file('../config.ini');
		$connection = mysqli_connect($config['hostname'], $config['username'],
									 $config['password'], $config['dbname']);
	}
	// if the connection was not successful, handle the error
	if($connection === false) {
		// Handle error - notify administrator, log to a file, show an error screen. 
		return mysqli_connect_error();
	}
	return $connection;
}

?>