
<form action = "" method = "post">

<div class="col-xs-12">
    <div class="control-group">
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="email" id="email" name="email" placeholder="" value="<?php echo $fields['email'] ?>" class="form-control input-lg">
		<span class="text-danger"><?php echo $errors['email']; ?></span>
      </div>
    </div>	<br>
		<div class="control-group">
		  <label class="control-label" for="password">Password</label>
		  <div class="controls">
			<input type="password" id="password" name="password" placeholder="" class="form-control input-lg"><br>
			<span class="text-danger"><?php echo $errors['password']; ?></span>
		  </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label" for="sel1">Do you want to login as a...</label>
		  <select class="form-control" name="user_type"  id="sel1">
			<option value=""><?php if (empty($fields['user_type'])) echo "Select One"; else echo $fields['user_type']; ?></option>
			<option value="Farmer" type="text">Farmer</option>
			<option value="Landowner" type="text">Landowner</option>
			<option value="Administrator" type="text">Administrator</option>
		  </select>
		  <span class="text-danger"><?php echo $errors['user_type']; ?></span>
		</div>
		<br>
		<div class="container">
		<input type="submit" class="btn btn-primary btn-lg" name="submit" value="Login" />
		</div>
	</div>
</form>
