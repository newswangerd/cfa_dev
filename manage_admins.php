<?php
session_start();

if(isset($_SESSION['type'])){
	if ($_SESSION['type'] != "Administrator"){
		header('Location: index.php');
	}
} else {
	header('Location: index.php');
}


include "models/admin_model.php";

$admins = new AdminForm();
$to_edit = new AdminForm();

if (isset($_POST['add_admin'])){
	$to_edit->load_from_post();
	$valid = $to_edit->validate();
	if ($_POST['password2'] != $to_edit->fields['password']->value){
		$valid = false;
	} else {
		$to_edit->fields['password']->hash_pass();
	}

	if ($valid){
		$to_edit->save();
	}

} elseif (isset($_POST['admin_id'])) {
	$to_edit->load_by_pk($_POST['admin_id']);
	$to_edit->load_from_post();
	$valid = $to_edit->validate();
	if($valid){
		$to_edit->save();
		$to_edit = new AdminForm();
	}
}
$admins->load_by_filter("");
$page_title = "Manage Administrators";

$panel_heading = "Manage Administrators";

$page_body = "manage_admins_template.php";

include "templates/template.php";
?>