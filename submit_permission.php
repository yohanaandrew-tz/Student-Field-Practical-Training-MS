<?php
 session_start();

include_once'dbconect.php';
//calling time and date according to nairobi time zone
  date_default_timezone_set('Africa/Nairobi');
  $posted_date=date('Y-m-d');
  $time=date('H:i:s');
   $reason=$_REQUEST['perm_reason'];
   
       if (isset($_POST['permission'])) {
  
            // $sql2="INSERT INTO `attendance`(`attend_date`, `attend_time`, `approve_date`, `approve_time`, `approve_status`, `student_id', 'permission_status`,'perm_reason') VALUES ('$posted_date','$time',NULL,NULL,'notapproved','$_SESSION[student_id]', 'notapproved', '$reason')";

            $sql2="INSERT INTO `attendance`(`attend_date`, `attend_time`, `approve_date`, `approve_time`, `approve_status`, `student_id`, `permission_status`, `perm_reason`) VALUES ('$posted_date','$time',NULL,NULL,'notapproved','$_SESSION[student_id]','permission','$reason')";
            $result2=mysqli_query($conn,$sql2);
            if ($result2==true) {
                ?>
                <script type="text/javascript">
                    alert('Your request submitted successfully');
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