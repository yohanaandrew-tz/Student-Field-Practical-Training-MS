   <?php
   $servername="localhost";
   $password="";
   $username="root";
   $dbname="mysky";

   // Create connection
 $conn = mysqli_connect($servername, $username, $password,$dbname);

   // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  } else

  ?>