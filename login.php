<?php
session_start();
	include "models/farmer_model.php";
	include "models/landowner_model.php";
	include "models/admin_model.php";

	//associative arrays for handling data from the login operation and displaying error message if invalid data is found
	$login_fields = array('email' => '', 'password' => '', 'user_type'=> '');
	$errors = array('email' => '', 'password' => '', 'user_type'=> '');

	$valid = true;
	if (!empty($_POST)){//if post has data, store them in the $login_fields rray
		foreach ($login_fields as $key => $value){
			if (!empty($_POST[$key])){
				$login_fields[$key] = $_POST[$key];
			} else {
				$valid = false;
				$errors[$key] = "This field is required";
			}
		}
			
	if($valid){//if the fields are valid, do the login query
				//check if the typed password matches the one in the database, if so the user will be logged in and directed to the correct page, else redirect to login page
			$valid_password = false;
			$redirect = "";
			if($login_fields['user_type']=="Farmer"){
				$form = new FarmerForm();
				$checkQuery = $form->load_by_filter(array("email"=>$_POST['email']));
				if($checkQuery){
					if($form->fields['password']->authenticate($_POST['password'])){
							$redirect = "Location: farmer_view.php";
							$valid_password = true;
						}
				}
			}
			if($login_fields['user_type']=="Landowner"){
				$form = new LandownerForm();
				$checkQuery = $form->load_by_filter(array("email"=>$_POST['email']));
				if($checkQuery){
					if($form->fields['password']->authenticate($_POST['password'])){
							$redirect = "Location: landowner_view.php";
							$valid_password = true;
						}
				}
			}
			if($login_fields['user_type']=="Administrator"){
				$form = new AdminForm();
				$checkQuery = $form->load_by_filter(array("email"=>$_POST['email']));
				if($checkQuery){
					if($form->fields['password']->authenticate($_POST['password'])){
							$redirect = "Location: admin.php";
							$valid_password = true;
						}
				}
			}
		if($valid_password == true){
			$_SESSION['type'] = $login_fields['user_type'];
			$_SESSION['first_name'] = $form->fields['first_name']->get_value();
			$_SESSION['last_name'] = $form->fields['last_name']->get_value();
			$_SESSION['usr_id'] = $form->id_instance;
			$_SESSION['email'] = $form->fields['email']->get_value();
			header($redirect);
			die();
		}
		else {
			$errors['password'] = "Invalid password";
		}
			
	}
	}
	// Add support for Select
	$page_title = "Login Page";
	$panel_heading = "Login";
	$page_body = "login_template.php";


	include "templates/template.php";

?>