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
$study_level = $_REQUEST['study_level'];
$student_phone = $_REQUEST['student_phone'];
$student_email = $_REQUEST['student_email'];
$student_compitence = $_REQUEST['student_compitence'];
$student_photo = $_REQUEST['student_letter'];
$student_start_date = $_REQUEST['student_start_date'];
$student_end_date = $_REQUEST['student_end_date'];
$student_reg_date = $_REQUEST['student_reg_date'];
$student_gender = $_REQUEST['student_gender'];
$student_field_duration = $_REQUEST['student_field_duration'];
$student_dob = $_REQUEST['student_dob'];
$student_marital_status = $_REQUEST['student_marital_status'];
      
      //check if student_reg exist
      $check="SELECT * FROM student WHERE student_reg='$student_reg'";
      $result_check=mysqli_query($conn,$check);
      $count=mysqli_num_rows($result_check);
      if ($count==1) {
      	   ?>
            <script type="text/javascript">
            	alert('Student registration Exist.');
            	window.location='add_student.php';
            </script>
      	   <?php
      }else{
      	// if student not exist proceed

     //insert student 
     $sql = "INSERT INTO student VALUES (NULL, '$student_reg', '$student_fname', '$student_lname', '$student_college', '$student_program', '$study_level', '$student_phone', '$student_email', '$student_compitence', '$student_letter', '$student_start_date', '$student_end_date', '$student_reg_date', '$student_gender','$student_field_duration', '$student_dob', '$student_marital_status', 'accepted')";
     $result=mysqli_query($conn, $sql);

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
            	alert('Student registered successfully.');
            	window.location='students.php';
            </script>
      	   <?php   
}
else{
    echo "ERROR: Hush! Sorry $sql. "
    . mysqli_error($conn);
}  

    }
 }
?>