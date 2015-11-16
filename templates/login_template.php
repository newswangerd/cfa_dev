
<form action = "login.php" method = "post">

<div class="col-sm-6">
	    <div class="control-group">
      <label class="control-label" for="first_name">First Name</label>
      <div class="controls">
        <input type="text" id="first_name" name="first_name" placeholder="" value="<?php echo $fields['first_name'] ?>" class="form-control input-lg">
        <span class="text-danger"><?php echo $errors['first_name']; ?></span>
      </div>
    </div>
	<br>
	<div class="control-group">
      <label class="control-label" for="last_name">Last Name</label>
      <div class="controls">
        <input type="text" id="last_name" name="last_name" placeholder="" value="<?php echo $fields['last_name'] ?>" class="form-control input-lg">
		<span class="text-danger"><?php echo $errors['last_name']; ?></span>
        <br>
      </div>
    </div>
	
    <div class="control-group">
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="email" id="email" name="email" placeholder="" value="<?php echo $fields['email'] ?>" class="form-control input-lg">
		<span class="text-danger"><?php echo $errors['email']; ?></span>
      </div>
    </div>
</div>

    <div class="col-sm-6">
	
		<div class="control-group">
		  <label class="control-label" for="password">Password</label>
		  <div class="controls">
			<input type="password" id="password" name="password" placeholder="" class="form-control input-lg"><br>
			<span class="text-danger"><?php echo $errors['password']; ?></span>
		  </div>
		</div>
		<div class="control-group">
		  <label class="control-label" for="confirm_password">Password (Type it again)</label>
		  <div class="controls">
			<input type="password" id="confirm_password" name="password_confirm" placeholder="" class="form-control input-lg">
			<span class="text-danger"><?php echo $errors['password']; ?></span>
		  </div>
		</div>
		<br>
		
		<div class="control-group">
		  <label class="control-label" for="sel1">Do you want to login as a...</label>
		  <select class="form-control" name="user_type"  id="sel1">
			<option value=""><?php if (empty($fields['user_type'])||!empty($fields['user_type'])) echo "Select One";?></option>
			<option value="farmer">Farmer</option>
			<option value="landowner">Landowner</option>
			<option value="landowner">Administrator</option>
		  </select>
		  <span class="text-danger"><?php echo $errors['user_type']; ?></span>
		</div>
		<br>
		<div class="container">
		<input type="submit" class="btn btn-primary btn-lg" name="submit" value="Login" />
		</div>
	</div>
</form>
