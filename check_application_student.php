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
			<div class="col-md-9"><h4>My application</h4></div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<form action="view_application.php" method="post">
		<input style="width:100%;" type="text" name="student_reg" placeholder="Enter your College reg number" maxlength="15" required><br><br>
		<input style="width:100%;" type="email" name="student_email" placeholder="Enter your email" maxlength="50" required><br>
		<input type="submit" name="" value="Enter">
	</form>
   
	
</body>
</body>
</html>