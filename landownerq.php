 <?php 

include "models/landowner_model.php";

$form = new LandownerForm();
$data = $form->load_from_post();

$form->fields['first_name']->set_value($_SESSION['fname']);
$form->fields['last_name']->set_value($_SESSION['lname']);
$form->fields['email']->set_value($_SESSION['email']);
$form->fields['first_name']->set_value($_SESSION['fname']);
$form->fields['phone']->set_value($_SESSION['phone']);
$form->fields['address']->set_value($_SESSION['address']);


// If data is received, validate it.
$is_valid = true;
if($data){
	$is_valid = $form->validate();
	if ($is_valid){
		$form->save();
	}
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