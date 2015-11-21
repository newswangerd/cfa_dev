<?php
session_start();

include "models/farmer_model.php";


$form = new FarmerForm();
$data = $form->load_from_post();


if (!$form->fields['to_other']->value){
	$form->fields['terms_other']->set_required(false);
}

if (!$form->fields['housing']->value){
	$form->fields['describe_housing']->set_required(false);
}

if (!$form->fields['equipment']->value){
	$form->fields['equipment_other']->set_required(false);
}

$form->fields['first_name']->set_value($_SESSION['fname']);
$form->fields['last_name']->set_value($_SESSION['lname']);
$form->fields['email']->set_value($_SESSION['email']);
$form->fields['first_name']->set_value($_SESSION['fname']);
$form->fields['phone']->set_value($_SESSION['phone']);
$form->fields['address']->set_value($_SESSION['address']);
$form->fields['password']->set_value($_SESSION['password']);


// If data is received, validate it.
$is_valid = true;
if($data){
	$is_valid = $form->validate();
	if ($is_valid){
		if($form->save()){
			session_destroy();
			header('Location: confirmation.php');
			die();
		} else {
			session_destroy();
			die("Something has gone horribly wrong with our database. Please try submitting your application again later.");
		}
	}
}

$page_title = "Farmer Questionnaire";
$panel_heading = "Hello ". $form->fields['first_name'] . " " . $form->fields['last_name'] ."! Tell us about yourself.";
$page_body = "farmer_template.php";

include "templates/template.php";

/*
echo "<pre>";
print_r($form);
echo "</pre>";
*/
?>