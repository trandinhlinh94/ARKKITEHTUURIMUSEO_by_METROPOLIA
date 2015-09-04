<?php 

/**
 * @author Linh Tran
 * title: Database connection and configurations 
 */

class db_connect {
	// Define $connection as static to avoid connecting more than once 
	protected static $connection;
	/**
     * Connect to the database
     * 
     * @return bool false on failure / mysqli MySQLi object instance on success
     */

	public function connect() {

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

	/**
     * Query the database
     *
     * @param $query The query string
     * @return mixed The result of the mysqli::query() function
     */

	public function query($query) {
		//connect to database
		$connection = $this -> connect();

		// query the database
		$result = connection() -> query($query);
		return $result;
	}

	 /**
     * Fetch rows from the database (SELECT query)
     *
     * @param $query The query string
     * @return bool False on failure / array Database rows on success
     */
	 public function select($query){
     $row = array();
     $result =  $this ->query($query);
     
     if($result === false) {
     	return false;
     }

     while($row = $result -> fetch_assoc() ){
     	$row[] = $row;
     }

     return $row;
 	}
	
	/**
     * Fetch the last error from the database
     * 
     * @return string Database error message
     */

	public function error() {
		$connection = $this -> connect();
		return $connection -> error();
	}

	/**
     * Quote and escape value for use in a database query
     *
     * @param string $value The value to be quoted and escaped
     * @return string The quoted and escaped string
     */

	public function quote($value) {
		$connection = $this -> connect();
		return "'" . $connection -> real_escape_string($value) . "'" ;
	}
}


?>