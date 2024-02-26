<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SkyLink Solutions</title>
        <link href="css/w3.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body> 
        <!-- <a class="w3-button w3-blue" href="tasks.php">View</a> -->
        <br>
        <div class="w3-container w3-row-padding">
            <div class="w3-card-4">
                <!-- <div class="w3-container w3-blue">
                    <h3>Add Log</h3>
                </div> -->
                    <form method="POST" action="">
                    <label>Task:</label><input style="width:100%;" class="" type="text" name="log_task" placeholder="Enter task" required><br><br>              
                    <label>Date:</label><input style="width:100%;" class="" type="date" name="log_date" placeholder="" required><br><br>
                    <label>Acquired Skills:</label><textarea style="width:100%;" name="log_skills" cols="60" rows="4" placeholder="Skills acquired here....."></textarea><br><br>
                    <p><input type="submit" name="add" class="w3-button w3-blue" value="SUBMIT"></p>
                </form>
                </div>
        <div>
    </div>
    </body>
    </html>

    <?php
          include_once'dbconect.php';

       if (isset($_POST['add'])) {
            $log_task= mysqli_escape_string($conn ,$_POST['log_task']);
            $log_date= mysqli_escape_string($conn ,$_POST['log_date']);
            $log_skills= mysqli_escape_string($conn ,$_POST['log_skills']);

            $sql="INSERT INTO `logbook`(`log_task`, `log_skills`, `log_date`, `student_id`) VALUES ('$log_task','$log_skills',' $log_date','$_SESSION[student_id]')";
            $result=mysqli_query($conn,$sql);
            if ($result==true) {
                ?>
                <script type="text/javascript">
                    alert('Log added successfully');
                </script>
                <?php
            }else{
                    ?>
                     <script type="text/javascript">
                    alert('Log failed, plz tray again!');
                </script>
                <?php  
            }

       }
      ?>