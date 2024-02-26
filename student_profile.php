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
			<div class="col-md-9"><h4>Profile.</h4></div>
			<div class="col-md-3"></div>
		</div>
	</div>
   
	<?php
	require('dbconect.php');
	$student_id=$_SESSION['student_id'];
	$query = "SELECT * from student where student_id='$student_id'"; 
	$result = mysqli_query($conn, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);
		?>
		<div class="w3-container">
			<div class="w3-container w3-row-padding">
				<div class="w3-container w3-card-4">
					<!-- <img src="files/myAvatar.png" alt="My DP" width="50" height=""> --><br>
		<table class="table table-bordered responsive">
			<tr>
				<td><b>Full name:</b></td><td><?php echo "$row[student_fname]" . " ". "$row[student_lname]";?></td>
			</tr>
			<tr>
				<td><b>Gender:</b></td><td><?php echo "$row[student_gender]";?></td>
			</tr>
			<tr>
				<td><b>Email:</b></td><td><?php echo "$row[student_email]";?></td>
			</tr>
			<tr>
				<td><b>Phone:</b></td><td><?php echo "$row[student_phone]";?></td>
			</tr>
			<tr>
				<td><b>Compitence:</b></td><td><?php echo "$row[student_compitence]";?></td>
			</tr>
			<tr>
				<td><b>Registered on:</b></td><td><?php echo "$row[student_reg_date]";?></td>
			</tr>
			<tr>
				<td><b>Field start:</b></td><td><?php echo "$row[student_start_date]";?></td>
			</tr>
			<tr>
				<td><b>Field end:</b></td><td><?php echo "$row[student_end_date]";?></td>
			</tr>
			<tr>
				<td><b>College:</b></td><td><?php echo "$row[student_college]";?></td>
			</tr>
			<tr>
				<td><b>Program:</b></td><td><?php echo "$row[student_program]";?></td>
			</tr>
		</table>
				</div>
			</div>
		</div>
		
</body>
</body>
</html>