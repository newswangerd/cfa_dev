<?php 

include "models/farmer_model.php";

$form = new FarmerForm();
$form->load_from_post();

echo "<pre>";
print_r($_POST);
echo "<hr />";
print_r($form->fields);
echo "</pre>";

// Add support for Select
$page_title = "Farmer Questionnaire";
$panel_heading = "Hello John Doe! Tell us about yourself.";
$page_body = "farmer.php";

include "templates/template.php";

?>