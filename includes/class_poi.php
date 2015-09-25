<?php 

// TODO : check the existing poi before adding new record to db

// TODO : sanitize values before inserting data to db 



// create connection to database
include("class_database.php"); 
class POI {

	protected $table_name = "arkkitect_poi";
	protected $table_fields = array(
		'name' => '',
		'providername' => '',
		'designers' => '',
		'description' => '',
		'design_year' => '',
		'height' => '',
		'tags' => '',
		'credit' => '',
		'style_defination' => '',
		'arch_comp' => '', 
		'lat' => '', 
		'lng' => '',
		'email' => '',
		'phone' => '',
		'url' => ''
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
	}

	public function show_all_poi(){
		$db = new DB();
		$sql = "SELECT * FROM " .$this->table_name;
		$result = $db->query($sql);
		return $result;
	}
	
	public function show_by_fieldname(){
		$db = new DB();
		$keys_array = array();
		// loop through the fields and values in the table and generate separate array for keys and values	
		foreach ($this->table_fields as $key => $value){
			array_push($keys_array, $key);
		}		
		$sql = "SELECT * FROM " . $table_name . " WHERE name =" . $keys_array[$keys] ;  
		var_dump($sql);
	}

	public function fetch_rows(){
		$db = new DB();
		$row = mysqli_fetch_row($this->show_all_poi());
		return $row;
	}	

	public function push_data(){
		$db = new DB();
		$is_validated = $this->validate_field();

		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		
		if ($is_validated) {
			$keys_array = array();
			$values_array = array();
			// loop through the fields and values in the table and generate separate array for keys and values
			foreach ($this->table_fields as $key => $value){
				array_push($keys_array, $key);
				array_push($values_array, "'" . $value . "'");
			}

			$keys_string = "(" . implode(", ", $keys_array) . ")";
			$values_string = "(" . implode(", ", $values_array) . ")";
			$sql = "INSERT INTO " . $this->table_name . " " . $keys_string . " VALUES " . $values_string;
			//execute query 
			$result = $db->query($sql);
			if ($result){
				echo "New poi added to database";
			}
		} else {
			echo "<h3>Invalid input, try again. </h3>";
		}
	}

	public function update_data(){
		$db = new DB();
		
		$arguments = array();
		// loop through the fields and values in the table and 
		// seperate each column out with it's corresponding value
		foreach ($this->table_fields as $key => $value){
			$arguments[]=$field.'="'.$value.'"';
		}
		// set new value to field.
			// Don't forget your SQL syntax and good habits:
			// - UPDATE table SET key='value', key='value' WHERE condition
			// - single-quotes around all values
			// - escape all values to prevent SQL injection 
		// Find the row that is selected to edit. 1 row at a time. 	
		$sql = "UPDATE " . $this->table_name . " SET "; 
		$sql.= implode(',', $arguments) . " where id = $id";

		// Select the field to edit value. 
		$result = $db->query($is_selected);
		$row = $db->fetch_array($result);
		// var_dump($is_selected);
		var_dump($row);
		
	}

}
?>