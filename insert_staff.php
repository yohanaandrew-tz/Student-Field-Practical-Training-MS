<?php
   include_once'dbconect.php';
  
  //calling time and date according to nairobi time zone
  date_default_timezone_set('Africa/Nairobi');
  $posted_date=date('Y/m/d');
  $time=date('H:i:s');
 if (isset($_POST['register'])){
  // to capture submitted info
// $staff_id = $_REQUEST['staff_id'];
$staff_reg_number = $_REQUEST['staff_reg_number'];
$staff_fname = $_REQUEST['staff_fname'];
$staff_lname = $_REQUEST['staff_lname'];
$staff_gender = $_REQUEST['staff_gender'];
$staff_email = $_REQUEST['staff_email'];
$staff_phone = $_REQUEST['staff_phone'];
$staff_position = $_REQUEST['staff_position'];
$staff_photo = $_REQUEST['staff_photo'];
// $staff_signature = $_REQUEST['staff_signature'];
$staff_reg_date = $_REQUEST['staff_reg_date'];

    // File upload path picture
$targetDir = "uploaded-sign/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

// Allow certain file formats
$allowTypes = array('jpg','jpeg', 'png');

      //check if student_reg exist
      $check="SELECT * FROM staff WHERE staff_reg_number='$staff_reg_number'";
      $result_check=mysqli_query($conn,$check);
      $count=mysqli_num_rows($result_check);
      if ($count==1) {
      	   ?>
            <script type="text/javascript">
            	alert('Staff member registration Exist.');
            	window.location='add_staff.php';
            </script>
      	   <?php
      }else{
      	// if staff not exist proceed

     //insert staff 

        if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT INTO staff VALUES (NULL, '$staff_reg_number', '$staff_fname', '$staff_lname', '$staff_gender', '$staff_email', '$staff_phone', '$staff_position', '$staff_photo', '$fileName', '$staff_reg_date')");
            }

    // end upload and isert
     // $sql = "INSERT INTO staff VALUES (NULL, '$staff_reg_number', '$staff_fname', '$staff_lname', '$staff_gender', '$staff_email', '$staff_phone', '$staff_position', '$staff_photo', '$staff_signature', '$staff_reg_date')";
     // $result=mysqli_query($conn, $sql);

     //Calling staff id after insert staff information
     $sql2="SELECT * FROM staff WHERE staff_reg_number='$staff_reg_number' AND staff_phone='$staff_phone' AND staff_email='$staff_email'";
        $result2=mysqli_query($conn, $sql2);
        while ($row=mysqli_fetch_assoc($result2)) {
        	$staff_id=$row['staff_id'];
        }

        //create uniqueness
        $reg_time=$staff_id.'_'.$posted_date.'_'.$time;
      $user="INSERT INTO `user`(`password`,`Reg_time`, `role_id`) VALUES ('$staff_lname','$reg_time','2')";
       $result_user=mysqli_query($conn, $user);

            //Calling user id
     $user2="SELECT * FROM user WHERE password='$staff_lname' AND Reg_time='$reg_time' AND role_id='2'";
        $result_user2=mysqli_query($conn, $user2);
        while ($row=mysqli_fetch_assoc($result_user2)) {
        	$user_id=$row['user_id'];
        }

        //insert data to user_has student
        $final="INSERT INTO `user_has_staff`(`staff_id`, `user_id`) VALUES ('$staff_id','$user_id')";
         $result_final=mysqli_query($conn, $final);


if($result_final==true){

          	   ?>
            <script type="text/javascript">
            	alert('Staff registered successfully.');
            	window.location='staff.php';
            </script>
      	   <?php   
}
else{
    echo "ERROR: Hush! Sorry $sql. "
    . mysqli_error($conn);
}  
        //check file like png,jpg,jpeg
        }else{
                           ?>
            <script type="text/javascript">
                alert('Invalid signature format. please use png,jpg,jpeg format');
                // window.location='staff.php';
            </script>
           <?php   
           }
     } // exist staff
 } //issset
?>