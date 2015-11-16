<?php
include "models/admin_model.php";
$form = new AdminInterface();
$data = $form->load_from_post();


$page_title = "Admin page";
$panel_heading = "Admin";
$page_body = "admin_template.php";


include "templates/template.php";

?>