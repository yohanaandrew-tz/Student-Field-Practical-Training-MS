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
			<div class="col-md-9"><h4>My Profile.</h4></div>
			<div class="col-md-3"></div>
		</div>
	</div>
   
	<?php
	require('dbconect.php');
	$staff_id=$_SESSION['staff_id'];
	$query = "SELECT * from staff where staff_id='$staff_id'"; 
	$result = mysqli_query($conn, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);
		?>
		<div class="w3-container">
			<div class="w3-container w3-row-padding">
				<div class="w3-container w3-card-4">
					<!-- <img src="files/myAvatar.png" alt="My DP" width="50" height=""> --><br>
		<table class="table table-bordered responsive">
			<tr>
				<td><b>Full name:</b></td><td><?php echo "$row[staff_fname]" . " ". "$row[staff_lname]";?></td>
			</tr>
			<tr>
				<td><b>Gender:</b></td><td><?php echo "$row[staff_gender]";?></td>
			</tr>
			<tr>
				<td><b>Email:</b></td><td><?php echo "$row[staff_email]";?></td>
			</tr>
			<tr>
				<td><b>Phone:</b></td><td><?php echo "$row[staff_phone]";?></td>
			</tr>
			<tr>
				<td><b>Postion:</b></td><td><?php echo "$row[staff_position]";?></td>
			</tr>
			<tr>
				<td><b>Joined on:</b></td><td><?php echo "$row[staff_reg_date]";?></td>
			</tr>
		</table>
				</div>
			</div>
		</div>
		
</body>
</body>
</html>