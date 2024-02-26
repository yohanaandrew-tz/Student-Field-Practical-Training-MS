<?php

require('dbconect.php');
$student_id=$_REQUEST['student_id'];
$query = "DELETE FROM student WHERE student_id=$student_id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: students.php"); 
?>