<?php
	session_set_cookie_params(0); 
	session_start();

	if(!empty($_SESSION['email'])){
		include "models/landowner_model.php";

		$form = new LandownerForm();
		$data = $form->load_from_post();

		if (!$form->fields['to_other']->value){
			$form->fields['terms_other']->set_required(false);
		}

		if (!$form->fields['housing']->value){
			$form->fields['describe_housing']->set_required(false);
		}

		if (!$form->fields['equipment']->value){
			$form->fields['equipment_other']->set_required(false);
		}
	//store the data from the registraiton page to the fields array of the landowner object for later validation and insertion into the database
		$form->fields['first_name']->set_value($_SESSION['fname']);
		$form->fields['last_name']->set_value($_SESSION['lname']);
		$form->fields['email']->set_value($_SESSION['email']);
		$form->fields['first_name']->set_value($_SESSION['fname']);
		$form->fields['phone']->set_value($_SESSION['phone']);
		$form->fields['street']->set_value($_SESSION['street']);
		$form->fields['city']->set_value($_SESSION['city']);
		$form->fields['zip']->set_value($_SESSION['zip']);
		$form->fields['password']->new_password($_SESSION['password']);;


		// If data is received, validate it.
		$is_valid = true;
		if($data){
			$is_valid = $form->validate();
			if ($is_valid){
				if($form->save()){
					session_destroy();
					header('Location: confirmation.php');
					die();
				} else {
					session_destroy();
					die("Something has gone horribly wrong with our database. Please try submitting your application again later.");
				}
			}
		}

		$page_title = "Landowner Questionnaire";
		$panel_heading = "Hello ". $form->fields['first_name'] . " " . $form->fields['last_name'] ."! Tell us about your farm.";
		$page_body = "landowner_template.php";


		include "templates/template.php";
	}
	else {
		session_unset();
		session_destroy();
		header('Location:index.php');
	}
?>