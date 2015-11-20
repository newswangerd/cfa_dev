<?php 
require_once "model_form.php";

class FarmerForm extends Form {

	function __construct(){
		$this->table_name="farmer";
		$this->id_name="farmer_id";


		// General Information
		$this->fields['first_name'] = new TextField();
		$this->fields['last_name'] = new TextField();
		$this->fields['password'] = new TextField();
		$this->fields['email'] = new TextField();
		$this->fields['phone'] = new TextField();
		$this->fields['address'] = new TextField();

		// Terms
		$this->fields['to_rent'] = new CheckBox();
		$this->fields['to_sell'] = new CheckBox();
		$this->fields['to_intern'] = new CheckBox();
		$this->fields['to_other'] = new CheckBox();
		$this->fields['terms_other'] = new TextField();

		// Amount and type of land
		$this->fields['pasture'] = new IntegerField();
		$this->fields['tillable'] = new IntegerField();
		$this->fields['organic'] = new CheckBox();

		// Housing
		$this->fields['housing'] = new CheckBox();
		$this->fields['describe_housing'] = new TextField();

		// Infrastructure
		$this->fields['infrastructure_storage'] = new CheckBox();
		$this->fields['infrastructure_barn'] = new CheckBox();
		$this->fields['infrastructure_stables'] = new CheckBox();
		$this->fields['infrastructure_greenhouse'] = new CheckBox();
		$this->fields['infrastructure_goats'] = new CheckBox();
		$this->fields['infrastructure_sheep'] = new CheckBox();
		$this->fields['infrastructure_horses'] = new CheckBox();
		$this->fields['equipment'] = new CheckBox();
		$this->fields['equipment_other'] = new TextField();
		$this->fields['irrigation'] = new CheckBox();

		// Type of agriculture
		$this->fields['horticulture'] = new CheckBox();
		$this->fields['livestock_cattle_beef'] = new CheckBox();
		$this->fields['livestock_cattle_dairy'] = new CheckBox();
		$this->fields['livestock_poultry'] = new CheckBox();
		$this->fields['livestock_hogs'] = new CheckBox();
		$this->fields['livestock_goats'] = new CheckBox();
		$this->fields['livestock_sheep'] = new CheckBox();
		$this->fields['livestock_horses'] = new CheckBox();
		$this->fields['aquaculture'] = new CheckBox();
		$this->fields['tobacco'] = new CheckBox();
		$this->fields['rowcrops'] = new CheckBox();

		// Terms extended
		$this->fields['lease_agreement'] = new TextField();
		$this->fields['purchase_agreement'] = new TextField();
		
		// Education
		$this->fields['highschool'] = new CheckBox(); 
		$this->fields['some_college'] = new CheckBox();
		$this->fields['college_graduate'] = new CheckBox();
		$this->fields['other_education'] = new CheckBox();

		// Location
		$this->fields['northern'] = new CheckBox();
		$this->fields['central'] = new CheckBox();
		$this->fields['eastern'] = new CheckBox();
		$this->fields['western'] = new CheckBox();

		// Short answer
		$this->fields['goals'] = new TextField();
		$this->fields['currently_farming'] = new TextField();
		$this->fields['sell_produce'] = new TextField();

		// Enabled
		$this->fields['enabled'] = new CheckBox($value=True);
	}
}

?>