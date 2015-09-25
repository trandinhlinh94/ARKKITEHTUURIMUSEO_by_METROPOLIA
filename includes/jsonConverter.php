<?php 
include("class_database.php"); 

		$db = new DB();

		$sql = "SELECT name, lng, lat FROM ark_table1en";

		$result = $db->query($sql);

		$data_array = array();

		while ($row = mysqli_fetch_assoc($result)) {
    		array_push($data_array, [
      			'name'   => $row['name'],
      			'lng' => $row['lng'],
      			'lat' => $row['lat']
    		]);
  		}

		// encode json format
		$json_data = json_encode($data_array);

		// write json file
		file_put_contents('poi.json', $json_data);

		//close the db connection
		mysqli_close($db->connect());

?>