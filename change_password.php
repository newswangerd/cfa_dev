<?php
include_once "models/model_form.php";
session_start();

if(!empty($_SESSION['email'])){
	
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

$err = array('old_password' => '', 'new_password' => '', 'password_confirm'=> '');
$valid = true;
if (!empty($_POST)){
	foreach ($err as $key => $value){
		if (empty($_POST[$key])){
			$valid = false;
			$err[$key] = "This field is required";
		}
	}
}
	if(isset($_POST['new_password']) && isset($_POST['password_confirm'])){
	if ($valid and $_POST["password_confirm"] != $_POST["new_password"]){
		$err["password_confirm"] = "Passwords must match";
		$valid = false;
	}
	}
	
	$form->load_by_pk($_SESSION['usr_id']);
	
$panel_head = false;
	if($valid && isset($_POST['new_password']) && isset($_POST['password_confirm']) && isset($_POST['old_password'])){
		$pass = new PasswordField();
		$pass->new_password($_POST['old_password']);
		if($pass->value == $form->fields['password']->value){
		if($_POST['new_password'] == $_POST['password_confirm']){
			$form->fields['password']->new_password($_POST['new_password']);
			
			if($form->save()){
				$panel_head = true;
			}
			else {
				echo "Password not changed.";
			}
		}
		}
		else $err['password_confirm'] = "Either old password is incorrect or new passwords do not match.";
	}
	$logout = "logout_button.php";
	$page_title = "Change Password";
	$panel_heading = "Change your password";
	if($panel_head) $panel_heading  = "Success!";
	$page_body = "change_password_template.php";

	include "templates/template.php";
}
else {
	session_unset();
	session_destroy();
	header('Location:index.php');
}	
?>