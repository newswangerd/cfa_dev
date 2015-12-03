<?php
session_start();
	
	$form;
	if($_SESSION['type'] == "Farmer"){
		include "models/farmer_model.php";
		$form = new FarmerForm();
	}
	else if ($_SESSION['type'] == "Landowner")){
		include "models/landowner_model.php";
		$form = new LandownerForm();
	}
	else {
		include "models/admin_model.php";
		$form = new AdminForm();
	}
	
	$form->load_bay_pk($_SESSION['usr_id']);
	
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
	$panel_heading = "Change your passowrd";
	$page_body = "change_password_template.php";

	include "templates/template.php";
	
?>