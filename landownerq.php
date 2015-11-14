<?php 
session_start();

include "models/landowner_model.php";

if (!isset($_SESSION['fname']) or !isset($_SESSION['lname']) or !isset($_SESSION['email']) or !isset($_SESSION['phone']) or !isset($_SESSION['address']) or !isset($_SESSION['password'])){
	print_r($_SESSION);

	//header('Location: index.php');
	//die();
}

$form = new LandownerForm();
$data = $form->load_from_post();


$form->fields['first_name']->set_value($_SESSION['fname']);
$form->fields['last_name']->set_value($_SESSION['lname']);
$form->fields['email']->set_value($_SESSION['email']);
$form->fields['first_name']->set_value($_SESSION['fname']);
$form->fields['phone']->set_value($_SESSION['phone']);
$form->fields['address']->set_value($_SESSION['address']);
$form->fields['password']->set_value($_SESSION['password']);;


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
$page_body = "landowner.php";


//TODO: Fix drowpdowns
include "templates/template.php";

/*
echo "<pre>";
print_r($_POST);
echo "<hr />";
print_r($form->fields);
echo "</pre>";
*/

?>