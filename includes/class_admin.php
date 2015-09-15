<?php 
// make connection to database
include("class_database.php"); 
$db = new DB();
$conn = $db->connect();
$sql = "SELECT username, password, email FROM arkkitect_admin Where ID=2";
$result = mysqli_query($db->connect(), $sql);
$admin_data = mysqli_fetch_assoc($result);
echo "Username: " .$admin_data['username'] . "<br />";
echo "Pass: " .$admin_data['password'] . "<br />";
echo "Email: " .$admin_data['email'] . "<br />";

class Admin {
	// register new admin 
	public function reg_admin($username, $password, $email){
		global $db;
		$password = md5($password);
		$sql = " SELECT * FROM arkkitect_admin where username = '$username' OR email = '$email' ";

		//checking if username of email exist on the database
		$result = mysqli_query($db->connect(), $sql);
		$count_row = $result->num_rows;

		// if username haven't been in the database, insert a new one
		if ( $count_row == 0){
			$sql1 = "INSERT INTO arkkitect_admin SET 
					username = '$username', password = '$password', email = '$email' ";
			$result = mysqli_query($db->connect(), $sql1) 
					or die(mysqli_connect_errno()."Data cannot inserted. A problem with query was encountered.");
			return $result;		
		}else{
			return false;
		}
	}

	// login validation process
	public function check_login($emailusername, $password){
		global $db;
		// var_dump($db);
		die();
		$password = md5($password);
		$sql2 = "SELECT ID FROM arkkitect_admin WHERE 
				email = '$emailusername' 	or username = '$emailusername' and password = '$password' ";

		//checking if the username exist in the table 
		$result = mysqli_query($db->connect(), $sql2);
		$admin_data = mysqli_fetch_assoc($result);
		$count_row = $result->num_rows;

		if ($count_row == 1) {
			// this login variable will use for session function 
			$_SESSION['login'] = true; 
			$_SESSION['ID'] = $admin_data['ID'];
			return true;
		}else {
			return false;
		}
	}

	//show the username or fullname if has 
	public function getUsername($ID){
		global $db;
		$sql3 = " SELECT username FROM arkkitect_admin WHERE ID='$ID' ";
		$result = mysqli_query($db->connect(), $sql3);
		$admin_data = mysqli_fetch_assoc($result);
		echo "Username: " .$admin_data['username'];
	}

	/*** starting the session ***/
    public function get_session(){
        return $_SESSION['login'];
    }

    public function user_logout() {
        $_SESSION['login'] = FALSE;
        session_destroy();
    }


}

?>