<form action = "admin.php" method = "post">
<div class="row">
	<center><h4 class="text-primary">To display all of the applicants in the database, directly click the Filter button without selecting anything.</h4>
				<h4 class="text-primary">Select one or more of the options to filter out.</h4></center><br>
	<div class="col-sm-2"><h3>Filter by:</h3></div>
	<div class="col-sm-8">
	<table class="table table-condensed">
		<tr>
			<th>Terms</th>
			<td><label class="checkbox-inline"><input type="checkbox" name="to_rent" <?php echo $post_data['to_rent'] ?> >Lease</label></td>
			<td><label class="checkbox-inline"><input type="checkbox" name="to_sell" <?php echo $post_data['to_sell'] ?> >Buy/Sell</label></td>
			<td><label class="checkbox-inline"><input type="checkbox" name="to_intern" <?php echo $post_data['to_intern'] ?> >Intern</label></td>
			<td><label class="checkbox-inline"><input type="checkbox" name="to_other" <?php echo $post_data['to_other'] ?> >Other</label></td>
		</tr>
		<tr>
			<th>Ag Type</th>
			<td><label class="checkbox-inline"><input type="checkbox" name="horticulture" <?php echo $post_data['horticulture'] ?> >Horticulture</label></td>
			<td><label class="checkbox-inline"><input type="checkbox" name="livestock" <?php echo $post_data['livestock'] ?> >Livestock</label></td>
			<td><label class="checkbox-inline"><input type="checkbox" name="aquaculture" <?php echo $post_data['aquaculture'] ?> >Aquaculture</label></td>
			<td><label class="checkbox-inline"><input type="checkbox" name="tobacco" <?php echo $post_data['tobacco'] ?> >Tobacco</label></td>
			<td><label class="checkbox-inline"><input type="checkbox" name="rowcrops" <?php echo $post_data['rowcrops'] ?> >Row Crops</label></td>
		</tr>
		<tr>
			<th>Location</th>
			<td><label class="checkbox-inline"><input type="checkbox" name="northern" <?php echo $post_data['northern'] ?> >Northern</label></td>
			<td><label class="checkbox-inline"><input type="checkbox" name="central" <?php echo $post_data['central'] ?> >Central</label></td>
			<td><label class="checkbox-inline"><input type="checkbox" name="eastern" <?php echo $post_data['eastern'] ?> >Eastern</label></td>
			<td><label class="checkbox-inline"><input type="checkbox" name="western" <?php echo $post_data['western'] ?> >Western</label></td>
		</tr>
	</table>
	</div>
	<div class="col-sm-2"><button type="submit" class="btn btn-primary btn-md" name="submit">Filter</button></div>
</div>
</form>


<div class="row">
	<div class="col-sm-6 well">
		<center><h4>Farmers:
		<?php echo " ".$farmer->number_of_instances();?>
		</h4></center>
		<table class="table table-condensed">
			<tr>
				<th></th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
			</tr>
			<?php
			$template = '
			<tr>
				<td><a href="#" class="btn btn-default btn-xs" data-toggle="modal" data-target="#farmerModal%s">See Profile</a>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
			</tr>'; 
			while ($farmer->load_next()){
				echo sprintf($template, $farmer->id_instance, $farmer->fields['first_name'], $farmer->fields['last_name'], $farmer->fields['email']);
			}

			?>
		</table>
	</div>
	<div class="col-sm-6 well">
		<center><h4>Landowners:
		<?php echo " ".$landO->number_of_instances();?>
		</h4></center>
		<table class="table table-condensed">
			<tr>
				<th></th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
			</tr>
			<?php
			$template = '
			<tr>
				<td><a href="#" class="btn btn-default btn-xs" data-toggle="modal" data-target="#landModal%s">See Profile</a>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
			</tr>'; 
			while ($landO->load_next()){
				echo sprintf($template, $landO->id_instance, $landO->fields['first_name'], $landO->fields['last_name'], $landO->fields['email']);
			}

			?>
		</table>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        Test test test
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php

$template = '
<div class="modal fade" id="farmerModal%s" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <div class="panel panel-primary">
    <div class="modal-content">
	<div class="panel-heading" style="background-color:#FFFF99;">
	<div class="container-fluid panel-container">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 style="color:red;"> <span class="modal-title" id="myModalLabel"></span>Profile of  %s %s</h4></center>
      </div>
	  </div>
	  </div>
      <div class="modal-body">
      <table class="table table-condensed">
       %s
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
	</div>
  </div>
</div>
';

while ($farmer->load_next()){
	$modal_body = "";
	foreach ($farmer->fields as $key => $value) {
		$modal_body = $modal_body . '<tr><th>'. $value->name . "</th><td>" . $value->get_value() . '</td></tr>';
	}

	echo sprintf($template, $farmer->id_instance,$farmer->fields['first_name'], $farmer->fields['last_name'], $modal_body);
}

$template = '
<div class="modal fade" id="landModal%s" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <div class="panel panel-primary">
    <div class="modal-content">
	<div class="panel-heading" style="background-color:#FFFF99;">
	<div class="container-fluid panel-container">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 style="color:red;"> <span class="modal-title" id="myModalLabel"></span>Profile of  %s %s</h4></center>
      </div>
	  </div>
	  </div>
      <div class="modal-body">
      <table class="table table-condensed">
       %s
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
	</div>
  </div>
</div>
';

while ($landO->load_next()){
	$modal_body = "";
	foreach ($landO->fields as $key => $value) {
		$modal_body = $modal_body . '<tr><th>'. $value->name . "</th><td>" . $value->get_value() . '</td></tr>';
	}

	echo sprintf($template, $landO->id_instance, $landO->fields['first_name'], $landO->fields['last_name'], $modal_body);
}
?>