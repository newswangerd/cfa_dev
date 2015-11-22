<?php
echo password_hash("test", PASSWORD_BCRYPT);

include "models/farmer_model.php";
include "models/landowner_model.php";

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
				);

if (!empty($_POST)){
	$filter = "";
	$operators = array();
	foreach ($post_data as $key => $value){
		if (isset($_POST[$key])){
			$post_data[$key] = "checked";
			if ($key != "livestock"){
				$filter = $filter . $key . " = true AND ";
			}
		}
	}

	if (isset($_POST['livestock'])){
		$filter = $filter . "(livestock_cattle_dairy = 'true' OR livestock_cattle_beef = 'true' OR livestock_poultry = 'true' OR livestock_hogs = 'true' OR livestock_goats = 'true' OR livestock_sheep = 'true' OR livestock_horses = 'true')";
	} else {
		$filter = substr($filter,0 ,-4);
	}

} else {
	$filter = "";
}

$farmer = new FarmerForm();
$landO = new LandownerForm();

$farmer->load_by_filter($filter);
$landO->load_by_filter($filter);

$page_title = "Admin page";
$panel_heading = "Admin";
$page_body = "admin_template.php";


include "templates/template.php";

/*
echo "<pre>";
print_r($farmer);
echo "</pre>";
*/
?>