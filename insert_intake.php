<?php
include_once'dbconect.php';
session_start();
// to capture submitted info
$intake_year = $_REQUEST['intake_year'];
$intake_month = $_REQUEST['intake_month'];
$intake_name = $intake_year . $intake_month;


$sql="INSERT INTO `field_intake`(`intake_id`, `intake_name`, `intake_year`, `intake_month`, `intake_status`) VALUES (NULL,'$intake_name','$intake_year', '$intake_month','open')";

if(mysqli_query($conn, $sql)){
    echo "Intake added successfully";
    
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
	<title></title>
</head>
<body>
<p><a href="applied_student.php">Back</a></p>
</body>
</html>