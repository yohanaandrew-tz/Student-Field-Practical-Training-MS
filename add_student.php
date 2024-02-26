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
        <title>SkyLink Solutions</title>
        <link href="css/w3.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
       
    </head>
    <body>
        <!-- <a class="w3-button w3-blue" href="students.php">View</a> -->
            <div class="w3-card-4">
                <div class="w3-container w3-blue">
                    <h3>Add student</h3>
                </div>
                    <form action="insert_student.php" method="post">
                    <div class=" w3-container w3-row-padding">
                            <div class="w3-container w3-padding w3-half">
                    <label>Reg number:<label><input style="width:100%;" class="" type="text" name="student_reg" placeholder="Enter reg number" required><br><br>
                    <label>Firstname:<label><input style="width:100%;" class="" type="text" name="student_fname" placeholder="Enter firstname" required><br><br>
                    <label>Surname:<label><input style="width:100%;" class="" type="text" name="student_lname" placeholder="Enter surname" required><br><br>
                    <label>College:<label><input style="width:100%;" class="" type="text" name="student_college" placeholder="Student's college" required><br><br>
                    <label>Program:</label><select style="width:100%;" name="student_program">
                        <option>ICT</option>
                        <option>Computer science</option>
                        <option>Software Engineering</option>
                    </select>
                    <label>Study level:</label><select style="width:100%;" name="study_level">
                        <option>Certificate</option>
                        <option>Diploma</option>
                        <option>Bachelor</option>
                    </select><br><br>
                    <label>Phone number:</label><input style="width:100%;" class="" type="number" name="student_phone" placeholder="0753XXXX" required><br><br>
                    <label>Email:<label><input style="width:100%;" class="" type="email" name="student_email" placeholder="example@gmail.com" required><br><br>
                         <label>Compitence:</label><select style="width:100%;" name="student_compitence">
                        <option>Graphics</option>
                        <option>Web development</option>
                        <option>Networking</option>
                        <option>Maintainance</option>
                        <option>CCTV Installation</option>
                    </select><br><br>
                    </div>

                            <div class="w3-container w3-padding w3-half">
                   
                    <label>Attachment:</label><input style="width:100%;" class="" type="file" name="student_letter" placeholder="">
                    <label>Start-date:<label><input style="width:100%;" class="" type="date" name="student_start_date" placeholder="" required><br><br>
                    <label>End-date:<label><input style="width:100%;" class="" type="date" name="student_end_date" placeholder="" required><br><br>
                    <label>Registration date:<label><input style="width:100%;" class="" type="date" name="student_reg_date" placeholder="" required><br><br>
                    <p>Gender:<br><input style="" type="radio" name="student_gender" value="M">Male  <input type="radio" name="student_gender" value="F">Female</p>
                    <label>Duration(Weeks): <input style="width:100%;" class="" type="number" name="student_field_duration" placeholder="Enter training duration" required></label><br><br>
                    <label>Birth date: <input style="width:100%;" class="" type="date" name="student_dob" placeholder="Enter your birthday" required></label><br><br>
                    <label>Marital status:</label><select style="width:100%;" name="student_marital_status">
                        <option>Single</option>
                        <option>Married</option>
                    </select>
                            </div>
                        </div>
                    <input type="submit" name="register" class="w3-button w3-blue" value="SAVE">
                </form>
                </div>
        <div>
    </div>
    </body>
    </html>