<?php
	include "models/farmer_model.php";
	include_once "models/model_form.php";
	session_start();
//populate
if(isset($_SESSION['type'])){

	if($_SESSION['type'] == "Farmer"){
		$form = new FarmerForm();
		$form->load_by_pk($_SESSION['usr_id']);
	} elseif ($_SESSION['type'] == "Administrator") {
		if (isset($_POST['farmer_id'])){
			$form = new FarmerForm();
			$form->load_by_pk($_POST['farmer_id']);
		} else { header('Location: admin.php'); }
	} else { header('Location: index.php'); }


//handle post operation

$saved = false;
if(isset($_POST['submit'])){
	$form->load_from_post();

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

	$is_valid = $form->validate();
	if($is_valid AND isset($_POST['submit'])){
		if($form->save()){
			$saved = true;
			/* session_unset(); 
			session_destroy() */;
		}
		else {
			echo "not saved";
			/* session_unset(); 
			session_destroy(); */
		}
	}
}	

$logout = "logout_button.php";

$page_title = "Farmer edit";
$panel_heading = "Edit";
$page_body = "farmer_view_template.php";


include "templates/template.php";
}
else {
		session_unset();
		session_destroy();
		header('Location: index.php');	
}

?>