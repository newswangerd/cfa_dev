<?php
	include "models/landowner_model.php";

	$error = array('fname' => '', 'lname' => '', 'phone'=> '','email' => '', 'address' => '', 'password'=> '', 'password_confirm'=>'');
	$fields = array('fname' => '', 'lname' => '', 'phone'=> '','email' => '', 'address' => '', 'password'=> '', 'password_confirm'=>'');

	$form = new LandownerForm();
	$data = $form->load_from_post();
	
// Add support for Select
$page_title = "Landowner edit";
$panel_heading = "Edit";
$page_body = "landowner_view_template.php";


include "templates/template.php";
?>