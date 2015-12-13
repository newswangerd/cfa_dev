<?php
//We should write some sort of validation to make sure that people aren't trying to sign up with emails that are already in the system.
session_set_cookie_params(0);
session_start();

/* include "models/admin_model.php";
$pass = new PasswordField();
		$pass->new_password(MartinRichards);
		echo $pass->value; */

//the following arrays are used to populate the form, and indicate error message in each field, if the post operation received false/incomplete/invalid data
$fields = array('fname' => '', 'lname' => '', 'email'=> '', 'password'=> '', 'password_confirm'=> '', 'choosePurpose' => '', 'phone' => '', 'street' => '', 'city' => '', 'zip' => '');
$error = array('fname' => '', 'lname' => '', 'email'=> '', 'password'=> '', 'password_confirm'=> '', 'choosePurpose' => '', 'phone' => '', 'street' => '', 'city' => '', 'zip' => '');

$valid = true;

if (!empty($_POST)){//if post exists, then store the data in the arrays if the field is not empty
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
		foreach ($fields as $key => $value) {// set session variable
			$_SESSION[$key] = $value;
		}

		if ($fields['choosePurpose'] == "farmer"){// depending on the type of the user, take the user to the corresponding page/questionnaire
				header('Location: farmerq.php');
				die();
			} elseif($fields['choosePurpose'] == "landowner") {
				header('Location: landownerq.php');
				die();
		}
	}
}

$login = "login_button.php";


// Add support for Select
$page_title = "Register";
$panel_heading = "Register";
$page_body = "register_template.php";


include "templates/template.php";
?>