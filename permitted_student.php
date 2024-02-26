<?php
 session_start();

include_once'dbconect.php';
//calling time and date according to nairobi time zone
  date_default_timezone_set('Africa/Nairobi');
  $posted_date=date('Y/m/d');
  $time=date('H:i:s');

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OFPT Management System</title>
    <?php include_once'links.php'; ?>
</head>
<body>
    <div class="row">
        <div class="col-md-12" style="padding: 4px;">
            <div class="col-md-9"><h4>Students permitted.</h4></div>
            <div class="col-md-3"></div>
        </div>
    </div>
   <form action="" method="post">
    <?php
    require('dbconect.php');
    // $total_days=30;
    $query = "SELECT * FROM `attendance` as a JOIN `student` as s ON s.student_id=a.student_id WHERE a.attend_date='$posted_date' AND a.approve_status='approved' AND permission_status='permission'"; 
        ?>
                    <div class="tbl">
                        <?php 
                        // Query

if($result = mysqli_query($conn, $query)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-bordered table-hover table-responsive'>";
            echo "<tr>";
                echo "<th>SN</th>";
                echo "<th>Name</th>";
                echo "<th>Attended on</th>";
                 echo "<th>Details</th>";
            echo "</tr>";
            $count=mysqli_num_rows($result);
            $i=1;
            while ($i<=$count) {     
        while($row = mysqli_fetch_array($result)){
            echo "<tr id='id01'>";
                 echo "<td>" . $i . "</td>";
                echo "<td>" . $row['student_fname'].' '.$row['student_lname']; "</td>";
                echo "<td>" . $row['attend_date'].' '.$row['attend_time']; "</td>";
                ?>
                <td>
                   <a class="btn btn-info btn-sm" href="student_attend_detail.php?student_id=<?php echo $row['student_id'];?>"><span></span>view</a>
                </td>
                <?php
            echo "</tr>";
              $i++;
            }
         }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        ?>
        <div style="color:red; padding:2px;"  >
           <h4 class="text-center">"No student"</h4>
        </div>
      <?php
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
?>
     </div>
    </div>
     </form>
</body>
<a class="w3-button w3-blue" href="student_attendance_summary.php">Back</a>
</body>
</html>