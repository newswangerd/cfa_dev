	<?php
		//start session
		session_set_cookie_params(0);
		session_start();

		//if the session['email'] is not empty, this page should be accessible directly
		if(isset($_SESSION['type'])){
			if ($_SESSION['type'] != "Administrator"){
				header('Location: index.php');
			}
		} else {
			header('Location: index.php');
		}

	} else {
		header('Location: index.php');
	}

	$filter = "";

	if(!empty($_SESSION['email'])){
		include "models/farmer_model.php";
		include "models/landowner_model.php";

		$post_data = array(
						"to_rent"=> "",
						"to_sell"=> "",
						"to_intern"=> "",
						"to_other"=> "",
						"horticulture"=> "", 
						"livestock"=> "",
						"aquaculture"=> "", 
						"tobacco"=> "",
						"rowcrops"=> "",
						"northern"=> "",
						"central"=> "",
						"eastern"=> "",
						"western"=> "",
						"enabled"=> "checked",
						);

		if(!empty($_SESSION['email'])){
			include "models/farmer_model.php";
			include "models/landowner_model.php";
			//the following associative array stores the search criteria
			$post_data = array(
							"to_rent"=> "",
							"to_sell"=> "",
							"to_intern"=> "",
							"to_other"=> "",
							"horticulture"=> "", 
							"livestock"=> "",
							"aquaculture"=> "", 
							"tobacco"=> "",
							"rowcrops"=> "",
							"northern"=> "",
							"central"=> "",
							"eastern"=> "",
							"western"=> "",
							"enabled"=> "checked",
							);
			//if filter operation is sent by the post variable, then take the search criteria and store them in the filter array
			if (!empty($_POST)){
				$operators = array();
				foreach ($post_data as $key => $value){
					if (isset($_POST[$key])){
						$post_data[$key] = "checked";
						if ($key != "livestock"){
							$filter = $filter . $key . " = true AND ";
						}
					} else {
						$post_data[$key] = "";
					}
				}

				if (isset($_POST['livestock'])){//livestock has different categories, so if it is one of the fiter criteria, combine the different possibilities
					$filter = $filter . "(livestock_cattle_dairy = 'true' OR livestock_cattle_beef = 'true' OR livestock_poultry = 'true' OR livestock_hogs = 'true' OR livestock_goats = 'true' OR livestock_sheep = 'true' OR livestock_horses = 'true')";
				} else {
					$filter = substr($filter,0 ,-4);
				}

			} else {//if no post operation, display the number of farmers and landowners in the database, but do not list them
				$filter = "nothing";
			}
			
			// create the objects
			$farmer = new FarmerForm();
			$landO = new LandownerForm();


			if(isset($_POST)){//if the post is set, load the records from the database to the $fields array in the Form class

			$check_post = false;
			if(isset($_POST)){

			$farmer->load_by_filter($filter);
			$landO->load_by_filter($filter);
			$check_post = true;
			}

			// set the variables for displaying the admin page
			$logout = "logout_button.php";
			$page_title = "Admin page";

			$panel_heading = "Welcome back, " . $_SESSION['first_name'] . '!';
			
			$page_body = "admin_template.php";


			include "templates/template.php";
		}

			else {
				session_unset();
				session_destroy();
				header('Location: index.php');
			}
	?>