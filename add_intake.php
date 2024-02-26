<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<?php include_once'links.php'; ?>
</head>
<body>
		<div class="w3-container w3-row-padding">
			<h4>Add new field training intake</h4>
		</div>
		<div class="w3-container w3-row-padding">
			<div class="w3-container w3-card-4">
				<form action="insert_intake.php" method="post">
					<label>Year:</label>
					<select name="intake_year" style="width:100%;" required >
						<option disabled selected value="">Select a year</option>
						<option>2023</option>
						<option>2024</option>
						<option>2025</option>
						<option>2026</option>
						<option>2027</option>
						<option>2028</option>
						<option>2029</option>
						<option>2030</option>
						<option>2031</option>
						<option>2032</option>
						<option>2033</option>
						<option>2034</option>
						<option>2035</option>
						<option>2036</option>
						<option>2037</option>
						<option>2038</option>
						<option>2039</option>
						<option>2040</option>
					</select>
					<label>Month:</label>
					<select name="intake_month" style="width:100%;" required>
						<option disabled selected value="">Select a month</option>
						<option>January</option>
						<option>February</option>
						<option>March</option>
						<option>April</option>
						<option>May</option>
						<option>June</option>
						<option>July</option>
						<option>August</option>
						<option>September</option>
						<option>October</option>
						<option>November</option>
						<option>December</option>
					</select><br><br>
					<input class="w3-button w3-blue" type="submit" name="intake" value="Save">
				</form>
			</div>
		</div><br>
		<div class="w3-container w3-row-padding">
			<div class="w3-card-4">
				<?php
				include_once'dbconect.php';
$sql = "SELECT * FROM field_intake WHERE intake_status='open'";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-bordered table-hover responsive'>";
            echo "<tr>";
                echo "<th>SN</th>";
                echo "<th>Intake name</th>";
                echo "<th>Year</th>";
                echo "<th>Month</th>";
                echo "<th>Status</th>";
                echo "<th>Action</th>";
            echo "</tr>";
            $count=mysqli_num_rows($result);
            $i=1;
            while ($i<=$count) {
               
           
        while($row = mysqli_fetch_array($result)){
            echo "<tbody id='id01'>";
            echo "<tr>";
                 echo "<td>" . $i . "</td>";
                echo "<td>" . $row['intake_name'] . "</td>";
                echo "<td>" . $row['intake_year'] . "</td>";
                echo "<td>" . $row['intake_month'] . "</td>";
                echo "<td>" . $row['intake_status'] . "</td>";

                ?>
                  <form action="close_intake.php" method="post">
                <td>   
                <input class="hidden" type="text" name="intake_id" value="<?php echo $row['intake_id'];?>"> 
                <input type="submit" name="close" class="btn btn-sm btn-danger" value="Close" onclick="return confirm('Are you sure you want to close this intake?');">
               </td>
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
        echo "";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
?>
			</div>
		</div>
</body>
</html>