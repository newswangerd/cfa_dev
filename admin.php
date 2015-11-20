<?php
include "models/farmer_model.php";
include "models/landowner_model.php";
$farmer = new FarmerForm();
$landO = new LandownerForm();

$farmer->load_by_filter("");
$landO->load_by_filter("");

$page_title = "Admin page";
$panel_heading = "Admin";
$page_body = "admin_template.php";


include "templates/template.php";

?>