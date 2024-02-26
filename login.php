<?php
  session_start();
?>
<html>
    <head>
        <title>SkyLink Solution</title>
       <link rel="stylesheet" href="css/w3.css">
       <link rel="stylesheet" href="css/styles.css">
        <style>
            body{
                padding-top: 100px;
               /* padding: 50px;*/
            }
            #form{
                width: 380px;
                margin: auto;
            }
        </style>
    </head>
    <body>
    
    <section id="form">
        <form class="w3-card-4" method="post" action="">
            <div class="w3-container w3-blue w3-center">
                <h3>Login Form</h3>
            </div>
            <label>Username:<input type="text" name="username2" autocomplete="on" class="w3-input" placeholder="Enter your name" required></label>
            <label>Password:<input type="password" name="password" class="w3-input" placeholder="Enter your Password" required></label>
            <p style="text-align: center;"><input type="submit" name="submit" class="w3-button w3-round  w3-center w3-red" value="Login"></p>
            <p style="text-align: center;"><input type="checkbox"> Remember me</p>
        </form>
        <?php
                          include_once'dbconect.php';
                          $apply= "SELECT * FROM field_intake ORDER BY intake_id DESC LIMIT 1";
                               $result2=mysqli_query($conn, $apply);
                               // $count2=mysqli_num_rows($result2);
                               while ($fetch=mysqli_fetch_assoc($result2)) {
                                  $count2= $fetch['intake_status'];
                               }
                               
                               if($count2=='open'){
                                 ?>
                        <a href="student_apply.php">Click to apply for field training</a>
                        <?php
                               }
                               else{
                         ?>
                        <a href="#" onclick="alert('Application window closed!')">Click to apply for field training</a>
                        
                     <?php
                               }
                               ?>
         
    </section>
    </body>
</html>
   <?php
           //call db connection
          include_once'dbconect.php';
          //calling time and date according to nairobi time zone
          date_default_timezone_set('Africa/Nairobi');
          $current_date=date('Y-m-d');

          if (isset($_POST['submit'])) {
              //retrive data from form after submit button pressed
            $username=$_POST['username2'];
            $password=$_POST['password'];
             
            //validate data from form
            $sql="SELECT * FROM user AS u JOIN role AS r JOIN student AS s JOIN user_has_student AS us ON u.role_id=r.role_id AND us.student_id=s.student_id AND u.user_id=us.user_id  WHERE u.password='$password' AND s.student_reg='$username' AND s.student_end_date>='$current_date' AND s.student_start_date<='$current_date' AND s.status='accepted'";
                $result=mysqli_query($conn,$sql);
                  //calling data to asign session for further use
                while ($row=mysqli_fetch_assoc($result)) {
                      $_SESSION['student_id']=$row['student_id'];
                      $_SESSION['role_id']=$row['role_id'];
                      $_SESSION['student_reg']=$row['student_reg'];
                      $_SESSION['student_fname']=$row['student_fname'];
                      $_SESSION['student_lname']=$row['student_lname'];
                }

                //count record
                $count=mysqli_num_rows($result);
                if ($count==1) {
                    ?>
                    <script type="text/javascript">
                        // alert('Hongera umefanikiwa kuingia ndani');
                        window.location='index2.php';
                    </script>
                    <?php
                }else{
                    //also check staff after check student
                $sql="SELECT * FROM user AS u JOIN role AS r JOIN staff AS s JOIN user_has_staff AS us ON u.role_id=r.role_id AND us.staff_id=s.staff_id AND u.user_id=us.user_id  WHERE u.password='$password' AND s.staff_reg_number='$username'";
                $result=mysqli_query($conn,$sql);

                //calling data to asign session for further use
               while ($row=mysqli_fetch_assoc($result)) {
                  $_SESSION['staff_id']=$row['staff_id'];
                  $_SESSION['role_id']=$row['role_id'];
                  $_SESSION['staff_reg_number']=$row['staff_reg_number'];
                  $_SESSION['staff_fname']=$row['staff_fname'];
                  $_SESSION['staff_lname']=$row['staff_lname'];
                }

                //count record
                $count=mysqli_num_rows($result);
                if ($count==1) {
                    ?>
                    <script type="text/javascript">
                        // alert('Hongera umefanikiwa kuingia ndani');
                        window.location='index.php';
                    </script>
                    <?php
                }else{
                                   ?>
                    <script type="text/javascript">
                        alert('Sorry username or password is incorect, try again!');
                        window.location='login.php';
                    </script>
                    <?php
                }

          }
      }
    ?>