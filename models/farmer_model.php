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

class FarmerForm {

	//Data = [field_name1 = [value, error], field_name2 = [value, error]]
	private $fields = array(
		'to_rent' => array('',''),
		'to_sell' => array('', ''),
		'to_intern' => array('', ''),
		'to_other' => array('', ''),
		'terms_other' => array('', ''),
		'pasture' => array('', ''),
		'tillable' => array('', ''),
		'organic' => array('', ''),
		'housing' => array('', ''),
		'describe_housing' => array('', ''),
		'infrastructure_storage' => array('', ''),
		'infrastructure_barn' => array('', ''),
		'infrastructure_stables' => array('', ''),
		'infrastructure_greenhouse' => array('', ''),
		'infrastructure_goats' => array('', ''),
		'infrastructure_sheep' => array('', ''),
		'infrastructure_horses' => array('', ''),
		'equipment' => array('', ''),
		'equipment_other' => array('', ''),
		'irrigation' => array('', ''),
		'horticulture' => array('', ''),
		'livestock_cattle_beef' => array('', ''),
		'livestock_cattle_dairy' => array('', ''),
		'livestock_cattle_poultry' => array('', ''),
		'livestock_hogs' => array('', ''),
		'livestock_goats' => array('', ''),
		'livestock_sheep' => array('', ''),
		'livestock_horses' => array('', ''),
		'aquaculture' => array('', ''),
		'tobacco' => array('', ''),
		'rowcrops' => array('', ''),
		'lease_agreement' => array('', ''),
		'purchase_agreement' => array('', ''),
		'highschool' => array('', ''),
		'some_college' => array('', ''),
		'college_graduate' => array('', ''),
		'other_education' => array('', ''),
		'northern' => array('', ''),
		'central' => array('', ''),
		'eastern' => array('', ''),
		'western' => array('', ''),
		'goals' => array('', ''),
		'currently_farming' => array('', ''),
		'sell_produce' => array('', '')
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
