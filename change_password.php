<?php
include_once "models/model_form.php";
session_start();

if(!empty($_SESSION['email'])){//this prevents bypassing
	
	$form;// declare a global variable for the object to access the tables
			//if user is farmer use farmers table, landowners and admins if landowner or administrator
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
if (!empty($_POST)){//check of post operation is not empty. if a field is empty display message indicating the field is required
	foreach ($err as $key => $value){
		if (empty($_POST[$key])){
			$valid = false;
			$err[$key] = "This field is required";
		}
	}
}
	if(isset($_POST['new_password']) && isset($_POST['password_confirm'])){// check if the password and confirmation match, if not display message uponn post operation
	if ($valid and $_POST["password_confirm"] != $_POST["new_password"]){
		$err["password_confirm"] = "Passwords must match";
		$valid = false;
	}
	}
	
	$form->load_by_pk($_SESSION['usr_id']);//load the data from the table by using the user type
	
$panel_head = false;
	if($valid && isset($_POST['new_password']) && isset($_POST['password_confirm']) && isset($_POST['old_password'])){//if old and new password are set, check if the old
		$pass = new PasswordField(); //password matches the one that's currently in the database, if so check if the newpassowrd and the confirmation match. if they do, save it to the database
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
	//load the html templates for the look of the change_password page
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