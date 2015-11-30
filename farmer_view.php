<?php
	include "models/farmer_model.php";
	include_once "models/model_form.php";
	session_start();
//populate
if(isset($_SESSION)){
	$form = new FarmerForm();
	$form->load_by_filter(array());
	while($form->load_next()){
		
	}
}
/* $error = array('fname' => '', 'lname' => '', 'phone'=> '','email' => '', 'address' => '', 'password'=> '', 'password_confirm'=>'');
$fields = array('fname' => $form->fields['first_name'], 'lname' => $form->fields['last_name'], 'phone'=> $form->fields['phone'],
					'email' => $form->fields['email'], 'address' => $form->fields['address'], 'password'=> '', 'password_confirm'=>''); */


//handle post operation
$info = $form->load_from_post();
if($info){
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

$page_title = "Farmer edit";
$panel_heading = "Edit";
$page_body = "farmer_view_template.php";


include "templates/template.php";
?>