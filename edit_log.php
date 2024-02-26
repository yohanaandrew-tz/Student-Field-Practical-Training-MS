<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkyLink Solutions</title>
    <?php include_once'links.php'; ?>
</head>
<body>
    <div class="row">
        <div class="col-md-12" style="padding: 4px;">
            <div class="col-md-9"><h4>Edit Logbook information.</h4></div>
            <div class="col-md-3"></div>
        </div>
    </div>
   
    <?php
    require('dbconect.php');
    $log_id=$_GET['log_id'];
    $query = "SELECT * from logbook where student_id='$_SESSION[student_id]' AND log_id='$log_id'"; 
    $result = mysqli_query($conn, $query) or die ( mysqli_error());
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
<form name="form" method="post" action="">
    <div class="row">
        <div class="col-md-12">
         
 <div class="row">
     <div class="col-md-12">
     <div class="form-group">
        <label>Log Task :</label><input class="form-control" type="text" name="log_task" placeholder="Enter logtask" required value="<?php echo $row['log_task'];?>">
      </div>
     </div>
 </div>

  <div class="row">
     <div class="col-md-12">
     <div class="form-group">
        <label>Skills Acquired :</label><textarea class="form-control" type="text"  name="log_skills" placeholder="Enter skills" rows="5"><?php echo $row['log_skills'];?></textarea>
      </div>
     </div>
 </div>

   <div class="row">
     <div class="col-md-12">
     <div class="form-group">
        <label>Date :</label><input class="form-control" type="date" name="log_date" placeholder="Enter correct date" required value="<?php echo $row['log_date'];?>">
      </div>
     </div>

 </div>


<br>
  <div class="row">
    <div class="form-group">
    <div class="col-md-2"><button  class="btn btn-success btn-sm" name="update" >Update</button>&nbsp;<a href="student_viewlog.php"  class="btn btn-info btn-sm" name="update" >Back</a></div>
 </div>
   
 </div> 
     </div>
    </div>
     </form>
<?php } ?>
</body>
</body>
</html>

    <?php
          include_once'dbconect.php';

       if (isset($_POST['update'])) {
            $log_task= mysqli_escape_string($conn ,$_POST['log_task']);
            $log_date= mysqli_escape_string($conn ,$_POST['log_date']);
            $log_skills= mysqli_escape_string($conn ,$_POST['log_skills']);

            $sql="UPDATE logbook SET log_task='$log_task', log_skills='$log_skills',log_date=' $log_date' WHERE log_id='$_GET[log_id]'";
            $result=mysqli_query($conn,$sql);
            if ($result==true) {
                ?>
                <script type="text/javascript">
                    alert('Log updated successfully');
                    window.location='student_viewlog.php';
                </script>
                <?php
            }else{
                    ?>
                     <script type="text/javascript">
                    alert('Log update failed Please try again!');
                      window.location='student_viewlog.php';
                </script>
                <?php  
            }

       }
      ?>