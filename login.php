<?php
session_start();
	include "models/farmer_model.php";
	include "models/landowner_model.php";
	include "models/admin_model.php";

	$login_fields = array('email' => '', 'password' => '', 'user_type'=> '');
	$errors = array('email' => '', 'password' => '', 'user_type'=> '');

	$valid = true;
	if (!empty($_POST)){
		foreach ($login_fields as $key => $value){
			if (!empty($_POST[$key])){
				$login_fields[$key] = $_POST[$key];
			} else {
				$valid = false;
				$errors[$key] = "This field is required";
			}
		}
			
	if($valid){
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
							$redirect = "Location: landownerq.php";
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
			$_SESSION['first_name'] = $form->fields['first_name'];
			$_SESSION['last_name'] = $form->fields['last_name'];
			$_SESSION['usr_id'] = $form->fields->$id_instance;
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

echo "<pre>";
echo password_hash("pass", PASSWORD_BCRYPT, array('salt'=>'9CI3fv72o8kj6KI4Vx6Xsd'));
echo  "\n";
print_r($login_fields);
print_r($form);
echo "</pre>";
?>