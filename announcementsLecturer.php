<?php
require_once('connection.php');//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.

session_start();

if (checkAccessType() != "Lecturer") {
        header('Location:userDashboard.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>WelcomeU Announcements</title>
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!--Scripts-->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" type="text/css" href="CSS/css/util.css">
    <link rel="stylesheet" type="text/css" href="CSS/css/main.css">
    <link rel="stylesheet" type="text/css" href="CSS/css/popUpCSS.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Source+Code+Pro' rel='stylesheet'
          type='text/css'>
    <style>
        @media only screen and (max-width: 600px) {
            .messageBox {
                margin: 0 auto;
                padding: 0 20px;
                max-width: 300px;
                min-height: 100%;
            }

            .messageRecord {
                border: 2px solid #dedede;
                background-color: #f1f1f1;
                border-radius: 5px;
                padding: 10px;
                margin: 10px 0;
                max-width: 300px;
                min-height: 100%;
            }

            .messageRecord::after {
                content: "";
                clear: both;
                display: table;
            }
        }
        
                /* Style inputs with type="text", select elements and textareas */
        input[type=text], select, textarea {
          width: 100%; /* Full width */
          padding: 12px; /* Some padding */  
          border: 1px solid #ccc; /* Gray border */
          border-radius: 4px; /* Rounded borders */
          box-sizing: border-box; /* Make sure that padding and width stays in place */
          margin-top: 6px; /* Add a top margin */
          margin-bottom: 16px; /* Bottom margin */
          resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
        }

        /* Style the submit button with a specific background color etc */
        input[type=submit] {
          background-color: #4CAF50;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }

        /* When moving the mouse over the submit button, add a darker green color */
        input[type=submit]:hover {
          background-color: #45a049;
        }

        /* Add a background color and some padding around the form */
        .container {
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
        }
    </style>
</head>
<body>
<div class="container">
  <form action="action_page.php">

    <label for="fname">Module Code</label>
    <select id="courseID ='$CourseID'";
                $course = $db->query($coursequery);
                while ($row = $course->fetchObject()) {
                    $module1ID = $row->module1;
                    $module1 = convertModuleID($module1ID);
                    echo '<option value="' . $module1ID . '">' . $module1ID . " - " . $module1 . '</option>';
                    $module2ID = $row->module2;
                    $module2 = convertModuleID($module2ID);
                    echo '<option value="' . $module2ID . '">' . $module2ID . " - " . $module2 . '</option>';
                    $module3ID = $row->module3;
                    $module3 = convertModuleID($module3ID);
                    echo '<option value="' . $module3ID . '">' . $module3ID . " - " . $module3 . '</option>';
                    $module4ID = $row->module4;
                    $module4 = convertModuleID($module4ID);
                    echo '<option value="' . $module4ID . '">' . $module4ID . " - " . $module4 . '</option>';
                    $module5ID = $row->module5;
                    $module5 = convertModuleID($module5ID);
                    echo '<option value="' . $module5ID . '">' . $module5ID . " - " . $module5 . '</option>';
                    $module6ID = $row->module6;
                    $module6 = convertModuleID($module6ID);
                    echo '<option value="' . $module6ID . '">' . $module6ID . " - " . $module6 . '</option>';
                    $module7ID = $row->module7;
                    $module7 = convertModuleID($module7ID);
                    echo '<option value="' . $module7ID . '">' . $module7ID . " - " . $module7 . '</option>';
                    $module8ID = $row->module8;
                    $module8 = convertModuleID($module8ID);
                    echo '<option value="' . $module7ID . '">' . $module7ID . " - " . $module7 . '</option>';
                }
    </select>

    <label for="lname"> Subject </label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="subject">Message</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">

  </form>
</div>

<script>

</script>
</body>
</html>
