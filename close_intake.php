<?php
session_start();
    include_once'dbconect.php';
    if (isset($_POST['close'])) {
        $intake_id = $_REQUEST['intake_id'];
      $app="UPDATE `field_intake` SET `intake_status`='closed' WHERE intake_id='$intake_id'";
      $resultapp=mysqli_query($conn, $app);
      if($resultapp==true){
                           ?>
            <script type="text/javascript">
                alert('Intake close');
                window.location='add_intake.php';
            </script>
           <?php 
      }
  }

 ?>
