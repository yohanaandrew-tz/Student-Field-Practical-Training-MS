
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SkyLink Solutions</title>
	<style type="text/css">
		input{
			width: 100%;
		}
	</style>
	<?php include_once'links.php'; ?>
</head>
<body>
	<h4>Edit staff</h4>
	<p><a href="staff.php">View</a></p>
	<?php
	require('dbconect.php');
	$staff_id=$_REQUEST['staff_id'];
	$query = "SELECT * from staff where staff_id='".$staff_id."'"; 
	$result = mysqli_query($conn, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);
		$status = "";
	if(isset($_POST['new']) && $_POST['new']==1)
	{
		$staff_id = $_REQUEST['staff_id'];
		$staff_reg_number = $_REQUEST['staff_reg_number'];
		$staff_fname = $_REQUEST['staff_fname'];
		$staff_lname = $_REQUEST['staff_lname'];
		$staff_gender = $_REQUEST['staff_gender'];
		$staff_email = $_REQUEST['staff_email'];
		$staff_phone = $_REQUEST['staff_phone'];
		$staff_position = $_REQUEST['staff_position'];
		$staff_photo = $_REQUEST['staff_photo'];
		$staff_signature = $_REQUEST['staff_signature'];
		$staff_reg_date = $_REQUEST['staff_reg_date'];


		$update="update staff set staff_reg_number='".$staff_reg_number."', staff_fname='".$staff_fname."', staff_lname='".$staff_lname."', staff_gender='".$staff_gender."', staff_email='".$staff_email."', staff_phone='".$staff_phone."', staff_position='".$staff_position."', staff_photo='".$staff_photo."', staff_signature='".$staff_signature."', staff_reg_date='".$staff_reg_date."' where staff_id='".$staff_id."'";
		
		mysqli_query($conn, $update) or die(mysqli_error());
		$status = "Record Updated Successfully. </br></br><a href='staff.php'>Back</a>";
		echo '<p style="color:#FF0000;">'.$status.'</p>';
		}else {
		?>
		<div>
		<form name="form" method="post" action=""> 

			<div class="w3-container w3-row-padding">
				<div class="w3-container w3-half">
		<input type="hidden" name="new" value="1" />
		<input name="staff_id" type="hidden" value="<?php echo $row['staff_id'];?>" />
		<p><b>Reg number:</b><input type="text" name="staff_reg_number" placeholder="Enter reg number" required value="<?php echo $row['staff_reg_number'];?>" /></p>
		<p><b>Name:</b><input type="text" name="staff_fname" placeholder="Enter Name" required value="<?php echo $row['staff_fname'];?>" /></p>
		<p><b>Surname:</b><input type="text" name="staff_lname" placeholder="Enter surname" required value="<?php echo $row['staff_lname'];?>" /></p>
		<p><b>Gender:</b><input type="text" name="staff_gender" placeholder="Enter M or F" required value="<?php echo $row['staff_gender'];?>" /></p>
		<p><b>Email:</b><input type="email" name="staff_email" placeholder="Enter email" required value="<?php echo $row['staff_email'];?>" /></p>
			</div>

			<div class="w3-container w3-half">
		<p><b>Phone:</b><input type="number" name="staff_phone" placeholder="07XXXXX" required value="<?php echo $row['staff_phone'];?>" /></p>
		<p><b>Position:</b><input type="text" name="staff_position" placeholder="Enter postion" required value="<?php echo $row['staff_position'];?>" /></p>
		<p><b>Photo:</b><input type="file" name="staff_photo" placeholder="" value="<?php echo $row['staff_photo'];?>" /></p>
		<p><b>Signature:</b><input type="file" name="staff_signature" placeholder="" value="<?php echo $row['staff_signature'];?>" /></p>
		<p><b>Registered on:</b><input type="date" name="staff_reg_date" readonly placeholder="Enter reg date" value="<?php echo $row['staff_reg_date'];?>" /></p>
				</div>
			</div>
		
		<p><input class="w3-button w3-gray" name="submit" type="submit" value="Update" /></p>
		</form>
<?php } ?>
</body>
</body>
</html>