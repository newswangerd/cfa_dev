 <form class="form-horizontal" action="" method="POST">

  <div class="col-sm-6">
    <div class="control-group">
      <label class="control-label" for="fname">First Name</label>
      <div class="controls">
        <input type="text" id="fname" name="fname" placeholder="" class="form-control input-lg">
        <p class="help-block">Username can contain any letters or numbers, without spaces</p>
      </div>
    </div>
 
	<div class="control-group">
      <label class="control-label" for="lname">Last Name</label>
      <div class="controls">
        <input type="text" id="lname" name="lname" value="<?php echo $fields['lname']; ?>" placeholder="" class="form-control input-lg"> 
        <?php echo $erros['lname']; ?>
      </div>
    </div>

      <div class="control-group">
      <label class="control-label" for="phone">Phone Number</label>
      <div class="controls">
        <input type="email" id="phone" name="phone" placeholder="" class="form-control input-lg">
        <p class="help-block">Please provide your Phone Number</p>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="email" id="email" name="email" placeholder="" class="form-control input-lg">
        <p class="help-block">Please provide your E-mail</p>
      </div>
    </div>
 
    </div>

      <div class="control-group">
      <label class="control-label" for="address">Address (Street, City, State, Zip)</label>
      <div class="controls">
        <input type="email" id="address" name="address" placeholder="" class="form-control input-lg">
        <p class="help-block">Please provide your Address</p>
      </div>
    </div>
  </div>

    <div class="col-sm-6">
    <div class="control-group">
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="form-control input-lg">
        <p class="help-block">Password should be at least 6 characters</p>
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label" for="password_confirm">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="form-control input-lg">
        <p class="help-block">Please confirm password</p>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="sel1">Are You Looking For...</label>
	  <select class="form-control" name="choosePurpose" id="sel1">
        <option>...</option>
        <option>Land To Farm</option>
        <option>Someone to Farm on Your Land</option>
      </select>
    </div>

    </div>
 
 <div class="col-sm-12 text-center">
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Next -></button>
      </div>
    </div>
 </div>
</form>