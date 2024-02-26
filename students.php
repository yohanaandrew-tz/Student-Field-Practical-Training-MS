<?php
session_start();
?>
<html>
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SkyLink Solutions</title>
<!--     <link href="css/w3.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" /> -->
        <?php include_once'links.php'; ?>
        <style type="text/css">
/*            table{
                width:auto;
                }
                table,th,td{
                font-size: 12px;
                padding: 1px;
                border: 1px solid skyblue;
                border-collapse: collapse;
                }
                th{
                color: white;
                background-color: skyblue;
                }
                .tbl{
                    overflow-x: auto;
                }*/
                </style>
    <head>
            <body>
                    <h4>Field Practical training Students</h4>
                    <div class="w3-container w3-row-padding">
                        <div class="w3-container w3-card-4">
                    <a class="w3-button w3-blue" href="add_student.php">Add student</a>
                    <span style="float:right;"><input  oninput="w3.filterHTML('#id01', 'tr', this.value)" type="search" minlength="5" placeholder="Search here"></span>
                    <div>
                        <form action="students_by_intake.php" method="POST">
                    
                            <?php
                        include_once'dbconect.php';
                                       $sql = "SELECT intake_name FROM field_intake ORDER BY intake_id DESC";
                if($result = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        echo "<select name='intake_name' required>";
                        echo "<option disabled selected value=''>Search by intake</option>";
                            while($row = mysqli_fetch_array($result)){
                                echo "<option>" . $row['intake_name'] . "</option>";
                        echo "</select>";
   
                            }
                        }
                                         // Free result set
                        mysqli_free_result($result);
                    } else{
                        echo "No intake now";
                    }
                    
                        ?>
                       <input type="submit" name="intake_searchh" value="Search">
                       </form>
                    </div>
                            </div>
                    </div><br>

                    <div class="tbl">
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                        include_once'dbconect.php';
                        // Get intake id from database
$apply= "SELECT * FROM field_intake ORDER BY intake_id DESC LIMIT 1";
$result2=mysqli_query($conn, $apply);
// $count2=mysqli_num_rows($result2);
while ($fetch=mysqli_fetch_assoc($result2)) {
  $db_intake= $fetch['intake_id'];
   echo "<b>Intake:</b>" . " " . "$fetch[intake_name]";
   echo "<h4>Certificate students</h4>";
}
$intake=$db_intake;
                        // Query
$sql = "SELECT * FROM student as s JOIN field_intake as f ON s.intake_id=f.intake_id WHERE s.status='accepted' AND f.intake_id='$intake' AND s.study_level='Certificate'";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-bordered table-hover responsive'>";
            echo "<tr>";
                echo "<th>SN</th>";
                echo "<th>Reg Number</th>";
                echo "<th>Name</th>";
                echo "<th>Surname</th>";
                echo "<th>College</th>";
                echo "<th>Program</th>";
                echo "<th>Phone</th>";
                echo "<th>Email</th>";
                echo "<th>Compitence</th>";
                // echo "<th>Start</th>";
                // echo "<th>End</th>";
                // echo "<th>Registered on</th>";
                echo "<th>Gender</th>";
                echo "<th>DoB</th>";
                echo "<th>Marital status</th>";
                echo "<th colspan='3'>Action</th>";
                // echo "<th></th>";
            echo "</tr>";
            $count=mysqli_num_rows($result);
              $i=1;
             while ($i<=$count) {
        while($row = mysqli_fetch_array($result)){
            echo "<tbody id='id01'>";
            echo "<tr>";
                echo "<td>" . $i. "</td>";
                echo "<td>" . $row['student_reg'] . "</td>";
                echo "<td>" . $row['student_fname'] . "</td>";
                echo "<td>" . $row['student_lname'] . "</td>";
                echo "<td>" . $row['student_college'] . "</td>";
                echo "<td>" . $row['student_program'] . "</td>";
                echo "<td>" . $row['student_phone'] . "</td>";
                echo "<td>" . $row['student_email'] . "</td>";
                echo "<td>" . $row['student_compitence'] . "</td>";
                 echo "<td>" . $row['student_gender'] . "</td>";
                echo "<td>" . $row['student_dob'] . "</td>";
                echo "<td>" . $row['student_marital_status'] . "</td>";
                // echo "<td>" . $row['student_reg_date'] . "</td>";
                // echo "<td>" . $row['student_field_duration'] . "</td>";
                  ?>
                  <form action="delete_student.php" method="post">
                <td><a class="btn btn-success btn-sm" href="view_student.php?student_id=<?php echo $row['student_id'];?>"><span></span>View</a></td>
                <td>   
                <input class="hidden" type="text" name="student_id" value="<?php echo $row['student_id'];?>"> 
                <input type="submit" name="delete" class="btn btn-sm btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete?');">
               </td>
                 </form>
                <td><a class="btn btn-success btn-sm" href="edit_student.php?student_id=<?php echo $row['student_id'];?>"><span></span>Edit</a></td>
                <?php

            echo "</tr>";
            echo "</tbody>";
            $i++;  
        } 
    }
  
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<p>No certificate students, this Intake</p>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
?>
                    </div>
                    </div>
                </div>

                <div class="tbl">
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                        include_once'dbconect.php';
                        // Get intake id from database
