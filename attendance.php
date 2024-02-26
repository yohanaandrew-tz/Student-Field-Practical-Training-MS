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
    <title>SkyLink Solutions</title>
    <?php include_once'links.php'; ?>
</head>
<body>
    <div class="row">
        <div class="col-md-12" style="padding: 4px;">
            <div class="col-md-9"><h4>My attendance at field.</h4></div>
            <div class="col-md-3"></div>
        </div>
    </div>

   
    <?php
    require('dbconect.php');
    $total_days=30;
    $query = "SELECT * FROM `attendance` WHERE  student_id='$_SESSION[student_id]'"; 
    $result = mysqli_query($conn, $query);
    $count=mysqli_num_rows($result);
       $total_days_percentage=(($total_days/$total_days)*100);
       $attende_percentage=(($count/$total_days)*100);

       $query2 = "SELECT * FROM `attendance` WHERE  student_id='$_SESSION[student_id]' AND permission_status='permission'"; 
       $result2 = mysqli_query($conn, $query2);
    $count2=mysqli_num_rows($result2);
    
       $permission_percentage=(($count2/$total_days)*100);
        ?>
        <div class="w3-container">
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

<br>
  <div class="row">
    <div class="form-group">
        <?php
          $query2 = "SELECT * FROM `attendance` WHERE  student_id='$_SESSION[student_id]' AND attend_date='$posted_date'"; 
           $result2 = mysqli_query($conn, $query2);
           $count2=mysqli_num_rows($result2);
           if ($count2==1) {
            ?>
          <div class="col-md-2"><button  class="btn btn-danger btn-sm" name="attend" disabled>Already Attended</button></div>
            <?php
               // code...
           }else{
        ?>
    <div class="col-md-2"><button  class="btn btn-info btn-sm" name="attend" >Attend today</button></div>
    <?php
      }
    ?>
 </div>
   
 </div> 
     </div>
    </div>
     </form> 
                </div>
            </div>
        </div><br>
     <div class="w3-container">
     <div class="w3-container w3-row-padding">
     <div class="w3-container w3-card-4">
        <h4>Ask for permission</h4>
        <form action="submit_permission.php" method="post">
            <label>Reason:</label>
            <select name="perm_reason" required style="width: 100%;">
                <option disabled selected value="">---Select reason---</option>
                <option>Sick</option>
                <option>Emergerncy</option>
            </select><br><br>
            <?php
          $query3 = "SELECT * FROM `attendance` WHERE  student_id='$_SESSION[student_id]' AND attend_date='$posted_date'"; 
           $result3 = mysqli_query($conn, $query3);
           $count3=mysqli_num_rows($result3);
           if ($count3==1) {
            ?>
           <input class="w3-button w3-blue" type="submit" name="permission" value="Submit" disabled>
            <?php
               // code...
           }else{
        ?>
     <input class="w3-button w3-blue" type="submit" name="permission" value="Submit">
    <?php
      }
    ?>
           
        </form>
      </div>
     </div>
 </div>
</body>
</body>
</html>

    <?php

       if (isset($_POST['attend'])) {
  
            $sql="INSERT INTO `attendance`(`attend_date`, `attend_time`, `approve_date`, `approve_time`, `approve_status`, `student_id`, `permission_status`, `perm_reason`) VALUES ('$posted_date','$time',NULL,NULL,'notapproved','$_SESSION[student_id]', 'attended', 'no')";
            $result=mysqli_query($conn,$sql);
            if ($result==true) {
                ?>
                <script type="text/javascript">
                    alert('Attended, Thank you.');
                    window.location='attendance.php';
                </script>
                <?php
            }else{
                    ?>
                     <script type="text/javascript">
                    alert('Please try again!');
                      window.location='attendance.php';
                </script>
                <?php  
            }

       }
      ?>
      