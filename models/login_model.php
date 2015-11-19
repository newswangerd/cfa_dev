<?php 
include "model_form.php";
class LoginForm extends Form {
	function __construct(){
		$this->table_name=NULL;
		$this->id_name=NULL;
		// General Information
		$this->fields['email'] = new TextField();
		$this->fields['password'] = new TextField();
		$this->fields['user_type'] = new TextField();
	}
}
?>		