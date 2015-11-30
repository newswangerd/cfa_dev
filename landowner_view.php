<?php
	include "models/landowner_model.php";
	include_once "models/model_form.php";
	session_start();
//populate

if(isset($_SESSION)){
	$form = new LandownerForm();
	$form->load_by_pk($_SESSION['usr_id']);
}
/* $error = array('fname' => '', 'lname' => '', 'phone'=> '','email' => '', 'address' => '', 'password'=> '', 'password_confirm'=>'');
$fields = array('fname' => $form->fields['first_name'], 'lname' => $form->fields['last_name'], 'phone'=> $form->fields['phone'],
					'email' => $form->fields['email'], 'address' => $form->fields['address'], 'password'=> '', 'password_confirm'=>''); */


//handle post operation
$info = $form->load_from_post();
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

	echo "Check";
	$is_valid = $form->validate();
	
	if($is_valid){
		if($form->save()){
			echo "Saved!";
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

$page_title = "Landowner edit";
$panel_heading = "Edit";
$page_body = "landowner_view_template.php";


include "templates/template.php";

/*
echo "<pre>";
print_r($form);
echo "</pre>";
*/
?>