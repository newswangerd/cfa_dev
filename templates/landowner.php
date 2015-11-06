<form action = "landownerq.php" method = "post">
<div class="col-sm-6">
	<b>Are you looking to...</b>
	 	<br />
		<input type="checkbox" name="to_rent" <?php echo $form->fields['to_rent']; ?> > Lease or Rent?
		<br />
		<input type="checkbox" name="to_sell" <?php echo $form->fields['to_sell']; ?> > Sell
		<br />
		<input type="checkbox" name="to_intern" <?php echo $form->fields['to_intern']; ?> > Farm Intern of Apprentice? 
		<br />
		<input type="checkbox" name="to_other" <?php echo $form->fields['to_other']; ?> > Other: <input type="text" name="terms_other" value="<?php echo $form->fields['terms_other']; ?>"/>
	<br />
	<br />
	<b>Location</b>
	<br />
		Street:<br />
		<input type="text" name="street" value="<?php echo $form->fields['street']; ?>">
		<br />
		City:<br />
		<input type="text" name="city" value="<?php echo $form->fields['city']; ?>">
		<br />
		Zip:<br />
		<input type="text" name="zip" value="<?php echo $form->fields['zip']; ?>">
		<br />
		<br />

	<b>Farmland</b>
	<br />
		Total Acres:<br />
		<input type="text" name="acres_total" value="<?php echo $form->fields['acres_total']; ?>">
		<br />
		Pasture:<br />
		<input type="text" name="pasture_acres" value="<?php echo $form->fields['pasture_acres']; ?>">
		<br />
		Tillable:<br />
		<input type="text" name="tillable_acres" value="<?php echo $form->fields['tillable_acres']; ?>">
		<br />
		Woodland:<br />
		<input type="text" name="woodland_acres" value="<?php echo $form->fields['woodland_acres']; ?>">
		<br />
		<br />

	<b>Housing Available</b>
	<br />
	<input type="checkbox" name="housing" <?php echo $form->fields['housing']; ?> > Yes. Describe: <input type="text" name="describe_housing" value="<?php echo $form->fields['describe_housing']; ?>" />
	<br />
	<br />
	<b>infrastructure</b>
		<br />
		<input type="checkbox" name="infrastructure_storage" <?php echo $form->fields['infrastructure_storage']; ?> > Equipment Storage
		<br />
		<input type="checkbox" name="infrastructure_barn" <?php echo $form->fields['infrastructure_barn']; ?> > Livestock Barn
		<br />
		<input type="checkbox" name="infrastructure_stables" <?php echo $form->fields['infrastructure_stables']; ?> > Stables
		<br />
		<input type="checkbox" name="infrastructure_greenhouse" <?php echo $form->fields['infrastructure_greenhouse']; ?> > Greenhouse/High Tunnel
		<br />
		<input type="checkbox" name="infrastructure_goats" <?php echo $form->fields['infrastructure_goats']; ?> > Goats
		<br />
		<input type="checkbox" name="infrastructure_sheep" <?php echo $form->fields['infrastructure_sheep']; ?> > Sheep
		<br />
		<input type="checkbox" name="infrastructure_horses" <?php echo $form->fields['infrastructure_horses']; ?> > Horses

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
	  <option value="short">Short Term (Less than 2 years)</option>
	  <option value="Long">Long Term (More than 5 years)</option>
	</select>
	<br />

	Purchase Arangement
	<select name="purchase_agreement">
	  <option value="lease">Lease to own</option>
	  <option value="Sale">For Sale Only</option>
	  <option value="contract">Land Contrat</option>
	  <option value="other">Other</option>
	</select>
	<br />
	<br />
	<b>Equipment Available</b>
	<br />
	<input type="checkbox" name="equipment" <?php echo $form->fields['equipment']; ?> >Yes. Describe: <input type = "textbox" name = "equipment_other" value="<?php echo $form->fields['equipment_other']; ?>"/>
	<br />
	<input type="checkbox" name="irrigation" <?php echo $form->fields['irrigation']; ?> > Irrigation Available?
</div>

<div class="col-sm-12">
	<br/>
	<b>Please describe your longterm goals for the land (100 words or less open ended)</b>
	<br/>
	<textarea name="goals" class="form-control"><?php echo $form->fields['goals']; ?></textarea>
	<br/>
	<b>Select image to upload:</b>
	<input type="file" name="fileToUpload" id="fileToUpload">
	<br />
	<input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit" />
</div>
</form>
