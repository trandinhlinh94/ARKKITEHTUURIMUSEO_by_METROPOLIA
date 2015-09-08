<?php 
include("database.php");
// Our database object
$db = new DB;    
$db->connect();
$con = $db->connection;


// // mysqli_query($db->connection,"INSERT INTO admin (username, password) VALUES ('Glenn', '112')");
// $SQLquery = "SELECT * FROM admin where userID = 1 "; 
// $result = $db->query($SQLquery);
// print_r($result);

class newAdmin {

	private $adminName;
	private $adminPassword;
	private $adminEmail;

	public function __construct($adminName, $adminPassword, $adminEmail){
		$this->adminName = $adminName;
		$this->adminPassword = $adminPassword;
		$this->adminEmail = $adminEmail;
	}

	public function changeName($newName){
		$this->adminName = $newName;
	}

	public function changePass($newPass){
		$this->adminPassword = $newPass;
	}

	public function changeEmail($newEmail){
		$this->adminEmail = $newEmail;
	}

	public function getName(){
		return $this->adminName;
	}

	public function getPass(){
		return $this->adminPassword;
	}

	public function getEmail(){
		return $this->adminEmail;
	}

}



?>