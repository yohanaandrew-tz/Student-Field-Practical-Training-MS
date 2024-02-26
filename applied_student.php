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
                    <h4>Applied student for field training</h4>
                    <a class="w3-button w3-blue" href="add_intake.php">add intake</a>
                    <span style="float:right;"><input  oninput="w3.filterHTML('#id01', 'tr', this.value)" type="search" minlength="5" placeholder="Search here"></span>
                    
                <div class="tbl">
                    <div class="row">
                        <div class="col-md-12">
                             <form action="" method="post">
                        <?php
                        include_once'dbconect.php';
                        // Query
$sql = "SELECT * FROM student WHERE status='pending'";
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
                echo "<th colspan='4'>Action</th>";
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
                <a href="attachment/<?php echo $row['student_letter'] ?>">Atachment</a>
               </td>
                 </form>
                <td><input class="hidden" type="text" name="student_id" value="<?php echo $row['student_id'];  ?>">
                    <input type="submit" name="approve" value="accept" class="btn btn-info btn-sm" onclick="return confirm('Are you sure you want to accept?')">
                </td>
                <td><input class="hidden" type="text" name="student_id" value="<?php echo $row['student_id'];  ?>">
                    <input type="submit" name="reject" value="reject" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to reject?')">
                </td>
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
                     </form>
                    </div>
                    </div>
                </div>
            </body>
</html>
 <?php

       if (isset($_POST['approve'])) {
  
            $sql="UPDATE `student` SET `status`='accepted' WHERE student_id='$_POST[student_id]' ";
            $result=mysqli_query($conn,$sql);
            if ($result==true) {
                ?>
                <script type="text/javascript">
                    alert('Student accepted, Thank you.');
                    window.location='applied_student.php';
                </script>
                <?php
            }
       }
      ?>

      <?php

       if (isset($_POST['reject'])) {
  
            $sql="UPDATE `student` SET `status`='rejected' WHERE student_id='$_POST[student_id]' ";
            $result=mysqli_query($conn,$sql);
            if ($result==true) {
                ?>
                <script type="text/javascript">
                    alert('Student rejected, Thank you.');
                    window.location='applied_student.php';
                </script>
                <?php
            }
       }
      ?>