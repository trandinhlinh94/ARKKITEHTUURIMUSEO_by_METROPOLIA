<?php 
include("class_database.php");
// Our database object
$db = new DB;    
$db->connect();
$con = $db->connection;


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
$user1 = new newAdmin("Linh", "linh", "linh@tran.fi");
echo "hello " . $user1->getName();
// $user1->__toString();
// $db -> select("INSERT INTO 'arkkitect_admin' ('username', 'password', 'email') 
// 			VALUES (" . $user1->getName() . ", ". $$user1->getPass() . ", " . $user1->getEmail() . ")");

// $SQLquery = " INSERT INTO arkkitect_admin(username, password, email) VALUES (' . $user1->getName() .') "; 
// $result = $db->query($SQLquery);
// print_r($result);

?>