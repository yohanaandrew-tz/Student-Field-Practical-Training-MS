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
            <div class="col-md-9"><h4>Students attendance today.</h4></div>
            <div class="col-md-3"></div>
        </div>
    </div>
   <form action="" method="post">
    <?php
    require('dbconect.php');
    // $total_days=30;
    $query = "SELECT * FROM `attendance` as a JOIN `student` as s ON s.student_id=a.student_id WHERE a.attend_date='$posted_date' AND a.approve_status='notapproved'"; 
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
                echo "<th>Permission Status</th>";
                echo "<th>Action</th>";
            echo "</tr>";
            $count=mysqli_num_rows($result);
            $i=1;
            while ($i<=$count) {     
        while($row = mysqli_fetch_array($result)){
            echo "<tr id='id01'>";
                 echo "<td>" . $i . "</td>";
                echo "<td>" . $row['student_fname'].' '.$row['student_lname']; "</td>";
                echo "<td>" . $row['attend_date'].' '.$row['attend_time']; "</td>";
                echo "<td>" . $row['permission_status']. "</td>";
                ?>
                <td>
                     <input class="hidden" type="text" name="student_id" value="<?php echo $row['student_id'];  ?>">
                    <input type="submit" name="approve" value="approve" class="w3-button w3-green"></td>
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
           <h4 class="text-center">"No student attendency to approve..."</h4>
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
</body>
</html>

    <?php

       if (isset($_POST['approve'])) {
  
            $sql="UPDATE `attendance` SET `approve_date`='$posted_date',`approve_time`='$time',`approve_status`='approved' WHERE student_id='$_POST[student_id]' ";
            $result=mysqli_query($conn,$sql);
            if ($result==true) {
                ?>
                <script type="text/javascript">
                    alert('Student approved, Thank you.');
                    window.location='attendance_approve.php';
                </script>
                <?php
            }
       }
      ?>