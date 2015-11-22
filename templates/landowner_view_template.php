 <form class="form-horizontal" action="" method="POST">
<div class = "row">
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
</div>
<div class="col-sm-6">
    <div class="control-group">
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="email" id="email" name="email" placeholder="" value="<?php echo $fields['email'] ?>" class="form-control input-lg">
        <p class="help-block">Please provide your E-mail</p>
        <span class="text-danger"><?php echo $error['email']; ?></span>
      </div>
    </div>
	
  </div>
</div>

<div class="col-sm-6">
	<b>Are you looking to...</b>
	 	<br />
		<input type="checkbox" name="to_rent" <?php echo $form->fields['to_rent']; ?> > Lease or Rent?
		<br />
		<input type="checkbox" name="to_sell" <?php echo $form->fields['to_sell']; ?> > Sell
		<br />
		<input type="checkbox" name="to_intern" <?php echo $form->fields['to_intern']; ?> > Farm Intern or Apprentice? 
		<br />
		<input type="checkbox" name="to_other" <?php echo $form->fields['to_other']; ?> > 
		Other: <input type="text" name="terms_other" value="<?php echo $form->fields['terms_other']; ?>"/>
		<span class="text-danger"><?php echo $form->fields['terms_other']->error; ?></span>
	<br />
	<br />
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
		<br />

	<b>Farmland</b>
	<br />
		Total Acres:<br />
		<input type="text" name="acres_total" value="<?php echo $form->fields['acres_total']; ?>">
		<span class="text-danger"><?php echo $form->fields['acres_total']->error; ?></span>
		<br />
		Pasture:<br />
		<input type="text" name="pasture_acres" value="<?php echo $form->fields['pasture_acres']; ?>">
		<span class="text-danger"><?php echo $form->fields['pasture_acres']->error; ?></span>
		<br />
		Tillable:<br />
		<input type="text" name="tillable_acres" value="<?php echo $form->fields['tillable_acres']; ?>">
		<span class="text-danger"><?php echo $form->fields['tillable_acres']->error; ?></span>
		<br />
		Woodland:<br />
		<input type="text" name="woodland_acres" value="<?php echo $form->fields['woodland_acres']; ?>">
		<span class="text-danger"><?php echo $form->fields['woodland_acres']->error; ?></span>
		
		<br />
		<br />
	<b>Housing Available</b>
	<br />
	<input type="checkbox" name="housing" <?php echo $form->fields['housing']; ?> > 
	Yes. Describe: <input type="text" name="describe_housing" value="<?php echo $form->fields['describe_housing']; ?>" />
	<span class="text-danger"><?php echo $form->fields['housing']->error; ?></span>

	<br />
	<br />
	<b>Infrastructure</b>
		<br />
		<input type="checkbox" name="infrastructure_storage" <?php echo $form->fields['infrastructure_storage']; ?> > Equipment Storage
		<br />
		<input type="checkbox" name="infrastructure_barn" <?php echo $form->fields['infrastructure_barn']; ?> > Livestock Barn
		<br />
		<input type="checkbox" name="infrastructure_stables" <?php echo $form->fields['infrastructure_stables']; ?> > Stables
		<br />
		<input type="checkbox" name="infrastructure_greenhouse" <?php echo $form->fields['infrastructure_greenhouse']; ?> > Greenhouse/High Tunnel
		<br />

</div>

<div class="col-sm-6">
	<br />
	<b>Current or Past Farming Endeavors</b>
	<br />
	(Check all that apply)
	<br />
	<br />
	<input type="checkbox" name="horticulture" <?php echo $form->fields['to_rent']; ?> > Vegetables/Horticulture
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
	<input type="checkbox" name="tobacco" <?php echo $form->fields['tobacco']; ?>> Tobacco
	<br />
	<input type="checkbox" name="rowcrops" <?php echo $form->fields['rowcrops']; ?>> Row Crops
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
	<?php echo $form->fields['lease_agreement']->error; ?>
	<br /> 
	Purchase Arangement
	<select name="purchase_agreement">
	  <option value="<?php echo $form->fields['purchase_agreement']; ?>">
	  	<?php if(!empty($form->fields['purchase_agreement']->value)){echo $form->fields['purchase_agreement'];} else {echo 'Select One';} ?>
	  </option>
	  <option value="N/A">I'm not interested in selling</option>
	  <option value="Lease to own">Lease to own</option>
	  <option value="For Sale Only">For Sale Only</option>
	  <option value="Land Contract">Land Contract</option>
	  <option value="Other">Other</option>
	</select>
	<?php echo $form->fields['purchase_agreement']->error; ?>
	<br />
	<br />
	<b>Equipment Available</b>
	<br />
	<input type="checkbox" name="equipment" <?php echo $form->fields['equipment']; ?> >
	Yes. Describe: <input type = "textbox" name = "equipment_other" value="<?php echo $form->fields['equipment_other']; ?>"/>
	<span class="text-danger"><?php echo $form->fields['equipment_other']->error; ?></span>
	<br />
	<input type="checkbox" name="irrigation" <?php echo $form->fields['irrigation']; ?> > Irrigation Available?
</div>

<div class="col-sm-12">
	<br/>
	<b>Please describe your longterm goals for the land (100 words or less open ended)</b>
	<span class="text-danger"><?php echo $form->fields['goals']->error; ?></span>
	<br />
	<textarea name="goals" class="form-control"><?php echo $form->fields['goals']; ?></textarea>
	<br/>
	<b>Select image to upload:</b>
	<input type="file" name="fileToUpload" id="fileToUpload">
	<br />
	<input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit" />
</div>
</form>
