<?php
  session_start();
  require('dbconect.php');
 //calling date according to nairobi time zone
          date_default_timezone_set('Africa/Nairobi');
          $current_date=date('Y-m-d');

// querying number of attended student
    $query1=mysqli_query($conn,"SELECT * from attendance where approve_status='approved' AND permission_status='attended' AND attend_date='$current_date'");
    $attended=mysqli_num_rows($query1);

// querying number of permitted student
    $query2=mysqli_query($conn,"SELECT * from attendance where permission_status='permission' AND attend_date='$current_date'");
    $permitted=mysqli_num_rows($query2);

// querying number of absent student
    $query3=mysqli_query($conn,"SELECT * FROM student WHERE status='accepted' AND student_id NOT IN(SELECT student_id FROM attendance WHERE permission_status='permission' OR permission_status='attended' AND attend_date='$current_date' )");
    $absent=mysqli_num_rows($query3);

    // querying number of attended student need to be approved
    $query4=mysqli_query($conn,"SELECT * from attendance where approve_status='notapproved' AND permission_status='attended' AND attend_date='$current_date'");
    $attended_notapproved=mysqli_num_rows($query4);

		      // Get intake id from database
		$apply= "SELECT * FROM field_intake ORDER BY intake_id DESC LIMIT 1";
		$result2=mysqli_query($conn, $apply);
		// $count2=mysqli_num_rows($result2);
		while ($fetch=mysqli_fetch_assoc($result2)) {
		  $db_intake= $fetch['intake_id'];
		   echo "<b>Intake:</b>" . " " . "$fetch[intake_name]";
		}
		$intake=$db_intake;

    // Total number of students
    $query5=mysqli_query($conn,"SELECT * FROM student as s JOIN field_intake as f ON s.intake_id=f.intake_id WHERE s.status='accepted' AND f.intake_id='$intake'");
    $total_students=mysqli_num_rows($query5);

      // Get intake id from database
		$apply= "SELECT * FROM field_intake ORDER BY intake_id DESC LIMIT 1";
		$result2=mysqli_query($conn, $apply);
		// $count2=mysqli_num_rows($result2);
		while ($fetch=mysqli_fetch_assoc($result2)) {
		  $db_intake= $fetch['intake_id'];

		  // if needed
		   $current_intake=$fetch['intake_name']; 
		}
		$intake=$db_intake;

    // selecting all student by current training intake
    $query5=mysqli_query($conn,"SELECT * FROM student as s JOIN field_intake as f ON s.intake_id=f.intake_id WHERE s.status='accepted' AND f.intake_id='$intake'");
    $total=mysqli_num_rows($query5);

     // Number of staff members
    $query6=mysqli_query($conn,"SELECT * FROM staff AS s JOIN user AS u JOIN user_has_staff AS us JOIN role AS r ON  s.staff_id=us.staff_id AND u.user_id=us.user_id AND u.role_id=r.role_id");
    $staff=mysqli_num_rows($query6);

    // Number of tasks
    $query7=mysqli_query($conn,"SELECT * FROM task");
    $task=mysqli_num_rows($query7);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<?php include_once'links.php'; ?>
</head>
<body>
	<p><b>Today</b>: <?php echo $current_date; ?></p>
	<div class="w3-container w3-row-padding">
		<div class="w3-card-4 w3-half w3-center">
			<p>Staff members</p>
			<h4><?php echo $staff ?></h4>
			<a href="staff.php">view</a>
		</div>
		<div class="w3-card-4 w3-half w3-center">
			<p>Tasks</p>
			<h4><?php echo $task ?></h4>
			<a href="tasks.php">view</a>
		</div>
	</div><br>
	<div class="w3-container w3-row-padding">
		<div class="w3-card-4 w3-half w3-center">
			<p>Total students</p>
			<h4><?php echo $total_students ?></h4>
			<a href="students.php">view</a>
		</div>
		<div class="w3-card-4 w3-half w3-center">
			<p>Attended students</p>
			<h4><?php echo $attended ?></h4>
			<a href="attended_students.php">view</a>
		</div>
	</div><br>
	<div class="w3-container w3-row-padding">
		<div class="w3-card-4 w3-half w3-center">
			<p>Permitted students</p>
			<h4><?php echo $permitted ?></h4>
			<a href="permitted_student.php">view</a>
		</div>
		<div class="w3-card-4 w3-half w3-center">
			<p>Absent students</p>
			<h4><?php echo $absent ?></h4>
			<a href="absent_students.php">view</a>
		</div>
	</div>
</body>
</html>