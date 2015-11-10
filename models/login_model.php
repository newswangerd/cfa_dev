
<?php 
include "model_form.php";
class LoginForm extends Form {
	function __construct(){
		$this->table_name="administrator";
		$this->id_name="admin_id";
		// General Information
		$this->fields['first_name'] = new TextField();
		$this->fields['last_name'] = new TextField();
		$this->fields['email'] = new TextField();
		$this->fields['password'] = new TextField();
		
?>
		