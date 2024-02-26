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
                <div class="w3-container w3-row-padding">
                    <h4>My log book activities</h4>
                    <a class="w3-button w3-blue" href="add_log.php">Add activity</a>
                    <span style="float:right;"><input type="search" minlength="5" placeholder="Search here"></span>
                    
                <div class="tbl">
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                        include_once'dbconect.php';
                        // Query
$sql = "SELECT * FROM logbook WHERE student_id='$_SESSION[student_id]' ORDER BY log_date desc";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-bordered table-hover responsive'>";
            echo "<tr>";
                echo "<th>SN</th>";
                echo "<th>Log task</th>";
                echo "<th>Skills acquired</th>";
                echo "<th>Date</th>";
                echo "<th colspan='2'>Action</th>";
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
                  ?>
                  <form action="" method="post">
                <td><a class="btn btn-success btn-sm" href="edit_log.php?log_id=<?php echo $row['log_id'];?>"><span></span>Edit</a></td>
                <td>   
                <input class="hidden" type="text" name="log_id" value="<?php echo $row['log_id'];?>"> 
                <input type="submit" name="delete" class="btn btn-sm btn-danger" value="Delete" onclick=" return confirm('Are you sure you want to delete logbook activity?');">
               </td>
                 </form>
            
                <?php

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
                </div>
            </body>
</html>


<?php
if (isset($_POST['delete'])) {
    // code...

$log_id=$_REQUEST['log_id'];
$query = "DELETE FROM logbook WHERE log_id=$log_id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
?>
<script type="text/javascript">
    // alert('Log deleted successfully.');
    window.location='student_viewlog.php';
</script>
<?php
}
?>