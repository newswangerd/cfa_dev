<?php ?>
<form action = "farmer_view.php" method = "post">
<div class="row">
	<div class="col-sm-6">
		<br>
		<button type="button" class="btn btn-danger">Deavtivate your account</button>
		<br><br><br>
	    <div class="control-group">
      <label class="control-label" for="fname">First Name</label>
      <div class="controls">
        <input type="text" id="fname" name="first_name" placeholder="" value="<?php echo $form->fields['first_name'] ?>" class="form-control input-lg">
        <span class="text-danger"><?php //echo $error['fname']; ?></span>
      </div>
    </div>
 
	<div class="control-group">
      <label class="control-label" for="lname">Last Name</label>
      <div class="controls">
        <input type="text" id="lname" name="lname" placeholder="" value="<?php echo $form->fields['last_name'] ?>" class="form-control input-lg">
        <span class="text-danger"><?php //echo $error['lname']; ?></span>
      </div>
    </div>

      <div class="control-group">
      <label class="control-label" for="phone">Phone Number</label>
      <div class="controls">
        <input type="text" id="phone" name="phone" placeholder="" value="<?php echo $form->fields['phone'] ?>" class="form-control input-lg">
        <p class="help-block">Please provide your Phone Number</p>
        <span class="text-danger"><?php //echo $error['phone']; ?></span>
      </div>
    </div>
	
	<div class="control-group">
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="email" id="email" name="email" placeholder="" value="<?php echo $form->fields['email'] ?>" class="form-control input-lg">
        <p class="help-block">Please provide your E-mail</p>
        <span class="text-danger"><?php //echo $error['email']; ?></span>
      </div>
    </div>
	
  </div>

    <div class="col-sm-6">
	
	<b>Location</b>
	<br />
		Street:<br />
		<input type="text" name="street" value="<?php echo $form->fields['street']; ?>">
		<span class="text-danger"><?php echo $form->fields['street']->error; ?></span>
		<br />
		City:<br />
		<input type="text" name="city" value="<?php echo $form->fields['city']; ?>">
		<span class="text-danger"><?php echo $form->fields['city']->error; ?></span>
		<br />
		Zip:<br />
		<input type="text" name="zip" value="<?php echo $form->fields['zip']; ?>">
		<span class="text-danger"><?php echo $form->fields['zip']->error; ?></span>
		<br />
	
    <div class="control-group">
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="form-control input-lg">
        <p class="help-block">Password should be at least 6 characters</p>
        <span class="text-danger"><?php //echo $error['password']; ?></span>
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label" for="password_confirm">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="form-control input-lg">
        <span class="text-danger"><?php //echo $error['password_confirm']; ?></span>
      </div>
    </div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-sm-6">
		 <b>Are you looking to...</b>
			<br />
			<input type="checkbox" name="to_rent" <?php echo $form->fields['to_rent']; ?> > Lease or Rent?
			<br />
			<input type="checkbox" name="to_sell" <?php echo $form->fields['to_sell']; ?> > Buy
			<br />
			<input type="checkbox" name="to_intern" <?php echo $form->fields['to_intern']; ?> > Farm Intern or Apprentice? 
			<br />
			<input type="checkbox" name="to_other" <?php echo $form->fields['to_other']; ?> > 
			Other: <input type="text" name="terms_other" value="<?php echo $form->fields['terms_other']; ?>"/>
			<span class="text-danger"><?php echo $form->fields['terms_other']->error; ?></span>
		
		<br/>
		<br/>
	<b>Land Type and Amount (in acres)</b>
		<br>
			Pasture: 
			<br />
			<input type="text" name="pasture" value="<?php echo $form->fields['pasture']; ?>">
			<span class="text-danger"><?php echo $form->fields['pasture']->error; ?></span>
			<br />
			Tillable: 
			<br />
			<input type="text" name="tillable" value="<?php echo $form->fields['tillable']; ?>">
			<span class="text-danger"><?php echo $form->fields['tillable']->error; ?></span>
			<br>
			<br>
			<input type="checkbox" name="organic" <?php echo $form->fields['organic']; ?> > Certified Organic?
		</p>
		<p>
		<b>Housing Needed</b>
		<br>
		<input type="checkbox" name="housing"  <?php echo $form->fields['housing']; ?> > 
		Yes. Describe: <input type="text" name="describe_housing" value="<?php echo $form->fields['describe_housing']; ?>" />
		<span class="text-danger"><?php echo $form->fields['describe_housing']->error; ?></span>
		<br>
		<p>
		<b>Infastructure Needed</b>
			<br>
			<input type="checkbox" name="infrastructure_storage" <?php echo $form->fields['infrastructure_storage']; ?> > Equipment Storage
			<br>
			<input type="checkbox" name="infrastructure_barn" <?php echo $form->fields['infrastructure_barn']; ?> > Livestock Barn
			<br>
			<input type="checkbox" name="infrastructure_stables" <?php echo $form->fields['infrastructure_stables']; ?> > Stables
			<br>
			<input type="checkbox" name="infrastructure_greenhouse" <?php echo $form->fields['infrastructure_greenhouse']; ?> > Greenhouse/High Tunnel
			<br>
		</p>
		<b>Equipment Needed</b>
		<br />
		<input type="checkbox" name="equipment" <?php echo $form->fields['equipment']; ?> > 
		Yes. Describe: <input type="text" name="equipment_other" value="<?php echo $form->fields['equipment_other']; ?>"/>
		<span class="text-danger"><?php echo $form->fields['equipment_other']->error; ?></span>
		<br>
		<br />
		<input type="checkbox" name="irrigation"  <?php echo $form->fields['irrigation']; ?> > Irrigation Needed?

	</div>
	<div class="col-sm-6">
		
		<br />
		<b>Current or Past Farming Endeavors</b>
		<br />
		(Check all that apply)
		<br />
		<input type="checkbox" name="horticulture" <?php echo $form->fields['horticulture']; ?> > Vegetables/Horticulture
		<br />
		Livestock:
		<ul >
			<li> <input type="checkbox" name="livestock_cattle_beef" <?php echo $form->fields['livestock_cattle_beef']; ?> > Cattle-Beef </li>
			<li><input type="checkbox" name="livestock_cattle_dairy" <?php echo $form->fields['livestock_cattle_dairy']; ?> > Cattle-Dairy</li>
			<li><input type="checkbox" name="livestock_poultry" <?php echo $form->fields['livestock_poultry']; ?> > Poultry</li>
			<li><input type="checkbox" name="livestock_hogs" <?php echo $form->fields['livestock_hogs']; ?> > Hogs</li>
			<li><input type="checkbox" name="livestock_goats" <?php echo $form->fields['livestock_goats']; ?> > Goats</li>
			<li><input type="checkbox" name="livestock_sheep" <?php echo $form->fields['livestock_sheep']; ?> > Sheep</li>
			<li><input type="checkbox" name="livestock_horses" <?php echo $form->fields['livestock_horses']; ?> > Horses</li>
		</ul>
		<input type="checkbox" name="aquaculture" <?php echo $form->fields['aquaculture']; ?> > Aquaculture
		<br />
		<input type="checkbox" name="tobacco" <?php echo $form->fields['tobacco']; ?> > Tobacco
		<br />
		<input type="checkbox" name="rowcrops" <?php echo $form->fields['rowcrops']; ?> > Row Crops
		<br >
		<br />
		Rent Lease Agreement
		<select name="lease_agreement">
		  <option value="<?php echo $form->fields['lease_agreement']; ?>">
		  	<?php if(!empty($form->fields['lease_agreement']->value)){echo $form->fields['lease_agreement'];} else {echo 'Select One';} ?>
		  </option>
		  <option value="N/A">I'm not interested in leasing</option>
		  <option value="Short Term (Less than 2 years)">Short Term (Less than 2 years)</option>
		  <option value="Long Term (More than 5 years)">Long Term (More than 5 years)</option>
		</select>
		<?php echo $form->fields['lease_agreement']->error; ?> <?php //fixed error?>
		<br>
		<p>
		Purchase Arangement
		<select name="purchase_agreement">
		  <option value="<?php echo $form->fields['purchase_agreement']; ?>">
		  	<?php if(!empty($form->fields['purchase_agreement']->value)){echo $form->fields['purchase_agreement'];} else {echo 'Select One';} ?>
		  </option>
		  <option value="N/A">I'm not interested in buying</option>
		  <option value="Lease to own">Lease to own</option>
		  <option value="For Sale Only">For Sale Only</option>
		  <option value="Land Contract">Land Contract</option>
		  <option value="Other">Other</option>
		</select>
		<?php echo $form->fields['purchase_agreement']->error; ?> <?php //fixed error?>
		<br>

		<p>
			<b>Education</b>
			<br>
			<input type="checkbox" name="highschool" <?php echo $form->fields['highschool']; ?> > Highschool Graduate
			<br>
			<input type="checkbox" name="some_college" <?php echo $form->fields['some_college']; ?> > Some College
			<br>
			<input type="checkbox" name="college_graduate"<?php echo $form->fields['college_graduate']; ?> > College Graduate
			<br>
			<input type="checkbox" name="other_education" <?php echo $form->fields['other_education']; ?> > Other
			<br>
			<br>
			<b>Where are you willing to farm?</b>
			<br>
			<input type="checkbox" name="northern" <?php echo $form->fields['northern']; ?> > Northern Kentucky
			<br>
			<input type="checkbox" name="central" <?php echo $form->fields['central']; ?> > Central Kentucky
			<br>
			<input type="checkbox" name="eastern" <?php echo $form->fields['eastern']; ?> > Eastern Kentucky
			<br>
			<input type="checkbox" name="western" <?php echo $form->fields['western']; ?> >  Western Kentucky
		</p>

	</div>

	<div class="col-sm-12">
		

	<div id = "footer">
	<br>
		<p>
		<b>Please describe your longterm goals farming (100 words or less open ended)</b>
		<span class="text-danger"><?php echo $form->fields['goals']->error; ?></span>
		<br>
		 <textarea name="goals" class="form-control"><?php echo $form->fields['goals']; ?></textarea>
		<br>
		<br>
		<b>Where are you currently farming?</b>
		<span class="text-danger"><?php echo $form->fields['currently_farming']->error; ?></span>
		<br>
		 <textarea name="currently_farming" class="form-control"><?php echo $form->fields['currently_farming']; ?></textarea>
		<br>
		<br>
		<b>How do you sell your products?</b>
		<span class="text-danger"><?php echo $form->fields['sell_produce']->error; ?></span>
		<br>
		 <textarea name="sell_produce" class="form-control"><?php echo $form->fields['sell_produce']; ?></textarea>
	</p>
	<br>
	<input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit" />
	</div>
</form>
</div>
</div>
