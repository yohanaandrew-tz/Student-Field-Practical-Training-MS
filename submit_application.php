<?php
   include_once'dbconect.php';
  
  //calling time and date according to nairobi time zone
  date_default_timezone_set('Africa/Nairobi');
  $posted_date=date('Y/m/d');
  $time=date('H:i:s');
 if (isset($_POST['register'])){

// to capture submitted info
$student_reg = $_REQUEST['student_reg'];
$student_fname = $_REQUEST['student_fname'];
$student_lname = $_REQUEST['student_lname'];
$student_college = $_REQUEST['student_college'];
$student_program = $_REQUEST['student_program'];
$student_phone = $_REQUEST['student_phone'];
$student_email = $_REQUEST['student_email'];
$student_compitence = $_REQUEST['student_compitence'];
// $student_letter = $_REQUEST['student_letter'];
$student_start_date = $_REQUEST['student_start_date'];
$student_end_date = $_REQUEST['student_end_date'];
$student_reg_date = $_REQUEST['student_reg_date'];
$student_gender = $_REQUEST['student_gender'];
$student_field_duration = $_REQUEST['student_field_duration'];
$student_dob = $_REQUEST['student_dob'];
$student_marital_status = $_REQUEST['student_marital_status'];
// Get intake id from database
$apply= "SELECT * FROM field_intake ORDER BY intake_id DESC LIMIT 1";
$result2=mysqli_query($conn, $apply);
// $count2=mysqli_num_rows($result2);
while ($fetch=mysqli_fetch_assoc($result2)) {
  $db_intake= $fetch['intake_id'];
}
$intake=$db_intake;
      
      //check if student_reg exist
      $check="SELECT * FROM student WHERE student_reg='$student_reg'";
      $result_check=mysqli_query($conn,$check);
      $count=mysqli_num_rows($result_check);
      if ($count==1) {
      	   ?>
            <script type="text/javascript">
            	alert('Student registration Exist.');
            	window.location='check_application_student.php';
            </script>
      	   <?php
      }else{
      	// if student not exist proceed
          // File upload path picture
$targetDir = "attachment/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

// Allow certain file formats
$allowTypes = array('pdf');

      //check if student_reg exist
      $check="SELECT * FROM student WHERE student_reg='$student_reg'";
      $result_check=mysqli_query($conn,$check);
      $count=mysqli_num_rows($result_check);
      if ($count==1) {
           ?>
            <script type="text/javascript">
                alert('Student member registration Exist.');
                window.location='student_apply.php';
            </script>
           <?php
      }else{
        // if student not exist proceed

     //insert student

        if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
     //insert student 
     $sql = "INSERT INTO student VALUES (NULL, '$student_reg', '$student_fname', '$student_lname', '$student_college', '$student_program', '$student_phone', '$student_email', '$student_compitence', '$fileName', '$student_start_date', '$student_end_date', '$student_reg_date', '$student_gender','$student_field_duration', '$student_dob', '$student_marital_status', 'pending', '$intake')";
     $result=mysqli_query($conn, $sql);
            }
     //Calling student id after insert student information
     $sql2="SELECT * FROM student WHERE student_reg='$student_reg' AND student_phone='$student_phone' AND student_email='$student_email'";
        $result2=mysqli_query($conn, $sql2);
        while ($row=mysqli_fetch_assoc($result2)) {
        	$student_id=$row['student_id'];
        }

        //create uniqueness
        $reg_time=$student_id.'_'.$posted_date.'_'.$time;
      $user="INSERT INTO `user`(`password`,`Reg_time`, `role_id`) VALUES ('$student_lname','$reg_time','1')";
       $result_user=mysqli_query($conn, $user);

            //Calling user id
     $user2="SELECT * FROM user WHERE password='$student_lname' AND Reg_time='$reg_time' AND role_id='1'";
        $result_user2=mysqli_query($conn, $user2);
        while ($row=mysqli_fetch_assoc($result_user2)) {
        	$user_id=$row['user_id'];
        }

        //insert data to user_has student
        $final="INSERT INTO `user_has_student`(`student_id`, `user_id`) VALUES ('$student_id','$user_id')";
         $result_final=mysqli_query($conn, $final);


if($result_final==true){

          	   ?>
            <script type="text/javascript">
            	alert('Your application submitted successfully.');
            	window.location='login.php';
            </script>
      	   <?php   
}
else{
    echo "ERROR: Hush! Sorry $sql. "
    . mysqli_error($conn);
}  
}
}
    }
 }
?>