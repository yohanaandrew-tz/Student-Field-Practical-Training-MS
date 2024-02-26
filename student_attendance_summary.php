<?php
session_start();
include_once'dbconect.php';
?>
<?php
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
    $query3=mysqli_query($conn,"SELECT * FROM student as st JOIN field_intake AS fi ON st.intake_id=fi.intake_id WHERE st.status='accepted' AND fi.intake_name='Field/2023/7' AND st.student_id NOT IN (SELECT a.student_id FROM `attendance` AS a JOIN student AS s ON a.student_id=s.student_id WHERE a.permission_status='attended' AND a.attend_date = '$current_date' UNION (SELECT s.student_id FROM `attendance` AS a JOIN student AS s ON a.student_id=s.student_id WHERE a.permission_status='permission' AND a.attend_date = '$current_date'))");
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

		  // if needed
		   $current_intake=$fetch['intake_name']; 
		}
		$intake=$db_intake;

    // selecting all student by current training intake
    $query5=mysqli_query($conn,"SELECT * FROM student as s JOIN field_intake as f ON s.intake_id=f.intake_id WHERE s.status='accepted' AND f.intake_id='$intake'");
    $total=mysqli_num_rows($query5);

    // Calculating absent students
    // $abs = $total-($attended+$permitted);
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
	<div class="w3-container">
		<div class="w3-container w3-row-padding">
			<h4>Today's Attendance Summary</h4>	
			<p><b>Date</b>: <?php echo $current_date; ?></p>
			<div class="w3-container w3-card-4"><br>
				<table class="w3-table w3-striped w3-border">
					<tr>
						<td>Attendend</td> <td><?php echo $attended; ?></td> <td><a href="attended_students.php">view</a></td>
					</tr>
					<tr>
						<td>Permited</td> <td><?php echo $permitted; ?></td> <td><a href="permitted_student.php">view</a></td>
					</tr>
					<tr>
						<td>Absents</td> <td><?php echo $absent; ?></td> <td><a href="absent_students.php">view</a></td>
					</tr>
				</table>
				<p><a href="attendance_approve.php">Approve attended</a><span class="w3-badge w3-green"><?php echo $attended_notapproved; ?></span></p>
				<!-- <p><a href="">Approve permission</a><span class="w3-badge w3-red">0</span></p> -->
			</div>
		</div>
	</div>
</body>
</html>