 <form class="form-horizontal" action="" method="POST">

  <div class="col-sm-6">
    <div class="control-group">
      <label class="control-label" for="fname">First Name</label>
      <div class="controls">
        <input type="text" id="fname" name="fname" placeholder="" value="<?php echo $fields['fname'] ?>" class="form-control input-lg">
        <span class="text-danger"><?php echo $error['fname']; ?></span>
      </div>
    </div>
 
	<div class="control-group">
      <label class="control-label" for="lname">Last Name</label>
      <div class="controls">
        <input type="text" id="lname" name="lname" placeholder="" value="<?php echo $fields['lname'] ?>" class="form-control input-lg">
        <span class="text-danger"><?php echo $error['lname']; ?></span>
      </div>
    </div>

      <div class="control-group">
      <label class="control-label" for="phone">Phone Number</label>
      <div class="controls">
        <input type="text" id="phone" name="phone" placeholder="" value="<?php echo $fields['phone'] ?>" class="form-control input-lg">
        <p class="help-block">Please provide your Phone Number</p>
        <span class="text-danger"><?php echo $error['phone']; ?></span>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="email" id="email" name="email" placeholder="" value="<?php echo $fields['email'] ?>" class="form-control input-lg">
        <p class="help-block">Please provide your E-mail</p>
        <span class="text-danger"><?php echo $error['email']; ?></span>
      </div>
    </div>
	
  </div>

    <div class="col-sm-6">
	
	<div class="control-group">
      <label class="control-label" for="address">Address: Street, City, Zip, State</label>
      <div class="controls">
        <input type="address" id="address" name="address" placeholder="" value="<?php echo $fields['address'] ?>" class="form-control input-lg">
        <span class="text-danger"><?php echo $error['address']; ?></span>
      </div>
    </div>
	
    <div class="control-group">
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="form-control input-lg">
        <p class="help-block">Password should be at least 6 characters</p>
        <span class="text-danger"><?php echo $error['password']; ?></span>
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label" for="password_confirm">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="form-control input-lg">
        <span class="text-danger"><?php echo $error['password_confirm']; ?></span>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="sel1">Are You Looking For...</label>
	  <select class="form-control" name="choosePurpose"  id="sel1">
        <option value=""><?php if (!empty($fields['choosePurpose'])||empty($fields['choosePurpose'])) echo "Select One";?></option>
        <option value="farmer">Land To Farm</option>
        <option value="landowner">Someone to Farm on Your Land</option>
      </select>
      <span class="text-danger"><?php echo $error['choosePurpose']; ?></span>
    </div>

    </div>
 
</br>
</br>

 <div class="col-sm-12 text-center">
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Next -></button>
      </div>
    </div>
 </div>
</form>