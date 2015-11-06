 <?php 

include "models/landowner_model.php";

$form = new LandownerForm();
$form->load_from_post();

$page_title = "Landowner Questionnaire";
$panel_heading = "Hello John Doe! Tell us about your land.";
$page_body = "landowner.php";

include "templates/template.php";

 ?>