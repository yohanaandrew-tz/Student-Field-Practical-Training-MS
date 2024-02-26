<?php
include_once'dbconect.php';
session_start();
// to capture submitted info
$task_name = $_REQUEST['task_name'];
$task_duration = $_REQUEST['task_duration'];
$task_description = $_REQUEST['task_description'];
$task_posted_date = $_REQUEST['task_posted_date'];
$assignedby = $_SESSION['staff_id'];

$sql="INSERT INTO `task`(`task_name`, `task_description`, `task_duration`, `task_posted_date`, `staff_id`) VALUES ('$task_name','$task_description','$task_duration','$task_posted_date','$assignedby')";

if(mysqli_query($conn, $sql)){
    echo "The task registered successfully";
    
}
else{
    echo "ERROR: Hush! Sorry $sql. "
    . mysqli_error($conn);
}  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SkyLink sotution</title>
</head>
<body>
<p><a href="tasks.php">View</a></p>
</body>
</html>