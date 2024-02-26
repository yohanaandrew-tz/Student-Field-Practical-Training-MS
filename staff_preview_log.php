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

                </style>
    <head>
            <body>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Preview <?php echo $_POST['student_fname'].' '. $_POST['student_lname']; ?> Logbook.</h4>
                    </div>
                </div> 
                  <form action="staff_preview_update.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                         <input type="text" name="id" class="hidden" value="<?php echo $_POST['student_id']; ?>">
                        <button name="approve" type="submit" class="btn btn-success btn-sm">Approve</button>
                           &nbsp;<a href="approve_log.php" class="btn btn-info btn-sm">Back</a>
                    </div>
                </div> 
                </form>
                
                <div class="tbl">
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                        include_once'dbconect.php';
                        // Query
$sql = "SELECT * FROM logbook WHERE student_id='$_POST[student_id]' ORDER BY log_date ASC";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-bordered table-hover responsive'>";
            echo "<tr>";
                echo "<th>SN</th>";
                echo "<th>Log task</th>";
                echo "<th>Skills acquired</th>";
                echo "<th>Date</th>";
                
            echo "</tr>";
            $count=mysqli_num_rows($result);
              $i=1;
             while ($i<=$count) {
        while($row = mysqli_fetch_array($result)){
            echo "<tr id='id01'>";
                echo "<td>" . $i. "</td>";
                echo "<td>" . $row['log_task'] . "</td>";
                echo "<td>" . $row['log_skills'] . "</td>";
                echo "<td>" . $row['log_date'] . "</td>";
            echo "</tr>";
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
