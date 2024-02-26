
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SkyLink Solutions</title>
</head>
<body>
	<h4>Edit task</h4>
	<p><a href="tasks.php">View</a></p>
	<?php
	require('dbconect.php');
	$task_id=$_REQUEST['task_id'];
	$query = "SELECT * from task where task_id='".$task_id."'"; 
	$result = mysqli_query($conn, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);
		$status = "";
	if(isset($_POST['new']) && $_POST['new']==1)
	{
		$task_id = $_REQUEST['task_id'];
		$task_name = $_REQUEST['task_name'];
		$task_description = $_REQUEST['task_description'];
		$task_duration = $_REQUEST['task_duration'];
		$task_posted_date = $_REQUEST['task_posted_date'];
		$staff_id = $_REQUEST['staff_id'];

		$update="update task set task_name='".$task_name."', task_description='".$task_description."', task_duration='".$task_duration."', task_posted_date='".$task_posted_date."' where task_id='".$task_id."'";
		
		mysqli_query($conn, $update) or die(mysqli_error());
		$status = "Record Updated Successfully. </br></br><a href='tasks.php'>View Updated Record</a>";
		echo '<p style="color:#FF0000;">'.$status.'</p>';
		}else {
		?>
		<div>
		<form name="form" method="post" action=""> 
		<input type="hidden" name="new" value="1" />
		<input name="task_id" type="hidden" value="<?php echo $row['task_id'];?>" />
		<p>task-name:<input type="text" name="task_name" placeholder="Enter task name" required value="<?php echo $row['task_name'];?>" /></p>
		<p>Description:<input type="text" name="task_description" placeholder="description" required value="<?php echo $row['task_description'];?>" /></p>
		<p>Day(s):<input type="number" name="task_duration" placeholder="number of days" required value="<?php echo $row['task_duration'];?>" /></p>
		<p>Posted:<input type="date" name="task_posted_date" placeholder="Posted date" required value="<?php echo $row['task_posted_date'];?>" /></p>
		<p>Staff-ID:<input type="text" name="staff_id" readonly required value="<?php echo $row['staff_id'];?>" /></p>
		
		<p><input name="submit" type="submit" value="Update" /></p>
		</form>
<?php } ?>
</body>
</body>
</html>