
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
	<h4>Edit student</h4>
	<p><a href="students.php">View</a></p>
	<?php
	require('dbconect.php');
	$student_id=$_REQUEST['student_id'];
	$query = "SELECT * from student where student_id='".$student_id."'"; 
	$result = mysqli_query($conn, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);
		$status = "";
	if(isset($_POST['new']) && $_POST['new']==1)
	{
		$student_id = $_REQUEST['student_id'];
		$student_reg = $_REQUEST['student_reg'];
		$student_fname = $_REQUEST['student_fname'];
		$student_lname = $_REQUEST['student_lname'];
		$student_college = $_REQUEST['student_college'];
		$student_program = $_REQUEST['student_program'];
		$student_phone = $_REQUEST['student_phone'];
		$student_email = $_REQUEST['student_email'];
		$student_compitence = $_REQUEST['student_compitence'];
		$student_photo = $_REQUEST['student_photo'];
		$student_start_date = $_REQUEST['student_start_date'];
		$student_end_date = $_REQUEST['student_end_date'];
		$student_reg_date = $_REQUEST['student_reg_date'];
		$student_gender = $_REQUEST['student_gender'];
		$student_field_duration = $_REQUEST['student_field_duration'];
		$student_dob = $_REQUEST['student_dob'];
		$student_marital_status = $_REQUEST['student_marital_status'];

		$update="update student set student_reg='".$student_reg."', student_fname='".$student_fname."', student_lname='".$student_lname."', student_college='".$student_college."', student_program='".$student_program."', student_phone='".$student_phone."', student_email='".$student_email."', student_compitence='".$student_compitence."', student_photo='".$student_photo."', student_start_date='".$student_start_date."', student_end_date='".$student_end_date."', student_reg_date='".$student_reg_date."', student_gender='".$student_gender."', student_field_duration='".$student_field_duration."', student_dob='".$student_dob."' , student_marital_status='".$student_marital_status."' where student_id='".$student_id."'";
		
		mysqli_query($conn, $update) or die(mysqli_error());
		$status = "Record Updated Successfully. </br></br><a href='students.php'>View Updated Record</a>";
		echo '<p style="color:#FF0000;">'.$status.'</p>';
		}else {
		?>
		<div>
		<form name="form" method="post" action=""> 
			<div class="w3-container w3-row-padding">
				<div class="w3-container w3-half">
		<input type="hidden" name="new" value="1" />
		<input name="student_id" type="hidden" value="<?php echo $row['student_id'];?>" />
		<p><b>Reg No:</b><input type="text" name="student_reg" placeholder="Enter reg number" required value="<?php echo $row['student_reg'];?>" /></p>
		<p><b>Name:</b><input type="text" name="student_fname" placeholder="Enter Name" required value="<?php echo $row['student_fname'];?>" /></p>
		<p><b>Surname:</b><input type="text" name="student_lname" placeholder="Enter surname" required value="<?php echo $row['student_lname'];?>" /></p>
		<p><b>College:</b><input type="text" name="student_college" placeholder="Enter college" required value="<?php echo $row['student_college'];?>" /></p>
		<p><b>Program:</b><input type="text" name="student_program" placeholder="Enter program" required value="<?php echo $row['student_program'];?>" /></p>
		<p><b>Tel:</b><input type="number" name="student_phone" placeholder="07XXXXX" required value="<?php echo $row['student_phone'];?>" /></p>
		<p><b>Email:</b><input type="email" name="student_email" placeholder="Enter email" required value="<?php echo $row['student_email'];?>" /></p>
		<p><b>Birth Date:</b><input type="date" name="student_dob" placeholder="Enter birtday" required value="<?php echo $row['student_dob'];?>" /></p>
			</div>

			<div class="w3-container w3-half">
		<p><b>Compitence:</b><input type="text" name="student_compitence" placeholder="Enter compitence" required value="<?php echo $row['student_compitence'];?>" /></p>
		<p><b>Photo:</b><input type="file" name="student_photo" placeholder="E" value="<?php echo $row['student_photo'];?>" /></p>
		<p><b>Start:</b><input type="date" name="student_start_date" placeholder="Enter start date" required value="<?php echo $row['student_start_date'];?>" /></p>
		<p><b>End:</b><input type="date" name="student_end_date" placeholder="Enter end" required value="<?php echo $row['student_end_date'];?>" /></p>
		<p><b>Registered on:</b><input type="text" name="student_reg_date" placeholder="registered date" required value="<?php echo $row['student_reg_date'];?>" /></p>
		<p><b>Gender:</b><input type="text" name="student_gender" placeholder="Enter M or F" required value="<?php echo $row['student_gender'];?>" /></p>
		<p><b>Field duration:</b><input type="number" name="student_field_duration" placeholder="Enter number of weeks" required value="<?php echo $row['student_field_duration'];?>" /></p>
		<p>Marital status:<select name="student_marital_status">
			<option>Single</option>
			<option>Married</option>
		</select></p>
			</div>
		</div>
		<p><input class="w3-button w3-gray" name="submit" type="submit" value="Update" /></p>
		</form>
<?php } ?>
</body>
</body>
</html>