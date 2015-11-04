<?php 

/*
	Used for updating admin information
	Used for creating/updating/viewing applicants

	Models used for:
	-Admin
	-Farmer
	-Landowner

	Separate system for:
	-Querying all applicants
	-Saving photos

*/

class AdminForm {

	//Data = [field_name1 = [value, error], field_name2 = [value, error]]
	private $fields = array(
		'first_name' => array('',''),
		'last_name' => array('', ''),
		'password' => array('', ''),
		'password_retype' => array('', ''),
		'email' => array('', '')
		);

	private $id = "";

	public function load($ID){
		//loads data from database
		//sets the id
	}

	public function save(){
		//saves data to databse
		//If the ID for the model is set, an existing entry is update
		//If the ID is not set, a new entry is made.
	}

	public function validate(){
		//validatees each field in the array, and adds any errrors to the array
		//returns true or false
	}

	public function new_data($data){
		// Loads new data into the model's array
		$this->data = $fields;
	}

	public function get_data(){
		// Returns the data array
		return $this->fields;
	}

}

?> 
