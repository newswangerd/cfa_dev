<?php 

require_once "model_form.php";

class LandownerForm extends Form {

	function __construct(){
		$this->table_name="landowner";
		$this->id_name="landowner_id";


		// General Information
		$this->fields['first_name'] = new TextField("First Name");
		$this->fields['last_name'] = new TextField("Last Name");
		$this->fields['password'] = new PasswordField("Password");
		$this->fields['email'] = new TextField("Email Address");
		$this->fields['phone'] = new TextField("Phone Number");
		$this->fields['address'] = new TextField("Address");
		
		// Terms
		$this->fields['to_rent'] = new CheckBox("Want to rent");
		$this->fields['to_sell'] = new CheckBox("Want to buy");
		$this->fields['to_intern'] = new CheckBox("Want to Intern");
		$this->fields['to_other'] = new CheckBox("Want to do other");
		$this->fields['terms_other'] = new TextField("First Name");

		// Location
		$this->fields['street'] = new TextField("Street");
		$this->fields['city'] = new TextField("City");
		$this->fields['zip'] = new IntegerField("Zip");

		// Acreage
		$this->fields['acres_total'] = new IntegerField("Total Acreage");
		$this->fields['pasture_acres'] = new IntegerField("Pature Acreage");
		$this->fields['tillable_acres'] = new IntegerField("Tillable Acreage");
		$this->fields['woodland_acres'] = new IntegerField("Woodland Acreage");

		//$this->fields['organic'] = new CheckBox;

		// Housing
		$this->fields['housing'] = new CheckBox("Needs Housing");
		$this->fields['describe_housing'] = new TextField("Description of Housing Needs");

		// Infrastructure
		$this->fields['infrastructure_storage'] = new CheckBox("Needs Infrastructure Storage");
		$this->fields['infrastructure_barn'] = new CheckBox("Needs Barn");
		$this->fields['infrastructure_stables'] = new CheckBox("Needs Stables");
		$this->fields['infrastructure_greenhouse'] = new CheckBox("Needs Greenhouse");
		
		// Type of agriculture
		$this->fields['horticulture'] = new CheckBox("Horticulture");
		$this->fields['livestock_cattle_beef'] = new CheckBox("Livestock: Beef");
		$this->fields['livestock_cattle_dairy'] = new CheckBox("Livestock: Dairy");
		$this->fields['livestock_poultry'] = new CheckBox("Livestock: Poultry");
		$this->fields['livestock_hogs'] = new CheckBox("Livestock: Hogs");
		$this->fields['livestock_goats'] = new CheckBox("Livestock: Goats");
		$this->fields['livestock_sheep'] = new CheckBox("Livestock: Sheep");
		$this->fields['livestock_horses'] = new CheckBox("Livestock: Horses");
		$this->fields['aquaculture'] = new CheckBox("Aquaculture");
		$this->fields['tobacco'] = new CheckBox("Tobacco");
		$this->fields['rowcrops'] = new CheckBox("Row Crops");

		// Terms extendend 
		$this->fields['lease_agreement'] = new TextField("Lease Agreement");
		$this->fields['purchase_agreement'] = new TextField("Purchas Agreement");

		// Equipment
		$this->fields['equipment'] = new CheckBox("Needs eqipment");
		$this->fields['equipment_other'] = new TextField("Description of Eqipment Needed");
		
		// Misc
		$this->fields['irrigation'] = new CheckBox("Needs Irrigation");
		$this->fields['goals'] = new TextField("Goals for Land");

		// Location
		$this->fields['northern'] = new CheckBox("Northern Kentucky");
		$this->fields['central'] = new CheckBox("Central Kentucky");
		$this->fields['eastern'] = new CheckBox("Easter Kentucky");
		$this->fields['western'] = new CheckBox("Western Kentcky");

		// Enabled
		$this->fields['enabled'] = new CheckBox("Profile Enabled", True);
	}
}

?>