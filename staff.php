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
      <!--   <link href="css/w3.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" /> -->
        <?php include_once'links.php'; ?>
        <style type="text/css">
            .tbl{
                overflow-x: auto;
                }
        </style>
    <head>
            <body>                
                    <h4>Staff</h4>
                    <a class="btn btn-info btn-sm" href="add_staff.php">Add member</a>
                    <span style="float:right;"><input  oninput="w3.filterHTML('#id01', 'tr', this.value)" type="search" minlength="5" placeholder="Search here"></span>
                    
                    <div class="tbl">
                        <?php
                        include_once'dbconect.php';
                        // Query
$sql = "SELECT * FROM staff AS s JOIN user AS u JOIN user_has_staff AS us JOIN role AS r ON  s.staff_id=us.staff_id AND u.user_id=us.user_id AND u.role_id=r.role_id";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-bordered table-hover responsive'>";
            echo "<tr>";
                echo "<th>SN</th>";
                echo "<th>ID Number</th>";
                echo "<th>Name</th>";
                echo "<th>Surname</th>";
                echo "<th>Gender</th>";
                echo "<th>Email</th>";
                echo "<th>Phone</th>";
                echo "<th>Postion</th>";
                // echo "<th>Registered on</th>";
                echo "<th colspan='2'>Action</th>";
            echo "</tr>";
            $count=mysqli_num_rows($result);
            $i=1;
            while ($i<=$count) {
               
           
        while($row = mysqli_fetch_array($result)){
            echo "<tbody id='id01'>";
            echo "<tr'>";
                 echo "<td>" . $i . "</td>";
                echo "<td>" . $row['staff_reg_number'] . "</td>";
                echo "<td>" . $row['staff_fname'] . "</td>";
                echo "<td>" . $row['staff_lname'] . "</td>";
                echo "<td>" . $row['staff_gender'] . "</td>";
                echo "<td>" . $row['staff_email'] . "</td>";
                echo "<td>" . $row['staff_phone'] . "</td>";
                echo "<td>" . $row['staff_position'] . "</td>";
                // echo "<td>" . $row['staff_reg_date'] . "</td>";

                ?>
                <form action="delete_staff.php" method="post">
                <td>
                    <?php
                    if($_SESSION['staff_id']==$row['staff_id'] || $row['role_id']==2 ){
                        ?>
                            <input type="submit" name="submit" value="Delete" class="btn btn-danger btn-sm" disabled>
                            <input type="hidden" name="staff_id" value="<?php echo $row['staff_id']; ?>">
                            <?php
                          }else{
                            ?>
                       <input type="hidden" name="staff_id" value="<?php echo $row['staff_id']; ?>">
                       <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">  
                       <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?');">
                            <?php

                          }
                        ?>
                  

                </td>
            </form>
                <td>

                                        <?php
                    if($_SESSION['staff_id']==$row['staff_id']){
                        ?>
                        <a class="btn btn-success btn-sm" href="edit_staff.php?staff_id=<?php echo $row['staff_id'];?>">Edit</a>
                                <?php
                          }else{
                            ?>
                            <a class="btn btn-success btn-sm" disabled href="edit_staff.php?staff_id=<?php echo $row['staff_id'];?>">Edit</a>
                                      <?php
                                 }
                        ?>
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
                    </div>
            </body>
</html>