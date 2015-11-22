<b>Would you like to edit this form?</b>
<br />
<input type="checkbox" name="edit_enable" <?php echo $form->fields['edit_enale']; ?> >
<b>Enable</b>
<br />
<br />
<b>First Name</b>
<input type="text" name="first_name" value="<?php echo $form->fields['first_name']; ?>">
<br />
<b>Last Name</b>
<input type="text" name="last_name" value="<?php echo $form->fields['last_name']; ?>">
<br />
<b>Phone number</b>
<input type="text" name="phone" value="<?php echo $form->fields['phone']; ?>">
<br />
<b>email</b>
<input type="text" name="email" value="<?php echo $form->fields['email']; ?>">
<br />
<b>Address (Street, City, State, Zip)</b>
<input type="text" name="address" value="<?php echo $form->fields['address']; ?>">
<br />
<b>password</b>
<input type="text" name="password" value="<?php echo $form->fields['password']; ?>">
<br />
<br />
<b>Administrator Notes: (Please add useful details about this profile)</b>
<br>
<textarea  id="adminNotes" name="admin_notes" rows = "7" cols = "60" required></textarea>
<br>
<br />
<br />
</form>
</body>
</HTML>