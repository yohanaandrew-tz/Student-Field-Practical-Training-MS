<?php

require('dbconect.php');
$log_id=$_REQUEST['log_id'];
$query = "DELETE FROM logbook WHERE staff_id=$staff_id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: staff.php"); 
?>