 <form action = "farmerq.php" method = "post">
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
		
		<br/>
		<br/>
	<b>Land Type and Amount</b>
		<br>
			Pasture: 
			<br />
			<input type="text" name="pasture" value="<?php echo $form->fields['pasture']; ?>">
			<br />
			Tillable: 
			<br />
			<input type="text" name="tillable" value="<?php echo $form->fields['tillable']; ?>">
			<br>
			<br>
			<input type="checkbox" name="organic" <?php echo $form->fields['organic']; ?> > Certified Organic?
		</p>
		<p>
		<b>Housing Needed</b>
		<br>
		<input type="checkbox" name="housing"  <?php echo $form->fields['housing']; ?> > Yes. Describe: <input type="text" name="describe_housing" value="<?php echo $form->fields['describe_housing']; ?>" />
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
			<input type="checkbox" name="infrastructure_goats" <?php echo $form->fields['infrastructure_goats']; ?> > Goats
			<br>
			<input type="checkbox" name="infrastructure_sheep" <?php echo $form->fields['infrastructure_sheep']; ?> > Sheep
			<br>
			<input type="checkbox" name="infrastructure_horses" <?php echo $form->fields['infrastructure_horses']; ?> > Horses
		</p>
		<b>Equipment Needed</b>
		<br />
		<input type="checkbox" name="equipment" <?php echo $form->fields['equipment']; ?> > 
		Yes. Describe: <input type="text" name="equipment_other" value="<?php echo $form->fields['equipment_other']; ?>"/>
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
		  <option value="short">Short Term (Less than 2 years)</option>
		  <option value="Long">Long Term (More than 5 years)</option>
		</select>
		<br>
		<p>
		Purchase Arangement
		<select name="purchase_agreement">
		  <option value="lease">Lease to own</option>
		  <option value="Sale">For Sale Only</option>
		  <option value="contract">Land Contrat</option>
		  <option value="other">Other</option>
		</select>
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
		<br>
		 <textarea name="goals" class="form-control"><?php echo $form->fields['goals']; ?></textarea>
		<br>
		<br>
		<b>Where are you currently farming?</b>
		<br>
		 <textarea name="currently_farming" class="form-control"><?php echo $form->fields['currently_farming']; ?></textarea>
		<br>
		<br>
		<b>How do you sell your products?</b>
		<br>
		 <textarea name="sell_produce" class="form-control"><?php echo $form->fields['sell_produce']; ?></textarea>
	</p>
	<br>
	<input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit" />
	</div>
</form>
