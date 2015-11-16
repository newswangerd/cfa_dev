<?php
session_start();
$fields = array('first_name' => '', 'last_name' => '', 'email'=> '', 'password'=> '', 'confirm_password'=> '', 'user_type' => '');
$errors = array('first_name' => '', 'last_name' => '', 'email'=> '', 'password'=> '', 'confirm_password'=> '', 'user_type' => '');

$valid = true;

if (!empty($_POST)){
	foreach ($fields as $key => $value){
		if (!empty($_POST[$key])){
			$fields[$key] = $_POST[$key];
		} else {
			$valid = false;
			$errors[$key] = "This field is required";
		}
	}

	if ($valid and $fields["confirm_password"] != $fields["password"]){
		$fields["confirm_password"] = "";
		$fields["password"] == "";
		$errors["password"] = "Passwords did not match";
		$valid = false;
	}

	if ($valid){
		foreach ($fields as $key => $value) {
			$_SESSION[$key] = $value;
		}

		if ($fields['user_type'] == "farmer"){
				header('Location: farmer_edit.php');
				die();
			} elseif($fields['user_type'] == "landowner") {
				header('Location: landowner_edit.php');
				die();
		}
	}
}

$page_title = "User Login";
$panel_heading = "Login";
$page_body = "login_template.php";


include "templates/template.php";

?>