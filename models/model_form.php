<?php 

// Defines the settings to connect to the databse. Can be accessed using the
// $GLOBALS['name']['value']

$config= array();
$config['db'] = "test";
$config['db_user'] = "test";
$config['db_pass'] = "test";
$config['db_host'] = "localhost";

class TextField {
	/*
		Defines a text field. Contains a value, error message, validation for text fields,
		whether or not it is a required field and a maximum length.

		Validation returns false if the field is required and is blank, or if the number
		of characters exceeds the value of $length.
	*/
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

		if (count ($this->value) > $this->length){
			$this->error = "Must be less than " . $this->length . " characters.";
			return false;
		}

		return true;
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
		/*
			Loads a single item into the object based on the objects primary key. This can
			be used to load a single entry for the purpose of displaying it's information
			or editing it's information.

			This function loads the data into the $fields array.

			This function also sets the object's $this->id_instance to the id that is passed to
			the function. This makes it so that the save function updates the current entry
			rather than create a new duplicate entry when save is called.
		*/
		$this->id_instance = $id;

		$query = "SELECT * FROM %s WHERE %s = %s;";
		$query = sprintf($query, $this->table_name, $this->id_name, $this->id_instance);

		$conn = mysqli_connect($GLOBALS['config']['db_host'], $GLOBALS['config']['db_user'], $GLOBALS['config']['db_pass'], $GLOBALS['config']['db']);
		if ($result = mysqli_query($conn, $query)) {
			$row = mysqli_fetch_array($result);
		}

		foreach ($this->fields as $key => $value){
			$this->fields[$key]->value = $row[$key];
		}

		
	}

	public function load_by_filter($filter, $operator = "AND"){
		/*
			Takes a given filter and loads all of the values returned from that filter into the 
			"multiple" array.

			Filters are arrays where the keys are the name of a field and the values are the 
			desired search item in that field.

			Additionally an operator can be passed. This can either be AND or OR, and defaults to
			AND if nothing is passed in.
		*/
		$conditions = "";
		$counter = count($filter);
		foreach($filter as $key=>$value){
			if(gettype($value) == "string"){
				$template = "%s = '%s' %s ";
			} else {
				$template = "%s = %s %s ";
			}

			$counter = $counter - 1;
			if ($counter == 0){
				$conditions = $conditions . sprintf($template, $key, $value, "");
			} else {
				$conditions = $conditions . sprintf($template, $key, $value, $operator);
			}
		}

		$query = sprintf("SELECT * FROM %s WHERE %s;", $this->table_name, $conditions);

		$conn = mysqli_connect($GLOBALS['config']['db_host'], $GLOBALS['config']['db_user'], $GLOBALS['config']['db_pass'], $GLOBALS['config']['db']);
 		
		if ($result = mysqli_query($conn, $query)) {
			while($row = mysqli_fetch_array($result)){
				foreach ($this->fields as $key => $value){
					$this->multiple[$row[$this->id_name]][$key] = $row[$key];
				}
			}
		}

		// Zeros out the objects in thefields array so that data won't be accidentally added.
		foreach($this->fields as $key => $value){
			$this->fields[$key]->value = "";
		}
	}

	public function save(){
		/*
			If $this->id_instance is set, then save updates the entry with the id specified by
			$this->id_instance. If this variable is not set, then save creates a new entry in
			the database based on the information stored in the $this->fields array.
		*/

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

		$conn = mysqli_connect($GLOBALS['config']['db_host'], $GLOBALS['config']['db_user'], $GLOBALS['config']['db_pass'], $GLOBALS['config']['db']);
		if ($result = mysqli_query($conn, $query)) {
      		return true;
    	} else {
    		return false;
    	}
	}

	public function validate(){
		/*
			Validates each field by looping through each field in the $this->fields array and running
			the validation function for each obect (TextField, CheckBox etc) stored in the array.
			Returns true if all the data is valid, and false if any of the data is invalid.

			Each invalid field will have an error message which can be accessed by calling
			the error attribute on the onbject.
		*/
		$valid = true;
		foreach ($this->fields as $key => $value){
			if (!$this->fields[$key]->validate()) {
				$valid = false;
			}
		}
		return $valid;
	}


	public function load_from_post(){
		/*
			Loads all of the information from the current $_POST array into the object by
			checking to see if any of the attributes defined in $this->fields exist in
			the $_POST array.

			Returns false if no data is detected in the $_POST array and true if data is
			found in the $_POST array.
		*/
		$data = false;
		
		foreach($this->fields as $key=>$value){
			if(!empty($_POST[$key])) {
				$this->fields[$key]->value = $_POST[$key];
				$data = true;
			}
		}
		return $data;	
	}
}

?> 
