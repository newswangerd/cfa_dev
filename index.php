<?php

session_start();

$fields = array('fname' => '', 'lname' => '', 'email'=> '', 'password'=> '', 'password_confirm'=> '', 'choosePurpose' => '');
$errors = array('fname' => '', 'lname' => '', 'email'=> '', 'password'=> '', 'password_confirm'=> '', 'choosePurpose' => '');

$valid = true;
foreach ($fields as $key => $value){
	if (isset($_POST[$key])){
		$fields[$key] = $_POST[$key];
	} else {
		$valid = false;
		$errors[$key] = "This field is required";
	}
}

if ($valid and $fields["password_confirm"] != $fields["password"]){
	$fields["password_confirm"] = "";
	$fields["password"] == "";
	$errors["password"] = "Passowrd's must match";
	$valid = false;
}

if ($valid){
	foreach ($fields as $key => $value) {
		$_SESSION[$key] = $value;
		// redirrect
	}
}


// Add support for Select
$page_title = "Register";
$panel_heading = "Register";
$page_body = "register.php";


include "templates/template.php";
?>