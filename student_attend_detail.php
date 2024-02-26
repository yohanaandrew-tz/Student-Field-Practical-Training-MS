<?php 
session_start();
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

</body>
</html>
<?php 
include_once'dbconect.php';
	$student_id = $_REQUEST['student_id'];
 $total_days=30;
    $query = "SELECT * FROM `attendance` WHERE  student_id='$student_id'"; 
    $result = mysqli_query($conn, $query);
    $count=mysqli_num_rows($result);
       $total_days_percentage=(($total_days/$total_days)*100);
       $attende_percentage=(($count/$total_days)*100);

       $query2 = "SELECT * FROM `attendance` WHERE  student_id='$student_id' AND permission_status='permission'"; 
       $result2 = mysqli_query($conn, $query2);
    $count2=mysqli_num_rows($result2);
    
       $permission_percentage=(($count2/$total_days)*100);
        ?>
        <h3><?php echo "attendance detail"; ?></h3>
        <br><div class="w3-container">
            <div class="w3-container w3-row-padding">
                <div class="w3-container w3-card-4">
                    <form name="form" method="post" action="">
    <div class="row">
        <div class="col-md-12">
         
 <div class="row">
     <div class="col-md-6">
     <div class="form-group">
        <label>Total days :</label><label class="form-control"><?php echo $total_days; ?></label>
      </div>
     </div>
    <div class="col-md-6">
     <div class="form-group">
        <label>Total days in percentage :</label><label class="form-control"><?php echo $total_days_percentage.'%'; ?></label>
      </div>
     </div>
 </div>

  <div class="row">
     <div class="col-md-6">
     <div class="form-group">
        <label>Days Attended :</label><label class="form-control"><?php echo $count; ?></label>
      </div>
     </div>

    <div class="col-md-6">
     <div class="form-group">
        <label>Days Attended in percentage :</label><label class="form-control"><?php echo (round($attende_percentage)).'%'; ?></label>
      </div>
     </div>
 </div>
 <div class="row">
     <div class="col-md-6">
     <div class="form-group">
        <label>Days permited :</label><label class="form-control"><?php echo $count2; ?></label>
      </div>
     </div>

    <div class="col-md-6">
     <div class="form-group">
        <label>Days permited in percentage :</label><label class="form-control"><?php echo (round($permission_percentage)).'%'; ?></label>
      </div>
     </div>
 </div>
 <a class="w3-button w3-blue" href="student_attendance_summary.php">Back</a>
<br>
  
   
 </div> 
     </div>
    </div>
     </form> 
                </div>
            </div>
        </div>