$apply= "SELECT * FROM field_intake ORDER BY intake_id DESC LIMIT 1";
$result2=mysqli_query($conn, $apply);
// $count2=mysqli_num_rows($result2);
while ($fetch=mysqli_fetch_assoc($result2)) {
  $db_intake= $fetch['intake_id'];
   // echo "<b>Intake:</b>" . " " . "$fetch[intake_name]";
  echo "<h4>Diploma students</h4>";
}
$intake=$db_intake;
                        // Query
$sql = "SELECT * FROM student as s JOIN field_intake as f ON s.intake_id=f.intake_id WHERE s.status='accepted' AND f.intake_id='$intake' AND s.study_level='Diploma'";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-bordered table-hover responsive'>";
            echo "<tr>";
                echo "<th>SN</th>";
                echo "<th>Reg Number</th>";
                echo "<th>Name</th>";
                echo "<th>Surname</th>";
                echo "<th>College</th>";
                echo "<th>Program</th>";
                echo "<th>Phone</th>";
                echo "<th>Email</th>";
                echo "<th>Compitence</th>";
                // echo "<th>Start</th>";
                // echo "<th>End</th>";
                // echo "<th>Registered on</th>";
                echo "<th>Gender</th>";
                echo "<th>DoB</th>";
                echo "<th>Marital status</th>";
                echo "<th colspan='3'>Action</th>";
                // echo "<th></th>";
            echo "</tr>";
            $count=mysqli_num_rows($result);
              $i=1;
             while ($i<=$count) {
        while($row = mysqli_fetch_array($result)){
            echo "<tbody id='id01'>";
            echo "<tr>";
                echo "<td>" . $i. "</td>";
                echo "<td>" . $row['student_reg'] . "</td>";
                echo "<td>" . $row['student_fname'] . "</td>";
                echo "<td>" . $row['student_lname'] . "</td>";
                echo "<td>" . $row['student_college'] . "</td>";
                echo "<td>" . $row['student_program'] . "</td>";
                echo "<td>" . $row['student_phone'] . "</td>";
                echo "<td>" . $row['student_email'] . "</td>";
                echo "<td>" . $row['student_compitence'] . "</td>";
                 echo "<td>" . $row['student_gender'] . "</td>";
                echo "<td>" . $row['student_dob'] . "</td>";
                echo "<td>" . $row['student_marital_status'] . "</td>";
                // echo "<td>" . $row['student_reg_date'] . "</td>";
                // echo "<td>" . $row['student_field_duration'] . "</td>";
                  ?>
                  <form action="delete_student.php" method="post">
                <td><a class="btn btn-success btn-sm" href="view_student.php?student_id=<?php echo $row['student_id'];?>"><span></span>View</a></td>
                <td>   
                <input class="hidden" type="text" name="student_id" value="<?php echo $row['student_id'];?>"> 
                <input type="submit" name="delete" class="btn btn-sm btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete?');">
               </td>
                 </form>
                <td><a class="btn btn-success btn-sm" href="edit_student.php?student_id=<?php echo $row['student_id'];?>"><span></span>Edit</a></td>
                <?php

            echo "</tr>";
            echo "</tbody>";
            $i++;  
        } 
    }
  
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<p>No diploma students, this intake </p>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
?>
                    </div>
                    </div>
                </div>



                <div class="tbl">
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                        include_once'dbconect.php';
                        // Get intake id from database
