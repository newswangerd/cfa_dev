<?php
include "models/admin_model.php";
$form = new AdminInterface();
$request = $form->load_from_post();

$form->load_by_filter($request['lease'], $operator = "");

$page_title = "Admin page";
$panel_heading = "Admin";
$page_body = "admin_template.php";


include "templates/template.php";

?>