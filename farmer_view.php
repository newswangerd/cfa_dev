<?php
	include "models/farmer_model.php";
	include_once "models/model_form.php";
	session_start();

if(isset($_SESSION['email'])){
	$form = new FarmerForm();
	$form->load_by_filter(array());
	while($form->load_next()){
		
	}
$error = array('fname' => '', 'lname' => '', 'phone'=> '','email' => '', 'address' => '', 'password'=> '', 'password_confirm'=>'');
$fields = array('fname' => $form->fields['first_name'], 'lname' => $form->fields['last_name'], 'phone'=> $form->fields['phone'],
					'email' => $form->fields['email'], 'address' => $form->fields['address'], 'password'=> '', 'password_confirm'=>'');
}
	
// Add support for Select
$page_title = "Farmer edit";
$panel_heading = "Edit";
$page_body = "farmer_view_template.php";


include "templates/template.php";
?>