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
                    <h4>List of students to approve Logbook</h4>
                    
                    
                <div class="tbl">
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                        include_once'dbconect.php';

                $apply= "SELECT * FROM field_intake ORDER BY intake_id DESC LIMIT 1";
                $result2=mysqli_query($conn, $apply);
                // $count2=mysqli_num_rows($result2);
                while ($fetch=mysqli_fetch_assoc($result2)) {
                  $db_intake= $fetch['intake_id'];
                   // echo "<b>Intake:</b>" . " " . "$fetch[intake_name]";
                }
                $intake=$db_intake;

                        // Query
$sql = "SELECT * FROM student as s JOIN field_intake as f ON s.intake_id=f.intake_id WHERE s.status='accepted' AND f.intake_id='$intake'";
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
                
                echo "<th>Gender</th>";
               
                echo "<th>Action</th>";
               
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
                echo "<td>" . $row['student_gender'] . "</td>";
                  ?>
                  <form action="staff_preview_log.php" method="post">

                    <input type="text" name="student_id" class="hidden" value="<?php echo $row['student_id'];?> ">
                    <input type="text" name="student_fname" class="hidden" value="<?php echo $row['student_fname'];?> ">
                    <input type="hidden" name="student_lname" value="<?php echo $row['student_lname'];?> ">
                <td><button type="submit" name="approved" class="btn btn-success btn-sm" >View</button></td>
                </form>
                
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
        echo "No records matching your query were found.";
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