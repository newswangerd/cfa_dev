
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
	</form><br><br><br>
	
	<center><div class="row"></center>
		<div class="col-sm-6">Farmers</div>
		<div class="col-sm-6">Land Owners</div>
	</div>