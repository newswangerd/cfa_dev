
<?php if(!$is_valid){echo '<div class="alert alert-danger" role="alert">It looks like there are some mistakes!</div>';} ?>
<form action = "login.php" method = "post">
<div class="col-sm-6">
<html>
<body>
	<form>
		<feildset>
<br>		
Username:
<input type="text" name="username" value="<?php echo $form->fields['username']; ?>">
<span class="text-danger"><?php echo $form->fields['name']->error; ?></span>
 <br />
<br>
 Password:
<input type="text" name="password" value="<?php echo $form->fields['password']; ?>">
<span class="text-danger"><?php echo $form->fields['tillable']->error; ?></span>
</br>
 <br>
 <br>
 Usertype:
 <br>
 <select name = "usertype" 
            size = "2" required>
            <option value = "Landowner">Land to Farm</option>
            <option value = "Farmer">Someone to Farm your land</option>
          </select>
          <br>
          <br>
           <button type = "submit">
            submit
            </button>
            </br>
            <br>
</feildset>
</form>
</body>
</html>
 	