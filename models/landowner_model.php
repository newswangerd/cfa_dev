<?php 

include "model_form.php"

class LandownerForm extends Form {

	function __construct(){
		$this->table_name="farmer";
		$this->id_name="farmer_id"


		// NEED TO CHANGE SOME OF THESE TO TEXT FIELDS
		// NEED TO ADD FIRST NAME ETC.
		$this->fields['to_rent'] = new CheckBox;
		$this->fields['to_sell'] = new CheckBox;
		$this->fields['to_intern'] = new CheckBox;
		$this->fields['to_other'] = new CheckBox;
		$this->fields['terms_other'] = new CheckBox;
		$this->fields['pasture'] = new CheckBox;
		$this->fields['tillable'] = new CheckBox;
		$this->fields['organic'] = new CheckBox;
		$this->fields['housing'] = new CheckBox;
		$this->fields['describe_housing'] = new CheckBox;
		$this->fields['infrastructure_storage'] = new CheckBox;
		$this->fields['infrastructure_barn'] = new CheckBox;
		$this->fields['infrastructure_greenhouse'] = new CheckBox;
		$this->fields['infrastructure_goats'] = new CheckBox;
		$this->fields['infrastructure_sheep'] = new CheckBox;
		$this->fields['infrastructure_horses'] = new CheckBox;
		$this->fields['equipment'] = new CheckBox;
		$this->fields['equipment_other'] = new CheckBox;
		$this->fields['irrigation'] = new CheckBox;
		$this->fields['horticulture'] = new CheckBox;
		$this->fields['livestock_cattle_beef'] = new CheckBox;
		$this->fields['livestock_cattle_poultry'] = new CheckBox;
		$this->fields['livestock_hogs'] = new CheckBox;
		$this->fields['livestock_goats'] = new CheckBox;
		$this->fields['livestock_sheep'] = new CheckBox;
		$this->fields['livestock_horses'] = new CheckBox;
		$this->fields['aquaculture'] = new CheckBox;
		$this->fields['tobacco'] = new CheckBox;
		$this->fields['lease_agreement'] = new CheckBox;
		$this->fields['purchase_agreement'] = new CheckBox;
		$this->fields['some_college'] = new CheckBox;
		$this->fields['college_graduate'] = new CheckBox;
		$this->fields['other_education'] = new CheckBox;
		$this->fields['northern'] = new CheckBox;
		$this->fields['eastern'] = new CheckBox;
		$this->fields['goals'] = new CheckBox;
		$this->fields['currently_farming'] = new CheckBox;
		$this->fields['sell_produce'] = new CheckBox;


}

?> 
