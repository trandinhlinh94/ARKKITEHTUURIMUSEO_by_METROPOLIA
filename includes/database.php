<?php 

class DB {
	public $connection;

	public function connect(){
		// Load configuration as an array. Use the actual location of your configuration file
		$config = parse_ini_file('../config.ini');  
		
		$dbhost = $config['dbhost'];
		$dbdata = $config['dbname'];
		$dbuser = $config['dbuser'];
		$dbpass = $config['dbpass'];
		
		// Opens a connection to a MySQL server.
		$connection = mysql_connect ($dbhost, $dbuser, $dbpass);
		if (!$connection) 
		{
		  die('Not connected : ' . mysql_error());
		}
		//select database to use 
		mysql_select_db($dbdata, $connection ) or die( "Cannot connect to the database " . mysql_error());
	}

	public function disconnect(){
		// TODO 
	}

	public function query($query){
		$result;
		$result = mysql_query($query);
		//fetch the result to object and print object
		while($row = mysql_fetch_object($result)){
			print_r($row);
		}
	}




}

?>