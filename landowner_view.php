<?php
	include "models/landowner_model.php";
	include_once "models/model_form.php";
	session_start();

	//takes teh session id, and loads the corresponding record from the table reference by the current object, and populate the page with that record
	if(!empty($_SESSION['email'])){
		$form = new LandownerForm();
		$form->load_by_pk($_SESSION['usr_id']);

	//handle post operation
	$info = $form->load_from_post();
	$saved = false;

	if($info){
		// Sets the "describe" fields to not required if the checkbox isn't set
		if (!$form->fields['to_other']->value){
			$form->fields['terms_other']->set_required(false);
		}

		if (!$form->fields['housing']->value){
			$form->fields['describe_housing']->set_required(false);
		}

		if (!$form->fields['equipment']->value){
			$form->fields['equipment_other']->set_required(false);
		}

		$is_valid = $form->validate(); //validate the data
		
		if($is_valid){ // if the data is valid, save it to the database
			if($form->save()){
				$saved = true; //variable for indicating to the user if the info was saved successfully
			}
			else {
				echo "not saved";
			}
		}
	}

	$logout = "logout_button.php";

	$page_title = "Landowner edit";
	$panel_heading = "Edit";
	$page_body = "landowner_view_template.php";


	include "templates/template.php";

	}
	else {
		session_unset();
		session_destroy();
		header('Location: index.php');
	}
?>