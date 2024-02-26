<?php
session_start();
    include_once'dbconect.php';
    if (isset($_POST['approve'])) {
        $student_id=$_POST['id'];

      
                           ?>

                           <?php
          $query2 = "SELECT * FROM `approve` WHERE  student_id='$student_id'"; 
           $result2 = mysqli_query($conn, $query2);
           $count2=mysqli_num_rows($result2);
           if ($count2<1) {
            
            $app="INSERT INTO `approve`(`approve_print_status`, `student_id`, `staff_id`, `approved_by`) VALUES ('approved','$_POST[id]','$_SESSION[staff_id]', '$_SESSION[staff_lname]')";
                  $resultapp=mysqli_query($conn, $app);
                  if($resultapp==true){
                    ?>
            <script type="text/javascript">
                alert('Logbook approved successfully');
                window.location='approve_log.php';
            </script>
           <?php 
           }
           else{
            ?>
                <script type="text/javascript">
                    alert('Sorry, something went wrong!');
                window.location='approve_log.php';
                </script>
            <?php
           }
      }
      else{
        ?>
            <script type="text/javascript">
                    alert('Sorry Logbook already approved');
                window.location='approve_log.php';
                </script>
        <?php
      }
  }

 ?>
