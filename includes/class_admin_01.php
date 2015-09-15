<?php 
// make connection to database
include("class_database.php"); 
$db = new DB;

class Admin {

	public $_adminName;
	public $_adminPassword;
	public $_adminEmail;

	// private $conn = $db->connect; // make connection to database through 'db' object instantiated from class_database.php
	private $result = array(); // Any results from a query will be stored here
    private $myQuery = "";// used for debugging process with SQL return
    private $numResults = "";// used for returning the number of rows


	public function __construct($adminName, $adminPassword, $adminEmail){
		$this->_adminName = $adminName;
		$this->_adminPassword = $adminPassword;
		$this->_adminEmail = $adminEmail;
	}

	public function updateName($newName){
		$this->_adminName = $newName;
	}

	public function updatePass($newPass){
		$this->_adminPassword = $newPass;
	}

	public function updateEmail($newEmail){
		$this->_adminEmail = $newEmail;
	}

	public function getName(){
		return $this->_adminName;
	}

	public function getPass(){
		return $this->_adminPassword;
	}

	public function getEmail(){
		return $this->_adminEmail;
	}

	// public function objToString(){ // convert object to associative array
	// 	var_dump(get_object_vars($this));
	// }

	// prepare the sql query 
	public function query($sql){

        // $query = $db->connection->query($sql);

		//pass the query string(statement) into the $myQuery
		$this->myQuery = $sql; 

		if($query){ // checking the rows affected in the table 
			// if the query returns >=1 , assign the number of rows affected to $numResults 
			$this->numResults = $query->num_rows;
			
			//loop through the query results by the number of rows returned 	
			for($i=0; $i < $this->numResults; $i++){
					
				$row = $query->fetch_array(); //fetches the query result to array 
				$key = array_keys($row);
						
				for($x=0; $x < count($key); $x++){ 
				// loops through the keys and sanitizes the values of keys which only allow alphavalues
								
					if(!is_int($key[$x])){
					// check the values if it isn't a number, if true assign the values to keys 
										
						if($query->num_rows >= 1){
							//assign the values into keys in each row 
							$this->result[$i][$key[$x]] = $row[$key[$x]]; 
						}else{
							$this->result = null;
							echo "Bad input, special characters are included in the query. Check the sql query!";
						}

					}

				}

			} return true; // query was successful

		}else{
			array_push($this->result, $db->connect->error);
			return false; // no rows were returned
		}

	}

	public function select($table, $rows = '*', $join = null, $where = null, $order = null, $limit = null){
		// Create query from the variables passed to the function
		$sele = 'SELECT' .$rows. 'FROM' .$table;
		if($join != null){
			$sele .= ' JOIN ' .$join; 
		}
		if($where != null){
			$sele .= ' WHERE ' .$where;
		}
		if($order != null){
			$sele .= ' ORDER BY' .$order;
		}
		if($limit != null){
			$sele .= ' LIMIT ' .$limit;
		}
		return $this->query($sele);
	}

	// Public function to return the data to the user
		public function getResult(){
	        $val = $this->result;
	        $this->result = array();
	        return $val;
	    }

}


?>