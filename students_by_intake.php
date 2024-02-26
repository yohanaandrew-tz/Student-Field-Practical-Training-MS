<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	 <?php include_once'links.php'; ?>
</head>
<body>
	<h4>Field Practical training Students</h4>
                    <a class="w3-button w3-blue" href="students.php">Back</a>
                    <span style="float:right;"><input  oninput="w3.filterHTML('#id01', 'tr', this.value)" type="search" minlength="5" placeholder="Search here"></span>
	<div class="tbl">
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                        include_once'dbconect.php';
                        $intake_name=$_REQUEST['intake_name'];
                        // Get intake id from database
$apply= "SELECT * FROM field_intake WHERE intake_name='$intake_name'";
$result2=mysqli_query($conn, $apply);
// $count2=mysqli_num_rows($result2);
while ($fetch=mysqli_fetch_assoc($result2)) {
  $db_intake= $fetch['intake_id'];
   echo "<b>Intake:</b>" . " " . "$intake_name" . " " . "<b>Status:</b>" . "$fetch[intake_status]";
}
$intake=$db_intake;
                        // Query
$sql = "SELECT * FROM student as s JOIN field_intake as f ON s.intake_id=f.intake_id WHERE f.intake_id='$intake' AND s.status='accepted' OR s.status='closed' OR s.status='pending'";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-bordered table-hover responsive'>";
            echo "<tr>";
                echo "<th>SN</th>";
                echo "<th>Reg Number</th>";
                echo "<th>Name</th>";
                echo "<th>Surname</th>";
                echo "<th>College</th>";
                echo "<th>Program</th>";
                echo "<th>Phone</th>";
                echo "<th>Email</th>";
                echo "<th>Compitence</th>";
                // echo "<th>Start</th>";
                // echo "<th>End</th>";
                // echo "<th>Registered on</th>";
                echo "<th>Gender</th>";
                echo "<th>DoB</th>";
                echo "<th>Marital status</th>";
                echo "<th>Admision status</th>";
                echo "<th>Action</th>";
                // echo "<th></th>";
            echo "</tr>";
            $count=mysqli_num_rows($result);
              $i=1;
             while ($i<=$count) {
        while($row = mysqli_fetch_array($result)){
            echo "<tbody id='id01'>";
            echo "<tr>";
                echo "<td>" . $i. "</td>";
                echo "<td>" . $row['student_reg'] . "</td>";
                echo "<td>" . $row['student_fname'] . "</td>";
                echo "<td>" . $row['student_lname'] . "</td>";
                echo "<td>" . $row['student_college'] . "</td>";
                echo "<td>" . $row['student_program'] . "</td>";
                echo "<td>" . $row['student_phone'] . "</td>";
                echo "<td>" . $row['student_email'] . "</td>";
                echo "<td>" . $row['student_compitence'] . "</td>";
                 echo "<td>" . $row['student_gender'] . "</td>";
                echo "<td>" . $row['student_dob'] . "</td>";
                echo "<td>" . $row['student_marital_status'] . "</td>";
                echo "<td style='color:red;'>" . $row['status'] . "</td>";
                // echo "<td>" . $row['student_reg_date'] . "</td>";
                // echo "<td>" . $row['student_field_duration'] . "</td>";
                  ?>
                  <form action="delete_student.php" method="post">
                <td><a class="btn btn-success btn-sm" href="view_student.php?student_id=<?php echo $row['student_id'];?>"><span></span>View</a></td>
               
                <?php

            echo "</tr>";
            echo "</tbody>";
            $i++;  
        } 
    }
  
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
?>
                    </div>
                    </div>
                </div>
</body>
</html>