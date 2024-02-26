<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>OFPT Management System</title>
        <link href="css/w3.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            .header{
                position:;
            }
        </style>
    </head>
    <div class="header">
        <div class="W3-container w3-khaki" style="padding: 2px;">
    <span>Login as: <?php 
          if ($_SESSION['role_id']==1) {
              echo $_SESSION['student_lname']; 
          }else{
            echo $_SESSION['staff_lname'];
          }
          ?>
    </span>
    <img  src="files/LOGO2.png" alt="Logo" width="230" height="" class="logo" style="margin-left:30%; ;">   
    <!-- <span style="margin:center; w3-large;"><b>SkyLink Solutions</b></span> -->
    <!-- <span style="margin-top:5-px;"><img  src="files/myAvatar.png" alt="Logo" width="40" height="40" class="avt"></span> -->
    </html>