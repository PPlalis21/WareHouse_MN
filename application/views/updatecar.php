<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
</head>
<body>

	<?php echo form_open('home/update')?>
	<?php
	foreach ($car as $row ) {
		?>
		  <label for="Name">Username:</label>
		  <input type="text" id="id_user" name="id_user" value="<?php echo $row->id_user ?>">
		  <br><br>
		  <label for="Namecar">Namecar :</label>
		  <input type="text" id="name_car" name="name_car" value="<?php echo $row->name_car ?>">
		  <input type="hidden" id="id_car" name="id_car" value="<?php echo $row->id_car ?>">
		  <br><br>
	<?php
	}
	?>
      <button type="submit">update</button>
	</form>

</body>
</html>