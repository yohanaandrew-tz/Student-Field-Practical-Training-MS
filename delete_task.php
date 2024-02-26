<?php

require('dbconect.php');
$task_id=$_REQUEST['task_id'];
$query = "DELETE FROM task WHERE task_id=$task_id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: tasks.php"); 
?>