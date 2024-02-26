<?php

require('dbconect.php');
$staff_id=$_REQUEST['staff_id'];
$user_id=$_REQUEST['user_id'];

//delete user has staff table
$delete="DELETE FROM `user_has_staff` WHERE staff_id=$staff_id";
$resultd = mysqli_query($conn,$delete);
//delete user table
$deleteu="DELETE FROM `user` WHERE user_id=$user_id";
$resultu = mysqli_query($conn,$deleteu);
//delete staff
$query = "DELETE FROM staff WHERE staff_id=$staff_id"; 
$results = mysqli_query($conn,$query);
header("Location: staff.php"); 
?>