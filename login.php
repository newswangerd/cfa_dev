<?php
session_start();
include "models/farmer_model.php";
include "models/landowner_model.php";
include "models/admin_model.php";


$login_fields = array('email' => '', 'password' => '', 'user_type'=> '');
$errors = array('email' => '', 'password' => '', 'user_type'=> '');
/*
	$post_email = $post_form->fields['email'];
	echo "post".$post_email."\n";
	$query_form = new LoginForm();
	$test_filter = $query_form->load_by_filter($post_form->fields("email"=>"kassiey@berea.edu", "first_name"=> "Yhenew"));
}*/

$valid = true;
if (!empty($_POST)){
	foreach ($login_fields as $key => $value){
		if (!empty($_POST[$key])){
			$login_fields[$key] = $_POST[$key];
			//$login_fields[$key] = "$_POST[$value]";
		} else {
			$valid = false;
			$errors[$key] = "This field is required";
		}
	}

		/*foreach ($login_fields as $key => $value) {
			$_SESSION[$key] = $value;
		}*/
if($valid){	
	$post_form = new LoginForm();
	$test_email = $login_fields['email'];
	$query = $post_form->load_by_filter($login_fields('email'=>'$test_email'));// if($query) echo "this".$post_form->$fields['password'];
		if($query)
		if(($post_form->$fields['password'])==$login_fields['password']){//since email is unique load_by_filter
																			//will load one instance only
			if ($login_fields['user_type'] == "Farmer"){
					header('Location: farmerq.php');
				}
			elseif($login_fields['user_type'] == "Landowner") {
					die();
					header('Location: landownerq.php');
			}
			elseif ($login_fields['user_type'] == "Administrator") {
					header('Location: admin.php');
					die();
			}		
			}

/*	
$conn = mysqli_connect("localhost", "cfa_dev", "MartinRichards", "cfa_dev");
	$post_email = $login_fields['email'];
	$query = "SELECT* FROM farmer WHERE email = '$post_email'";
		if ($result = mysqli_query($conn, $query)) {
			$row = mysqli_fetch_array($result);
		if($row && $row['password']==$login_fields['password']){
		if ($login_fields['user_type'] == "Farmer"){
				header('Location: farmerq.php');
			} 
		elseif($login_fields['user_type'] == "Landowner") {
				die();
				header('Location: landownerq.php');
		}
		elseif ($login_fields['user_type'] == "Administrator") {
				header('Location: admin.php');
				die();
		}
		}
		
	}
}
}
*/
}
}
// Add support for Select
$page_title = "Login Page";
$panel_heading = "Login";
$page_body = "login_template.php";


include "templates/template.php";
?>