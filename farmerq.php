<?php 

include "models/farmer_model.php";

$form = new FarmerForm();
$data = $form->load_from_post();
$form->fields['first_name']->set_value($_SESSION['first_name']);
$form->fields['last_name']->set_value($_SESSION['last_name']);
$form->fields['address']->set_value($_SESSION['address']);


// If data is received, validate it.
$is_valid = true;
if($data){
	$is_valid = $form->validate();
}

// Add support for Select
$page_title = "Farmer Questionnaire";
$panel_heading = "Hello John Doe! Tell us about yourself.";
$page_body = "farmer.php";

include "templates/template.php";

/*
echo "<pre>";
print_r($_POST);
echo "<hr />";
print_r($form->fields);
echo "</pre>";
*/
?>