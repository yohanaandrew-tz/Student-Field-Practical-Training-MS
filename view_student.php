<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SkyLink Solutions</title>
	<?php include_once'links.php'; ?>
</head>
<body>
	<div class="row">
		<div class="col-md-12" style="padding: 4px;">
			<div class="col-md-9"><h4>Student information.</h4></div>
			<div class="col-md-3"></div>
		</div>
	</div>
   
	<?php
	require('dbconect.php');
	$student_id=$_GET['student_id'];
	$query = "SELECT * from student where student_id='$student_id'"; 
	$result = mysqli_query($conn, $query) or die ( mysqli_error());
	while ($row = mysqli_fetch_assoc($result)) {
		?>
<form name="form" method="post" action="">
		<img src="files/myAvatar.png" width="50">
	<div class="row">
		<div class="col-md-12">
		 
 <div class="row">
	 <div class="col-md-4">
	 <div class="form-group">
	 	<label>Registration Number :</label><input class="form-control" type="text" readonly name="student_reg" placeholder="Enter reg number" required value="<?php echo $row['student_reg'];?>">
	  </div>
	 </div>

     <div class="col-md-4">
	 <div class="form-group">
	 	<label>First name :</label><input class="form-control" type="text" readonly name="student_fname" placeholder="Enter First Name" required value="<?php echo $row['student_fname'];?>" />
	  </div>
	 </div>

	  <div class="col-md-4">
	 <div class="form-group">
	 	<label>Last name :</label><input class="form-control" type="text" readonly name="student_lname" placeholder="Enter Las Name" required value="<?php echo $row['student_lname'];?>" />
	  </div>
	 </div>
 </div>

  <div class="row">
	 <div class="col-md-4">
	 <div class="form-group">
	 	<label>College :</label><input class="form-control" type="text" readonly name="student_college" placeholder="Enter college" required value="<?php echo $row['student_college'];?>">
	  </div>
	 </div>


	      <div class="col-md-4">
	 <div class="form-group">
	 	<label>Program :</label><input class="form-control" type="text" readonly name="student_program" placeholder="Enter program" required value="<?php echo $row['student_program'];?>" />
	  </div>
	 </div>

	  <div class="col-md-4">
	 <div class="form-group">
	 	<label>Phone :</label><input class="form-control" type="text" readonly name="student_phone" placeholder="Enter phone" required value="<?php echo $row['student_phone'];?>" />
	  </div>
	 </div>
 </div>

   <div class="row">
	 <div class="col-md-4">
	 <div class="form-group">
	 	<label>Gender :</label><input class="form-control" type="text" readonly name="student_gender" placeholder="Enter gender" required value="<?php echo $row['student_gender'];?>">
	  </div>
	 </div>


	      <div class="col-md-4">
	 <div class="form-group">
	 	<label>Email :</label><input class="form-control" type="email" readonly name="student_email" placeholder="Enter email" required value="<?php echo $row['student_email'];?>" />
	  </div>
	 </div>

	  <div class="col-md-4">
	 <div class="form-group">
	 	<label>Compitence :</label><input class="form-control" type="text" readonly name="student_compitence" placeholder="Enter compitence" required value="<?php echo $row['student_compitence'];?>" />
	  </div>
	 </div>
 </div>


 <div class="row">
 <div class="col-md-4">
	 <div class="form-group">
	 	<label>Registration date :</label><input class="form-control" type="date" readonly name="student_reg_date" placeholder="Enter " required value="<?php echo $row['student_reg_date'];?>" />
	  </div>
	 </div>
	  <div class="col-md-4">
	 <div class="form-group">
	 	<label>Start date :</label><input class="form-control" type="date" readonly name="student_reg_date" placeholder="Enter " required value="<?php echo $row['student_start_date'];?>" />
	  </div>
	 </div>

	 	  <div class="col-md-4">
	 <div class="form-group">
	 	<label>End date :</label><input class="form-control" type="date" readonly name="student_reg_date" placeholder="Enter " required value="<?php echo $row['student_end_date'];?>" />
	  </div>
	 </div>
 </div>

 <div class="row">
 	<div class="form-group">
 	<div class="col-md-4"><label>Duration: </label><input class="form-control" type="number" readonly name="student_field_duration" placeholder="Enter number of weeks" required value="<?php echo $row['student_field_duration'];?>" /></div>
 </div>
 <div class="form-group">
 	<div class="col-md-4"><label>Birth date: </label><input class="form-control" type="date" readonly name="student_dob" placeholder="" required value="<?php echo $row['student_dob'];?>" /></div>
 </div>
 	<div class="form-group">
 	<div class="col-md-4"><label>Marital status: </label><input class="form-control" type="text" readonly name="student_marital_status" placeholder="" required value="<?php echo $row['student_marital_status'];?>" /></div>
 </div>
   
 </div>
<br>
  <div class="row">
 	<div class="form-group">
 	<div class="col-md-2"><a href="students.php" class="btn btn-info">Back</a></div>
 </div>
   
 </div>	
	 </div>
	</div>
	 </form>
<?php } ?>
</body>
</body>
</html>