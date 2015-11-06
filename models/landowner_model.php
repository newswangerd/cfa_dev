<?php 

include "model_form.php"

class LandownerForm extends Form {

	function __construct(){
		$this->table_name="landowner";
		$this->id_name="landowner_id"


		// General Information
		$this->fields['fist_name'] = new TextField();
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

		// Locattion
		$this->fields['street'] = new TextField();
		$this->fields['city'] = new TextField();
		$this->fields['zip'] = new IntegerField();

		// Acreage
		$this->fields['acres_total'] = new IntegerField();
		$this->fields['pasture_acres'] = new IntegerField();
		$this->fields['tillable_acres'] = new IntegerField();
		$this->fields['woodland_acres'] = new IntegerField();

		//$this->fields['organic'] = new CheckBox;

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

		// Terms extendend 
		$this->fields['lease_agreement'] = new TextField();
		$this->fields['purchase_agreement'] = new TextField();

		// Equipment
		$this->fields['equipment'] = new CheckBox();
		$this->fields['equipment_other'] = new CheckBox();
		
		// Misc
		$this->fields['irrigation'] = new CheckBox();
		$this->fields['goals'] = new TextField();

		// Enabled
		$this->fields['enabled'] = new CheckBox();


}

?> 
