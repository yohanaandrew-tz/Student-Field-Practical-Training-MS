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
        <!-- <a class="w3-button w3-blue" href="tasks.php">View</a> -->
            <div class="w3-card-4">
                <div class="w3-container w3-blue">
                    <h3>Add task</h3>
                </div>
                    <form action="insert_task.php" method="post">
                    <label>Task:</label><input style="width:100%;" class="" type="text" name="task_name" placeholder="Enter task name" required><br><br>
                    <label>Duration(days):</label><input style="width:100%;" class="" type="number" name="task_duration" placeholder="number of days" required><br><br>
                    <label>Description:</labe><textarea style="width:100%;" name="task_description" cols="50" rows="4" placeholder="Task description here....."></textarea><br><br>
                    <label>Date:</label><input style="width:100%;" class="" type="date" name="task_posted_date" placeholder="" required>
                    <p><input type="submit" class="w3-button w3-blue" value="SUBMIT"></p>
                </form>
                </div>
        <div>
    </div>
    </body>
    </html>