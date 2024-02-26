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
        <!-- <a class="w3-button w3-blue" href="staff.php">View</a> -->
            <div class="w3-card-4">
                <div class="w3-container w3-blue">
                    <h3>Add staff</h3>
                </div>
                    <form action="insert_staff.php" method="post" enctype="multipart/form-data">
                        <div class=" w3-container w3-row-padding">
                            <div class="w3-container w3-half">
                    <label>ID:</label><input style="width:100%;" class="" type="text" name="staff_reg_number" placeholder="Enter id" required><br><br>
                    <label>Firstname:</label><input style="width:100%;" class="" type="text" name="staff_fname" placeholder="Enter firstname" required><br><br>
                    <label>Surname:</label><input style="width:100%;" class="" type="text" name="staff_lname" placeholder="Enter surname" required>
                    <p>Gender: <br><input type="radio" name="staff_gender" value="M">Male  <input type="radio" name="gender" value="F">Female</p>
                    <label>Email:</label><input style="width:100%;" class="" type="email" name="staff_email" placeholder="example@gmail.com" required>
                            </div>

                            <div class="w3-container w3-half">
                    <label>Phone number:</label><input style="width:100%;" class="" type="number" name="staff_phone" placeholder="0753XXXX" required><br><br>
                    <label>Postion:</label><select style="width:100%;" name="staff_position">
                        <option>CEO</option>
                        <option>Project manager</option>
                        <option>Software developer</option>
                        <option>Financial officer</option>
                        <option>Technical officer</option>
                    </select><br><br>
                    <label>Photo:</label><input style="width:100%;" class="" type="file" name="staff_photo" placeholder=""><br><br>
                    <label>Signature:</label><input style="width:100%;" class="" type="file" name="file" placeholder="Upload signature" required>
                    <label>Reg date:</label><input style="width:100%;" class="" type="date" name="staff_reg_date" placeholder="" required>
                            </div>
                        </div>
                    <p><input type="submit" name="register" class="w3-button w3-blue" value="SAVE"></p>
                </form>
                </div>
        <div>
    </div>
    </body>
    </html>