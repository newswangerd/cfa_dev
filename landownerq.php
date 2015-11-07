 <?php 

include "models/landowner_model.php";

$form = new LandownerForm();
$data = $form->load_from_post();

// If data is received, validate it.
$is_valid = true;
if($data){
	$is_valid = $form->validate();
}

$page_title = "Landowner Questionnaire";
$panel_heading = "Hello John Doe! Tell us about your land.";
$page_body = "landowner.php";

include "templates/template.php";

echo "<pre>";
print_r($_POST);
echo "<hr />";
print_r($form->fields);
echo "</pre>";

?>