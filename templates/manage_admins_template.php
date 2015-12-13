<div class="row">
   <form class="well" method="post" action="manage_admins.php">
   <a class='btn btn-default btn-sm' href='admin.php'><-- Return to Admin Page</a>
   <hr />
   <b> Add a New Administrator </b>
   <hr />
   		<div class="form-group">
   			<label>First Name</label>
   			<span class="text-danger"><?php echo $to_edit->fields['first_name']->error; ?></span>
       		<input class="form-control" type="text" name="first_name" value="<?php echo $to_edit->fields['first_name'] ?>" /> 
       	</div>
   		<div class="form-group">
   			<label>Last Name</label>
   			<span class="text-danger"><?php echo $to_edit->fields['last_name']->error; ?></span>
       		<input class="form-control" type="text" name="last_name" value="<?php echo $to_edit->fields['last_name'] ?>" />
       	</div>
   		<div class="form-group">
   			<label>Email</label>
   			<span class="text-danger"><?php echo $to_edit->fields['email']->error; ?></span>
       		<input class="form-control" type="text" name="email" value="<?php echo $to_edit->fields['email'] ?>" />
       	</div>

   		<div class="form-group">
   			<label>Password</label>
   			<span class="text-danger"><?php echo $to_edit->fields['password']->error; ?></span>
       		<input class="form-control" type="password" name="password" value="" />
       	</div>

   		<div class="form-group">
   			<label>Retype Password</label>
   			<span class="text-danger"><?php echo $to_edit->fields['password']->error; ?></span>
       		<input class="form-control" type="password" name="password2" value="" />
       	</div>
       	<input type="submit" class="btn btn-default"  name="add_admin" value="Create a New Admin" />
   </form>
</div>

<div class="row">
	<div class="col-sm-12">
		<center><h4>Administrators:
		<?php echo " ".$admins->number_of_instances();?>
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
				<td><a href="#" class="btn btn-default btn-xs" data-toggle="modal" data-target="#adminModal%s">Edit Profile</a>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
			</tr>'; 
			while ($admins->load_next()){
				echo sprintf($template, $admins->id_instance, $admins->fields['first_name'], $admins->fields['last_name'], $admins->fields['email']);
			}

			?>
		</table>
	</div>

<?php

$template = '
<div class="modal fade" id="adminModal%s" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <div class="panel panel-primary">
    <div class="modal-content">
	<div class="panel-heading"">
	<div class="container-fluid panel-container">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 > <span class="modal-title" id="myModalLabel"></span>%s %s</h4></center>
      </div>
	  </div>
	  </div>
      <div class="modal-body">
       <form method="post" action="manage_admins.php">
       		<div class="form-group">
       			<label>First Name</label>
	       		<input class="form-control" type="text" name="first_name" value="%s" />
	       	</div>
       		<div class="form-group">
       			<label>Last Name</label>
	       		<input class="form-control" type="text" name="last_name" value="%s" />
	       	</div>
       		<div class="form-group">
       			<label>Email</label>
	       		<input class="form-control" type="text" name="email" value="%s" />
	       	</div>

	       	<input type="hidden" name="admin_id" value="%s" />
	       	<input type="submit" class="btn btn-default" value="Save Profile" />
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
	</div>
  </div>
</div>
';

while ($admins->load_next()){

	echo sprintf($template,
		$admins->id_instance,
		$admins->fields['first_name'], 
		$admins->fields['last_name'], 
		$admins->fields['first_name'], 
		$admins->fields['last_name'], 
		$admins->fields['email'], 
		$admins->id_instance);
}
?>