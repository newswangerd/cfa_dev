<div class="row">
	<div class="col-sm-12">
    <div class="control-group">
      <label class="control-label" for="password">Old Password</label>
      <div class="controls">
        <input type="password" id="password" name="old_password" placeholder="" class="form-control input-lg">
        <span class="text-danger"><?php //echo $error['password']; ?></span>
      </div>
    </div><br>
 
    <div class="control-group">
      <label class="control-label" for="new_passowrd">New Password</label>
      <div class="controls">
        <input type="password" id="new_passowrd" name="new_passowrd" placeholder="" class="form-control input-lg">
        <span class="text-danger"><?php //echo $error['password_confirm']; ?></span>
      </div>
    </div><br>
	
    <div class="control-group">
      <label class="control-label" for="new_passowrd">Passwords must be at least six (6) characters long.</label>
    </div><br>
	
	 <div class="control-group">
      <label class="control-label" for="password_confirm">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="form-control input-lg">
        <span class="text-danger"><?php //echo $error['password_confirm']; ?></span>
      </div>
    </div>
	
	</div>
</div>
