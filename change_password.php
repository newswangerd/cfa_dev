<?php
include_once "models/model_form.php";
session_start();
$_POST = array();
/* include_once "models/landowner_model.php";
include_once "models/farmer_model.php";
include_once "models/admin_model.php"; */ 
	$form;
	if($_SESSION['type'] == "Farmer"){
		include "models/farmer_model.php";
		$form = new FarmerForm();
	}
	else if ($_SESSION['type'] == "Landowner"){
		include "models/landowner_model.php";
		$form = new LandownerForm();
	}
	else {
		include "models/admin_model.php";
		$form = new AdminForm();
	}
	
	$form->load_by_pk($_SESSION['usr_id']);
	
	if(isset($_POST))
	if($_POST['new_password'] == $_POST['password_confirm']){
		$form->fields['password'] = $_POST['new_password'];
		
		if($form->save()){
			echo "Password changed successfully.";
		}
		else {
			echo "Password not changed.";
		}
	}
	
	$page_title = "Change Password";
	$panel_heading = "Change your password";
	$page_body = "change_password_template.php";

	include "templates/template.php";
	
?>