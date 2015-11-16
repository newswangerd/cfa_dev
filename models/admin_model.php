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
include "model_form.php";
class AdminInterface extends Form {
	function __construct(){
		$this->fields['lease'] = new CheckBox();
		$this->fields['buy_sell'] = new CheckBox();
		$this->fields['intern'] = new CheckBox();
		$this->fields['vegitable'] = new CheckBox();
		$this->fields['livestock'] = new TextField();
		$this->fields['aquaculture'] = new CheckBox();
		$this->fields['tobacco'] = new CheckBox();
		$this->fields['row_crops'] = new CheckBox();
		$this->fields['eastern'] = new CheckBox();
		$this->fields['western'] = new CheckBox();
		$this->fields['northern'] = new CheckBox();
		$this->fields['southern'] = new TextField();
	}


}

?> 
