
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SkyLink solutions</title>
	 <?php include_once'links.php'; ?>
</head>
<body>


<?php
	require('dbconect.php');
	$student_reg=$_POST['student_reg'];
	$student_email = $_POST['student_email'];
	$query = "SELECT * from student where student_reg='$student_reg' AND student_email='$student_email'"; 
	$result = mysqli_query($conn, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);
		?>
		<img src="files/myAvatar.png" alt="My DP" width="50" height="">
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
				<td><b>Applied on:</b></td><td><?php echo "$row[student_reg_date]";?></td>
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
			<tr>
				<td><b>Status:</b></td><td style="color:red;"><?php echo "$row[status]";?></td>
			</tr>
			<tr>
				<td><b>Letter:</b></td><td><a href="attachment/<?php echo "$row[student_letter]";?>">View</a></td>
			</tr>
		</table>
		<p style="text-align:center;"><a href="login.php">Back</a></p>
		</body>
</html>