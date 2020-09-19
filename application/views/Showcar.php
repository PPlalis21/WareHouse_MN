<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php echo form_open('home/insert')?>
	  <label for="Name">Username:</label>
      <input type="text" id="user_id" name="user_id" >
      <br><br>
      <label for="Namecar">Namecar :</label>
      <input type="text" id="Namecar" name="Namecar">
      <br><br>
      <button type="submit">insert</button>
	</form>
<table>
	<?php  
		foreach ($car as $row) 
		{
	?>
			<tr>
				<td>
					<?php echo $row->name_car;?>
				</td>
				<td>
					<?php echo $row->id_car ;?>
				</td>
				<td>
					<?php echo $row->gps_latitude_car;?>
				</td>
				<td>
					<?php echo $row->gps_longitude_car;?>
				</td>
				<td>
					<?php echo $row->id_user;?>
				</td>
				<td>
					<a href="<?php echo base_url().'home/getone/'.$row->id_car ?>">แก้ไข</a>
				</td>
				<td>
					<a href="<?php echo base_url().'home/delete/'.$row->id_car ?>">ลบ</a>
				</td>
			</tr>	
	<?php 	
		}
	?>
</table>

</body>
</html>