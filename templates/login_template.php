
<form action = "login.php" method = "post">

<div class="col-sm-6">
	    <div class="control-group">
      <label class="control-label" for="fname">First Name</label>
      <div class="controls">
        <input type="text" id="fname" name="fname" placeholder=""  class="form-control input-lg">
        <br>
      </div>
    </div>
 
	<div class="control-group">
      <label class="control-label" for="lname">Last Name</label>
      <div class="controls">
        <input type="text" id="lname" name="lname" placeholder="" class="form-control input-lg">
        <br>
      </div>
    </div>
	
    <div class="control-group">
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="email" id="email" name="email" placeholder="" class="form-control input-lg">
      </div>
    </div>
</div>

    <div class="col-sm-6">
	
		<div class="control-group">
		  <label class="control-label" for="password">Password</label>
		  <div class="controls">
			<input type="password" id="password" name="password" placeholder="" class="form-control input-lg"><br>
		  </div>
		</div>
	 
		<div class="control-group">
		  <label class="control-label" for="password_confirm">Password (Type it again)</label>
		  <div class="controls">
			<input type="password" id="password_confirm" name="password_confirm" placeholder="" class="form-control input-lg">
		  </div>
		</div>
		<br>
		
		<div class="control-group">
		  <label class="control-label" for="sel1">Do want to login as a...</label>
		  <select class="form-control" name="user_type"  id="sel1">
			<option value="farmer">Farmer</option>
			<option value="landowner">Landowner</option>
		  </select>
		</div>
		<br>
		<div class="container">
		  <button type="button" class="btn btn-info btn-lg">Login</button>      
		</div>

	</div>
</form>
