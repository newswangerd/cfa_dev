<?php 

include "models/farmer_model.php";

$form = new FarmerForm();
$data = $form->load_from_post();

$form->fields['first_name']->set_value($_SESSION['fname']);
$form->fields['last_name']->set_value($_SESSION['lname']);
$form->fields['email']->set_value($_SESSION['email']);
$form->fields['first_name']->set_value($_SESSION['fname']);
$form->fields['phone']->set_value($_SESSION['phone']);
$form->fields['address']->set_value($_SESSION['address']);


// If data is received, validate it.
if($data){
	$form->validate();
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