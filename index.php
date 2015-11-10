<?php

// Add support for Select
$page_title = "Register";
$panel_heading = "Register";
$page_body = "register.php";



//Validating the registration data
if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["password"])
	&& isset($_POST["password_confirm"]))
$first_name = $_POST["fname"];
$last_name = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$password_confirm = $_POST["password_confirm"];
$choosePurpose = $_POST["choosePurpose"];

include "templates/template.php";
?>