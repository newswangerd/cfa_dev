<?php
session_start();
//include "models/login_model.php";


$fields = array('email' => '', 'password' => '', 'user_type'=> '');
$errors = array('email' => '', 'password' => '', 'user_type'=> '');
/*

$post_form = new LoginForm();
$post_data = $post_form->load_from_post();
if($post_data){
	$post_email = $post_form->fields['email'];
	echo "post".$post_email."\n";
	$query_form = new LoginForm();
	$test_filter = $query_form->load_by_pk($post_email);
	if(!$test_filter){echo "query".$query_form->fields['email'];
		if($post_form->fields['email']==$query_form->fields['email']){
			if($post_form->fields['password']==$query_form->fields['password']){echo "Equal".$query_form->fields['email'];header('Location: farmerq.php');}
			else echo "enter correct information.";
		}
		else echo "Check it".$query_form->fields['email'];
	}
}*/

$valid = true;
if (!empty($_POST)){
	foreach ($fields as $key => $value){
		if (!empty($_POST[$key])){
			$fields[$key] = $_POST[$key];
		} else {
			$valid = false;
			$errors[$key] = "This field is required";
		}
	}

		/*foreach ($fields as $key => $value) {
			$_SESSION[$key] = $value;
		}*/
if($valid){		
$conn = mysqli_connect("localhost", "cfa_dev", "MartinRichards", "cfa_dev");
	$post_email = $fields['email'];
	$query = "SELECT* FROM farmer WHERE email = '$post_email'";
		if ($result = mysqli_query($conn, $query)) {
			$row = mysqli_fetch_array($result);
		if($row && $row['password']==$fields['password']){
		if ($fields['user_type'] == "Farmer"){
				header('Location: farmerq.php');
			} 
		elseif($fields['user_type'] == "Landowner") {
				die();
				header('Location: landownerq.php');
		}
		elseif ($fields['user_type'] == "Administrator") {
				header('Location: admin.php');
				die();
		}
		}
		
	}
}
}

// Add support for Select
$page_title = "Login Page";
$panel_heading = "Login";
$page_body = "login_template.php";


include "templates/template.php";
?>