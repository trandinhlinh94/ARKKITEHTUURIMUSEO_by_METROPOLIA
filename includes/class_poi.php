<?php 
// create connection to database
include("class_database.php"); 
class POI {

	protected $table_name = "arkkitect_poi";
	protected $table_fields = array(
		'name' => '',
		'providername' => '' 
		);	
	
	public function set_fields($array_field){
		$this->table_fields = $array_field;
	}

	public function get_fields(){
		return $table_fields;
	}	

	public function validate_field(){
		$result = true; 
		foreach ($this->table_fields as $key => $value) {
			if (empty($value)) {
				$result = false;
			}
		}

		return $result;
		/*foreach ($this->table_fields as $value) {
			if (!empty($value)) {
				return true;
			} else {
				return false;
			}
		}*/
	}

	public function push_data(){
		$db = new DB();
		var_dump($db);
		$is_validated = $this->validate_field();

		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		
		if ($is_validated) {
			$keys_array = array();
			$values_array = array();
			foreach ($this->table_fields as $key => $value){
				array_push($keys_array, $key);
				array_push($values_array, "'" . $value . "'");
			}

			$keys_string = "(" . implode(", ", $keys_array) . ")";
			$values_string = "(" . implode(", ", $values_array) . ")";
			$sql = "INSERT INTO " . $this->table_name . " " . $keys_string . " VALUES " . $values_string;
			//execute query 
			$db->query($sql);
			var_dump($db->connection);
		} else {

		}
	}

}
?>