$apply= "SELECT * FROM field_intake ORDER BY intake_id DESC LIMIT 1";
$result2=mysqli_query($conn, $apply);
// $count2=mysqli_num_rows($result2);
while ($fetch=mysqli_fetch_assoc($result2)) {
  $db_intake= $fetch['intake_id'];
   // echo "<b>Intake:</b>" . " " . "$fetch[intake_name]";
  echo "<h4>Bachelor students</h4>";
}
$intake=$db_intake;
                        // Query
$sql = "SELECT * FROM student as s JOIN field_intake as f ON s.intake_id=f.intake_id WHERE s.status='accepted' AND f.intake_id='$intake' AND s.study_level='Bachelor'";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-bordered table-hover responsive'>";
            echo "<tr>";
                echo "<th>SN</th>";
                echo "<th>Reg Number</th>";
                echo "<th>Name</th>";
                echo "<th>Surname</th>";
                echo "<th>College</th>";
                echo "<th>Program</th>";
                echo "<th>Phone</th>";
                echo "<th>Email</th>";
                echo "<th>Compitence</th>";
                // echo "<th>Start</th>";
                // echo "<th>End</th>";
                // echo "<th>Registered on</th>";
                echo "<th>Gender</th>";
                echo "<th>DoB</th>";
                echo "<th>Marital status</th>";
                echo "<th colspan='3'>Action</th>";
                // echo "<th></th>";
            echo "</tr>";
            $count=mysqli_num_rows($result);
              $i=1;
             while ($i<=$count) {
        while($row = mysqli_fetch_array($result)){
            echo "<tbody id='id01'>";
            echo "<tr>";
                echo "<td>" . $i. "</td>";
                echo "<td>" . $row['student_reg'] . "</td>";
                echo "<td>" . $row['student_fname'] . "</td>";
                echo "<td>" . $row['student_lname'] . "</td>";
                echo "<td>" . $row['student_college'] . "</td>";
                echo "<td>" . $row['student_program'] . "</td>";
                echo "<td>" . $row['student_phone'] . "</td>";
                echo "<td>" . $row['student_email'] . "</td>";
                echo "<td>" . $row['student_compitence'] . "</td>";
                 echo "<td>" . $row['student_gender'] . "</td>";
                echo "<td>" . $row['student_dob'] . "</td>";
                echo "<td>" . $row['student_marital_status'] . "</td>";
                // echo "<td>" . $row['student_reg_date'] . "</td>";
                // echo "<td>" . $row['student_field_duration'] . "</td>";
                  ?>
                  <form action="delete_student.php" method="post">
                <td><a class="btn btn-success btn-sm" href="view_student.php?student_id=<?php echo $row['student_id'];?>"><span></span>View</a></td>
                <td>   
                <input class="hidden" type="text" name="student_id" value="<?php echo $row['student_id'];?>"> 
                <input type="submit" name="delete" class="btn btn-sm btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete?');">
               </td>
                 </form>
                <td><a class="btn btn-success btn-sm" href="edit_student.php?student_id=<?php echo $row['student_id'];?>"><span></span>Edit</a></td>
                <?php

            echo "</tr>";
            echo "</tbody>";
            $i++;  
        } 
    }
  
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<p>No Bachelor students, this intake</p>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
?>
                    </div>
                    </div>
                </div>
            </body>
</html>