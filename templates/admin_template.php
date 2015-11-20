<form action = "admin.php" method = "post">
<div class="row">
	<?php if($request){
		echo '<div class="alert alert-danger" role="alert">Please select at least one filter criterion!</div>';}?>
	<div class="col-sm-2"><h3>Filter by:</h3></div>
	<div class="col-sm-6">
	<label class="checkbox-inline"><input type="checkbox" name="lease" value="">Lease</label>
	<label class="checkbox-inline"><input type="checkbox" name="buy_sell" value="">Buy/Sell</label>
	<label class="checkbox-inline"><input type="checkbox" name="intern" value="">Intern</label><br>
	<label class="checkbox-inline"><input type="checkbox" name="vegetable" value="">Vegetable</label>
	<label class="checkbox-inline"><input type="checkbox" name="livestock" value="">Livestock</label>
	<label class="checkbox-inline"><input type="checkbox" name="aquaculture" value="">Aquaculture</label>
	<label class="checkbox-inline"><input type="checkbox" name="tobacco" value="">Tobacco</label>
	<label class="checkbox-inline"><input type="checkbox" name="row_crops" value="">Row Crops</label><br>
	<label class="checkbox-inline"><input type="checkbox" name="northern" value="">Northern</label>
	<label class="checkbox-inline"><input type="checkbox" name="southern" value="">Southern</label>
	<label class="checkbox-inline"><input type="checkbox" name="eastern" value="">Eastern</label>
	<label class="checkbox-inline"><input type="checkbox" name="western" value="">Western</label>
	</div>
	<div class="col-sm-2"><button type="submit" class="btn btn-primary btn-md" name="submit">Filter</button></div>
	<div class="col-sm-2"<form action = "admin.php" method = "post" >
	<label class="checkbox-inline"><input type="checkbox" name="lease" value="">View <br> All Applicants</label</form>
</div>
</form>
</div>


<div class="row">
	<div class="col-sm-6 well">
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
				<td><a href="#" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Modal%s">See Profile</a>
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
				<td><a href="#" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Modal%s">See Profile</a>
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
<div class="modal fade" id="#Modal%s" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        %s
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
'

while ($farmer->load_next()){
	$modal_body = "";
	foreach ($farmer->fields as $key => $value) {
		$modal_body = $modal_body . '<br />' . $value;
	}

	sprintf($template, $farmer->id_instance, $modal_body)
}

?>