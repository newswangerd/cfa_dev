<?php

/**
 * Model Form Class
 * By: David Newswanger
 *
 * The purpose of this library is to provide an easy interface between the data
 * sent by the user and the database. In order to use this library, the user simply
 * needs to create a subclass which extends form. In this sub class the user has to
 * define all of the fields in a database by adding them to the fields array using
 * the format:
 *
 * $this->['fieldname'] = new FieldType();
 *
 * The user also has to configure the name table and its primary key using:
 * $this->table_name = "table_name"; and
 * $this->id_name = "id_name";
 *
 * Currently the only three field types sypported are TextField, CheckBox and
 * IntegerField.
 *
 * This library, once properly configured with the table's information, 
 * automatically handles validation, updating, inserting and extracting data
 * from the database. 
 **/

// Defines the settings to connect to the databse. Can be accessed using the
// $GLOBALS['name']['value']

$config= array();
$config['db'] = "cfa_dev";
$config['db_user'] = "cfa_dev";
$config['db_pass'] = "MartinRichards";
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
	public $load_without_post;

	public function __construct($required=True, $value="", $length=255){
		$this->required = $required;
		$this->value = $value;
		$this->length = $length;
		$this->load_without_post = false;
	}

	public function set_value($val){
		$this->value = $val;
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
	public $load_without_post;

	public function __construct($name="", $value=False){
		$this->value = $value;
		$this->name = $name;
		$this->load_without_post = true;
	}

	public function set_value($val){
		switch($val){
			case "on":
				$this->value = true;
				break;
			case false:
				$this->value = false;
				break;
			case true:
				$this->value = true;
				break;
			case 0:
				$this->value = false;
				break;
			case 1:
				$this->value = true;
				break;
			case "":
				$this->value = false;
				break;
		}
	}

	public function validate(){
		// Always validates to true.
		return true;
	}

	function __toString(){
		if ($this->value){
			return "checked";
		} else {
			return "";
		}
	}
}

class IntegerField {
	public $value;
	public $error;
	private $required;
	public $load_without_post;


	public function __construct($required=True, $value=null){
		$this->required = $required;
		$this->value = $value;
		$this->load_without_post = false;
	}

	public function set_value($val){
		if (!empty($val)){
			if(is_numeric($val)){
				$this->value = (int)$val;
			} else {
				$this->value = $val;
			}
		}
	}

	function __toString(){
		return (string)$this->value;
	}

	public function validate(){
		if ($this->required and empty($this->value)){
			$this->error = "This field is required.";
			return false;
		}

		if (!is_int($this->value)){
			$this->error = "Must contain only numbers.";
			return false;
		}
		return true;
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
			$this->fields[$key]->set_value($row[$key]);
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
				$values = $values . "'" . $value->value . "', ";
			}

			$fields = substr($fields, 0, -2);
			$values = substr($values, 0, -2);

			$query = "INSERT INTO %s (%s) VALUES(%s);";
			$query = sprintf($query, $this->table_name, $fields, $values);

		} else {
			$update = "";
			foreach ($this->fields as $key => $value){
				$update = $update . $key . " = '" . $value->value . "', ";
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
		if (empty($_POST)){
			return false;
		}

		$data = false;
		
		foreach($this->fields as $key=>$value){
			if(isset($_POST[$key])) {
				$this->fields[$key]->set_value($_POST[$key]);
				$data = true;
			} elseif($this->fields[$key]->load_without_post){  // Necesary to load checkboxes because checkboxes don't send a post value if they
				$this->fields[$key]->set_value($_POST[$key]);  // aren't checked.
				$data = true;
			}
		}

		return $data;	
	}
}
?> 
