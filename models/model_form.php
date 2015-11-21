<?php

/**
 * Model Form Class
 * By: David Newswanger
 * Atiba Bailey and Yhenew Kassie
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

//TODO: Fix Foreign key queries so that they aren't making a million connections to the database.
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
	public $name;
	private $required;
	private $length;

	public function __construct($name="", $required=True, $value="", $length=255){
		$this->required = $required;
		$this->value = $value;
		$this->length = $length;
		$this->name = $name;
	}

	public function set_value($val){
		$this->value = $val;
	}

	public function get_value(){
		return $this->value;
	}

	public function set_required($val){
		$this->required = $val;
	}

	public function __toString(){
		return (string)$this->value;
	}

	public function validate() {
		/*
			If the field is required and empty returns false.
			If the length of the value is less than the length, returns false.
			Else Returns true.
		*/
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
	public $error; //added

	public function __construct($name="", $value=False){
		$this->value = $value;
		$this->name = $name;
	}

	public function set_value($val){
		/*
			Checkboxes return a string "on" or "" for checkboxes.
			This has to be translated into a boolean value for MySql
		*/
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

	public function get_value(){
		if ($this->value){
			return "True";
		} else {
			return "False";
		}
	}

	public function validate(){
		// Always validates to true.
		return true;
	}

	public function __toString(){
		/* 
			Since this is primarily used to display if a checkbox is checked or not,
			the object returns "checked" or "" when called as a string so that it can
			simply be inserted into an input field.
		*/
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
	public $name;

	public function __construct($name="", $required=True){
		$this->required = $required;
		$this->name = $name;
	}

	public function set_value($val){
		if (empty($val)){
			$this->value = null;
		} else {
			$this->value = (int)$val;
		}
	}

	public function set_required($val){
		$this->required = $val;
	}

	public function get_value(){
		return $this->value;
	}

	public function __toString(){
		return (string)$this->value;
	}

	public function validate(){
		/*
			If contains non numeric fields, validation fails.
		*/
		if($this->required and empty($this->value)){
			$this->error = "This field is required";
			return false;
		}

		if (!is_int($this->value)){
			$this->error = "Must contain only numbers.";
			return false;
		}
		return true;
	}
}

class ForeignKey {
	/*
		This object simply contains an reference to whatever class the foreign
		key points to. So, if the foreign key points to the Foo class, then
		$value is set to the Foo class and is initialized with the primary key
		that is passed into it.
	*/
	public $value;
	private $form_class;

	public function __construct($form_class){
		$this->form_class = $form_class;
	}

	public function set_value($val){
		$this->value = new $this->form_class();
		$this->value->load_by_pk($val);
	}

	public function validate(){
		return true;
	}
}

class Form {
	public $id_name;
	public $id_instance;
	public $table_name;
	public $current_index;
	public $fields = array();
	public $instances = array();

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

		// Construct the query
		$query = "SELECT * FROM %s WHERE %s = %s;";
		$query = sprintf($query, $this->table_name, $this->id_name, $this->id_instance);
		$row = "";
		// Query the database
		$conn = mysqli_connect($GLOBALS['config']['db_host'], $GLOBALS['config']['db_user'], $GLOBALS['config']['db_pass'], $GLOBALS['config']['db']);
		if ($result = mysqli_query($conn, $query)) {
			$row = mysqli_fetch_array($result);
		}
		//added the following
		if(!$conn) echo "No connection!";

		// Load the result into the object
		foreach ($this->fields as $key => $value){
			$this->fields[$key]->set_value($row[$key]);
		}

		
	}

	public function load_by_filter($filter, $operator = "AND"){
		/*
			Takes a given filter and loads all of the values returned from that filter into the 
			"instances" array.

			Filters are arrays where the keys are the name of a field and the values are the 
			desired search item in that field.

			Additionally an operator can be passed. This can either be AND or OR, and defaults to
			AND if nothing is passed in.

			The values in the "instances" array can be loaded into the "fields" array by using
			the load_next() method.

			In order to load everything from the table, "" can  be passed as the filter
		*/

		//TODO: FIX AGAINST MYSQL INJECTION

		$this->instances = array();
		$this->current_index = 0;
		
		// If the filter is empty, the query simply pulls everything from the database.
		if (!empty($filter)){
			$conditions = "";
			$counter = count($filter);

			// Constructs the conditions portion of the query. Ex: WHERE foo = bar AND bar = foo;
			foreach($filter as $key=>$value){

				// If the value passed is a string, then it must be enclose within a ''
				if(gettype($value) == "string"){
					$template = "%s = '%s' %s ";
				} else {
					$template = "%s = %s %s ";
				}

				$counter = $counter - 1;

				// If this is the last iteration of the loop, then it doesn't appent an operator.
				// This is to avoid an invalid SELECT * FROM bar WHERE foo = bar AND ; query where
				// there is an invalid operator at the end of the query
				if ($counter == 0){
					$conditions = $conditions . sprintf($template, $key, (string)$value, "");
				} else {
					$conditions = $conditions . sprintf($template, $key, (string)$value, $operator);
				}
			}

			// Constructs the query
			$query = sprintf("SELECT * FROM %s WHERE %s;", $this->table_name, $conditions);
		} else {
			$query = sprintf("SELECT * FROM %s", $this->table_name);
		}
		$conn = mysqli_connect($GLOBALS['config']['db_host'], $GLOBALS['config']['db_user'], $GLOBALS['config']['db_pass'], $GLOBALS['config']['db']);
 		
 		// Loads the name of this class
 		$class_name = get_class($this);

 		// Loads a new form object into each cell in the array
		if ($result = mysqli_query($conn, $query)) {

			// If nothing is in the query return false.
			if (mysqli_num_rows($result)==0) { return false; }

			// Each row in the database is stored as a new object of whatever class happens to be
			// using the Forms class. Each of these objects is stored in the "instances" array
			while($row = mysqli_fetch_array($result)){
				$new_form = new $class_name();
				$new_form->id_instance = $row[$this->id_name];
				
				foreach ($new_form->fields as $key => $value){
					$new_form->fields[$key]->set_value($row[$key]);
				}
				$this->instances[] = $new_form;
			}

			// The first instance in the "instances" array is loaded into the fields variable of the
			// current instance.
			$this->fields = $this->instances[$this->current_index]->fields;
			$this->id_instance = $this->instances[$this->current_index]->id_instance;
			return true;
		} else {
			// Returns false if the query fails.
			return false;
		}
	}

	public function load_next(){
		/*
			Loads the next object in instances in the the objects fields attribute.

			This can be used in a while loop to iterate through all the instances in
			the current obect
			
			Ex:
			while ($foo->load_next()){
				echo $foo->fields['bar'];
			}
		*/
		
		if (isset($this->instances[$this->current_index])){
			$this->fields = $this->instances[$this->current_index]->fields;
			$this->id_instance = $this->instances[$this->current_index]->id_instance;
			$this->current_index += 1;
			return true;
		} else {
			$this->current_index = 0;
			return false;
		}
	}

	public function number_of_instances(){
		return count($this->instances);
	}

	public function save(){
		/*
			If $this->id_instance is set, then save updates the entry with the id specified by
			$this->id_instance. If this variable is not set, then save creates a new entry in
			the database based on the information stored in the $this->fields array.
		*/

		if (empty($this->id_instance)){
			
			// If id_instance is not set, add a new entry to the database.
			$fields = "";
			$values = "";

			// Constructs the values and fields portion of the quey by looping through
			// the fields array.
			foreach ($this->fields as $key => $value){
				$fields = $fields . $key . ", ";
				if (get_class($value)=="ForeignKey"){
					$values = $values . "'" . $value->value->id_instance . "', ";
				} else {
					$values = $values . "'" . $value->value . "', ";
				}
			}

			// Removes ", " from the end of the query so that it's not invalid.
			$fields = substr($fields, 0, -2);
			$values = substr($values, 0, -2);

			// builds the final query
			$query = "INSERT INTO %s (%s) VALUES(%s);";
			$query = sprintf($query, $this->table_name, $fields, $values);

		} else {
			// If id_instance is set, saves the current instnace to the database
			$update = "";

			// Constructs the values and fields portion of the quey by looping through
			// the fields array.
			foreach ($this->fields as $key => $value){
				if (get_class($value)=="ForeignKey"){
					$update = $update . $key . " = '" . $value->value->id_instance . "', ";
				} else {
					$update = $update . $key . " = '" . $value->value . "', ";
				}
			}
			$update = substr($update, 0, -2);

			// Builds the final query.
			$query = "UPDATE %s SET %s WHERE %s = %s;";
			$query = sprintf($query, $this->table_name, $update, $this->id_name, $this->id_instance);
		}

		$conn = new mysqli($GLOBALS['config']['db_host'], $GLOBALS['config']['db_user'], $GLOBALS['config']['db_pass'], $GLOBALS['config']['db']);
		
		if ($result = mysqli_query($conn, $query)) {
      		return true;
    	} else {
    		return false;
    	}
	}

	public function delete(){
		/*
			Deletes the entry in the database with the current object's id_instance.
		*/
		$conn = mysqli_connect($GLOBALS['config']['db_host'], $GLOBALS['config']['db_user'], $GLOBALS['config']['db_pass'], $GLOBALS['config']['db']);
		$query = "DELETE FROM %s WHERE %s = %s";
		$query = sprintf($query, $this->table_name, $this->id_name, $this->id_instance);
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
			return true;
		}

		$data = false;
		
		// Loops through all the fields in the fields array. If that field exists in the 
		// $_POST, then the value is inserted into the corresponding field in the fields
		// array.
		foreach($this->fields as $key=>$value){
			if(isset($_POST[$key])) {
				$this->fields[$key]->set_value($_POST[$key]);
				$data = true;
			} elseif(get_class($value)=="CheckBox"){  // Necesary to load checkboxes because checkboxes don't send a post value if they
				$this->fields[$key]->set_value($_POST[$key]);  // aren't checked.
				$data = true;
			}
		}

		return $data;	
	}
}
?>