<?php
session_start();
include_once'dbconect.php';
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
                    <h4><?php echo $_SESSION['student_reg'];?></h4>
                     <div id="print">
                   <div class="row">
                    <div class="col-md-12">
                        <?php
                          include_once'dbconect.php';
                          $approve= "SELECT * FROM approve WHERE approve_print_status='approved' AND student_id ='$_SESSION[student_id]'";
                               $result2=mysqli_query($conn, $approve);
                               $count2=mysqli_num_rows($result2);
                               if($count2==1){
                                 ?>
                        <form action="print_logbook.php" method="POST">
                        <button id="printButton" class="btn btn-success btn-sm">Print Logbook</button>
                        </form>
                        <?php
                               }
                               else{
                         ?>
                        <button  class="btn btn-success btn-sm" onclick="return confirm('Your Logbook not approve, please wait for approve');">Print Logbook</button>
                        
                     <?php
                               }
                               ?>
                    </div>
                   </div> 

                  <div class="row"> 
                <div class="tbl">
                    <div id="print">
                        <!-- <script type="text/javascript" src="js/jspdf.umd.min.js"></script>
                        <script type="text/javascript">
                            document.getElementsById("printButton").addEventListener("click", function(){
                                // Create a new jsPDF instance
                                var doc = new jsPDF();
                                // Define the targeted section
                                var element = getElementsById("print");
                                // Get the content of the targeted section
                                var content = element.innerHTML;
                                // Add content to the PDF
                                doc.fromHTML(content, 15, 15);

                                // Save PDF
                                doc.save("logbook.pdf");
                            });
                        </script> -->
                    
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
    } else{
        echo "No records matching your query were found.";
    }
}
?>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </body>
</html>


