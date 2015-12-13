<?php
session_set_cookie_params(0);
session_start();

if(isset($_SESSION['type'])){
	if ($_SESSION['type'] != "Administrator"){
		header('Location: index.php');
	}
} else {
	header('Location: index.php');
}

$filter = "";

if(!empty($_SESSION['email'])){
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
					"enabled"=> "checked",
					);

	if (!empty($_POST)){
		$operators = array();
		foreach ($post_data as $key => $value){
			if (isset($_POST[$key])){
				$post_data[$key] = "checked";
				if ($key != "livestock"){
					$filter = $filter . $key . " = true AND ";
				}
			} else {
				$post_data[$key] = "";
			}
		}

		if (isset($_POST['livestock'])){
			$filter = $filter . "(livestock_cattle_dairy = 'true' OR livestock_cattle_beef = 'true' OR livestock_poultry = 'true' OR livestock_hogs = 'true' OR livestock_goats = 'true' OR livestock_sheep = 'true' OR livestock_horses = 'true')";
		} else {
			$filter = substr($filter,0 ,-4);
		}

	} else {
		$filter = "nothing";
	}

	$farmer = new FarmerForm();
	$landO = new LandownerForm();

	$check_post = false;
	if(isset($_POST)){
	
	$farmer->load_by_filter($filter);
	$landO->load_by_filter($filter);
	$check_post = true;
	}
	else $check_post = false;

	$logout = "logout_button.php";
	$page_title = "Admin page";

	$panel_heading = "Welcome back, " . $_SESSION['first_name'] . '!';
	
	$page_body = "admin_template.php";


	include "templates/template.php";
}

	else {
		session_unset();
		session_destroy();
		header('Location: index.php');
	}
?>