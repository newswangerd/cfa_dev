<?php 

class TextField {
	public $value;
	public $error;
	private $required;
	private $length;

	public function __construct($required=True, $value="", $length=255){
		$this->required = $required;
		$this->value = $value;
		$this->length = $length;
	}

	function __toString(){
		return $this->value;
	}

	public function validate() {
		if ($this->required and empty($this->value)){
			$this->error = "This field is required.";
			return false;
		}

		return true;
	}

	public function set_value($val){
		$this->value = $val;
	}
}

class CheckBox {
	public $value;
	public $name;
	private $required;

	public function __construct($required, $value, $name){
		$this->required = $required;
		$this->value = $value;
	}

	function __toString(){
		return $this->value;
	}

	public function validate(){
		// Always validates to true.
		return true;
	}
}

class IntegerField {
	public $value;
	public $error;
	private $required;

	public function __construct($required, $value){
		$this->required = $required;
		$this->value = $value;
	}

	function __toString(){
		return $this->value;
	}

	public function validate(){
		// Makes sure that all the charactes in value are numbers
	}
}

class Form {
	public $id_name;
	public $id_instance;
	public $table_name;
	public $fields = array();
	public $multiple = array();

	public function load_by_pk($id){
		//loads data from database
		//sets the id
		$this->id_instance = $id;

		$query = "SELECT * FROM %s WHERE %s = %s;";
		$query = sprintf($query, $this->table_name, $this->id_name, $this->id_instance);

		$conn = mysqli_connect("localhost", "test", "test", "test");
		if ($result = mysqli_query($conn, $query)) {
			$row = mysqli_fetch_array($result);
		}

		foreach ($this->fields as $key => $value){
			$this->fields[$key]->value = $row[$key];
		}

		
	}

	public function load_by_filter($field, $filter){
		$query = "SELECT * FROM %s WHERE %s = %s;";
		$query = sprintf($query, $this->table_name, $field, $filter);

		$conn = mysqli_connect("localhost", "test", "test", "test");
		
		if ($result = mysqli_query($conn, $query)) {
			foreach (mysqli_fetch_array($result) as $row => $field){
				foreach ($this->fields as $key => $value){
					$this->fields[$key]->value = $row[$key];
				}
				$this->multiple[] = $this->fields;
			}
		}

		// Zeros out the objects in teh fields array so that data won't be accidentally added.
		foreach($this->fields as $key => $value){
			$this->fields[$key]->value = "";
		}
	}

	public function save(){
		//saves data to databse
		//If the ID for the model is set, an existing entry is update
		//If the ID is not set, a new entry is made.

		if (empty($this->id_instance)){
			$fields = "";
			$values = "";
			foreach ($this->fields as $key => $value){
				$fields = $fields . $key . ", ";
				$values = $values . "'" . $value . "', ";
			}

			$fields = substr($fields, 0, -2);
			$values = substr($values, 0, -2);

			$query = "INSERT INTO %s (%s) VALUES(%s);";
			$query = sprintf($query, $this->table_name, $fields, $values);

		} else {
			$update = "";
			foreach ($this->fields as $key => $value){
				$update = $update . $key . " = '" . $value . "', ";
			}
			$update = substr($update, 0, -2);

			$query = "UPDATE %s SET %s WHERE %s = %s;";
			$query = sprintf($query, $this->table_name, $update, $this->id_name, $this->id_instance);
		}

		$conn = mysqli_connect("localhost", "test", "test", "test");
		if ($result = mysqli_query($conn, $query)) {
      		return true;
    	} else {
    		return false;
    	}

	}

	public function validate(){
		//validatees each field in the array, and adds any errrors to the array
		//returns true or false
		$valid = true;
		foreach ($this->fields as $key => $value){
			if (!$this->fields[$key]->validate()) {
				$valid = false;
			}
		}
		return $valid;
	}
}

?> 
