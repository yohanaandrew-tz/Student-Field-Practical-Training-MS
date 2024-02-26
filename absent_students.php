<?php
 session_start();

include_once'dbconect.php';
//calling date according to nairobi time zone
          date_default_timezone_set('Africa/Nairobi');
          $current_date=date('Y-m-d');

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FPT Management System</title>
    <?php include_once'links.php'; ?>
</head>
<body>
    <div class="row">
        <div class="col-md-12" style="padding: 4px;">
            <div class="col-md-9"><h4>Absent students</h4></div>
            <div class="col-md-3"></div>
        </div>
    </div>
   <form action="" method="post">
    <?php
    require('dbconect.php');
    // $total_days=30;
    // $sql = "SELECT * FROM student WHERE status='accepted' AND student_id NOT IN(SELECT student_id FROM attendance WHERE permission_status='permission' OR permission_status='attended' AND attend_date='$current_date' )";
    
    $sql="SELECT * FROM student as st JOIN field_intake AS fi ON st.intake_id=fi.intake_id WHERE st.status='accepted' AND fi.intake_name='Field/2023/7' AND st.student_id NOT IN (SELECT a.student_id FROM `attendance` AS a JOIN student AS s ON a.student_id=s.student_id WHERE a.permission_status='attended' AND a.attend_date = '$current_date' UNION (SELECT s.student_id FROM `attendance` AS a JOIN student AS s ON a.student_id=s.student_id WHERE a.permission_status='permission' AND a.attend_date = '$current_date'));" 
        ?>
                    <div class="tbl">
                        <?php 
                        // Query

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
                echo "<th>Gender</th>";
                echo "<th>DoB</th>";
                echo "<th>Marital status</th>";
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
     </form>
</body>
</body>
</html>

   