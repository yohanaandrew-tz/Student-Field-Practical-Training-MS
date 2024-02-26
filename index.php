<?php
   session_start();
   if ($_SESSION["role_id"]==NULL) {
        header('location:login.php');
   }
?>
<html>
    <title>FPT Management System</title>
    <frameset rows="10%,90%%" border="2px">
         <frame src="header.php" scrolling="no"/>
         <frameset cols="14%,86%">
         <frame src="leftbar.php" scrolling="auto"/>
         <frame src="staff_dashboard.php" name="content" />
         </frameset>
         <!-- <frame src="footer.php" scrolling="no" > -->
    </frameset>
</html>