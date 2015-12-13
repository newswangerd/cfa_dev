<?php
session_set_cookie_params(0);
session_start();

// If anyone but an admin comes here they get kicked out.
if(isset($_SESSION['type'])){
	if ($_SESSION['type'] != "Administrator"){
		header('Location: index.php');
	}
} else {
	header('Location: index.php');
}

$filter = "";

include "models/farmer_model.php";
include "models/landowner_model.php";


 //the following associative array stores the search criteria 
$post_data = array(
				"to_rent"=> "",
				"to_sell"=> "",
				"to_intern"=> "",
				"to_other"=> "",
				"horticulture"=> "", 
				"livestock"=> "",
				"aquaculture"=> "", 
				"tobacco"=> "",
				"rowcrops"=> "",
				"northern"=> "",
				"central"=> "",
				"eastern"=> "",
				"western"=> "",
				"enabled"=> "checked",
				);
$categories = array(
				"terms" => array('to_rent', 'to_sell', 'to_intern', 'to_other'),
				"ag_type" => array('horticulture', 'livestock', 'aquaculture', 'tobacco', 'rowcrops'),
				"location" => array('northern', 'central', 'eastern', 'western'),	
				);

if (!empty($_POST)){
	$conditions = array(
		"terms" => "",
		"ag_type" => "",
		"location" => "",
		);

// Constructs a WHERE clause for the query. Example: (to_rent = true) AND (horticulture = true) AND (northern = true OR central = true OR eastern = true OR western = true) 
	foreach ($categories as $category => $field) {
		$conditions[$category] = "(";
		$data = false;

		foreach ($field as $key => $value) {
			if (isset($_POST[$value])){
				$post_data[$value] = "checked";
				if ($value != "livestock"){
					$conditions[$category] = $conditions[$category] . $value . " = true OR ";
				} else {
					// There isn't a livestock field in the datbase, so if livestock is true we have to check all of the different livestock options.
					$conditions[$category] = $conditions[$category] . "(livestock_cattle_dairy = 'true' OR livestock_cattle_beef = 'true' OR livestock_poultry = 'true' OR livestock_hogs = 'true' OR livestock_goats = 'true' OR livestock_sheep = 'true' OR livestock_horses = 'true') OR";
				}
				$data = true;
			} else {
				$post_data[$value] = "";
			}
		}
		$conditions[$category] = substr($conditions[$category], 0, -4);

		if ($data){
			$conditions[$category] = $conditions[$category] . ")";
		} else {
			$conditions[$category] = "";
		}
	}

	$filter = "";
	foreach ($conditions as $key => $value) {
		if (!empty($value)){
			$filter =  $filter . $value . " AND ";
		}
	}

	$filter = substr($filter, 0, -5);

} else {
	// If no post operation is set, don't load anything from DB.
	$filter = "nothing";
}

$farmer = new FarmerForm();
$landO = new LandownerForm();


	
$farmer->load_by_filter($filter);
$landO->load_by_filter($filter);


$logout = "logout_button.php";
$page_title = "Admin page";

$panel_heading = "Welcome back, " . $_SESSION['first_name'] . '!';

$page_body = "admin_template.php";


include "templates/template.php";

?>