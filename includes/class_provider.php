<?php 
// create connection to database
include("class_database.php"); 
$db = new DB;

class provider {

	public function add_provider($name, $desc, $url, $logo, $icon){
		global $db;
		//checking if the provider exist in the table 
		$sql = " SELECT * FROM arkkitect_provider where name = '$name' ";
		$result = mysqli_query($db->connect(), $sql);
		$count_row = $result->num_rows;

		// if username haven't been in the database, insert a new one
		if ( $count_row == 0){
			$sql1 = "INSERT INTO arkkitect_provider(name, desciption, url, logo, icon) 
					 VALUES ( '$name', '$desc', '$url', '$logo', '$icon' ) ";
			$result = mysqli_query($db->connect(), $sql1);
			if ($result){
				echo "Insert successfully new row to 'arkkitect_provider' table";
				return true;
			}else{
				// die(mysqli_connect_errno(). "Data cannot inserted. A problem with query was encountered.");
				return false;
			}
			return $result;		
		}else{
			return false;
		}
	}

	public function get_provider($field){
		global $db;
		$sql2 = " SELECT * FROM arkkitect_provider ";
		$result = mysqli_query($db->connect(), $sql2);
		$provider_data = mysqli_fetch_assoc($result);
		// echo "Provider attribute: "  .$provider_data;
		$rows[$field] = $provider_data;
		print_r($rows);
	}
}

$museum = new provider();
// $museum->add_provider('museum', 'some descriptions go here', 'https://wwww.museum.fi', 'logo image', 'icon image');
$museum->get_provider('');
?>