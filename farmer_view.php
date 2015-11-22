<?php
	include "models/farmer_model.php";

	$error = array('fname' => '', 'lname' => '', 'phone'=> '','email' => '', 'address' => '', 'password'=> '', 'password_confirm'=>'');
	$fields = array('fname' => '', 'lname' => '', 'phone'=> '','email' => '', 'address' => '', 'password'=> '', 'password_confirm'=>'');

	$form = new FarmerForm();
	$data = $form->load_from_post();
	
// Add support for Select
$page_title = "Farmer edit";
$panel_heading = "Edit";
$page_body = "farmer_view_template.php";


include "templates/template.php";
?>