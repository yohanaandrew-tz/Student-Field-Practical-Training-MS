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
    <!-- <link href="css/w3.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" /> -->
         <?php include_once'links.php'; ?>
        <style type="text/css">
            .tbl{
                overflow-x: auto;
                }
        </style>
    <head>
            <body>
                <div class="w3-container w3-row-padding">
                 <div>
                    <h3>Tasks</h3>
                   <p>Assigned tasks by staff members</p> <span><input  oninput="w3.filterHTML('#id01', 'tr', this.value)" type="search" minlength="5" placeholder="Search here"></span>
                    </div><br>
                    <div class="tbl">
                        <?php
                        include_once'dbconect.php';
                        // Query
$sql = "SELECT * FROM task ORDER BY task_id DESC";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-hover responsive'>";
            echo "<tr>";
                echo "<th>SN</th>";
                echo "<th>Task name</th>";
                echo "<th>Description</th>";
                echo "<th>Duration</th>";
                echo "<th>Assined on</th>";
            echo "</tr>";
            $count=mysqli_num_rows($result);
            $i=1;
            while ($i<=$count) {
               
           
        while($row = mysqli_fetch_array($result)){
            echo "<tbody id='id01'>";
            echo "<tr>";
                 echo "<td>" . $i . "</td>";
                echo "<td>" . $row['task_name'] . "</td>";
                echo "<td>" . $row['task_description'] . "</td>";
                echo "<td>" . $row['task_duration'] . "</td>";
                echo "<td>" . $row['task_posted_date'] . "</td>";
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
            </body>
            
</html>