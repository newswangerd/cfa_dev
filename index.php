<?php

//We should write some sort of validation to make sure that people aren't trying to sign up with emails that are already in the system.

session_start();

$fields = array('fname' => '', 'lname' => '', 'email'=> '', 'password'=> '', 'password_confirm'=> '', 'choosePurpose' => '', 'phone' => '', 'address' => '');
$error = array('fname' => '', 'lname' => '', 'email'=> '', 'password'=> '', 'password_confirm'=> '', 'choosePurpose' => '', 'phone' => '', 'address' => '');

$valid = true;

if (!empty($_POST)){
	foreach ($fields as $key => $value){
		if (!empty($_POST[$key])){
			$fields[$key] = $_POST[$key];
		} else {
			$valid = false;
			$error[$key] = "This field is required";
		}
	}

	if ($valid and $fields["password_confirm"] != $fields["password"]){
		$fields["password_confirm"] = "";
		$fields["password"] == "";
		$error["password"] = "Passwords must match";
		$valid = false;
	}

	if ($valid){
		foreach ($fields as $key => $value) {
			$_SESSION[$key] = $value;
		}

		if ($fields['choosePurpose'] == "farmer"){
				header('Location: farmerq.php');
				die();
			} elseif($fields['choosePurpose'] == "landowner") {
				header('Location: landownerq.php');
				die();
		}
	}
}


// Add support for Select
$page_title = "Register";
$panel_heading = "Register";
$page_body = "register_template.php";


include "templates/template.php";
?>