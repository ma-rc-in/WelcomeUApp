<?php
require_once('connection.php');//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.

session_start();

function convertModuleID($ID){ //this converts the module ID into a name
    $db = getConnection();
    $modulequery = "select moduleName from tbl_module where moduleID='$ID'";
    $module = $db->query($modulequery);
    $row = $module->fetch(PDO::FETCH_ASSOC);
    $moduleName = $row['moduleName'];
    return $moduleName;
}

if (checkAccessType() != "Lecturer") {
    header('Location:announcmentsStudent.php');
}
if(isset($_POST['submit'])) {
    echo"1234";
    $moduleID = $_POST['selectModule'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $query = "INSERT INTO tbl_announcements (selectModule, announcementSubject, announcmentMessage) VALUES (:selectModule, :announcementSubject, :announcmentMessage)";
    $queryInsert = $db->prepare($query);
    $queryInsert->bindParam('selectModule', $moduleID, PDO::PARAM_STR);
    $queryInsert->bindParam('announcementSubject', $subject, PDO::PARAM_STR);
    $queryInsert->bindParam('announcmentMessage', $message, PDO::PARAM_STR);
    $queryInsert->execute(array(":selectModule" => $moduleID, ":announcementSubject" =>$subject, ":announcmentMessage" =>$message));
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
            resize: vertical
        }


        input[type=submit] {
            background-color: #c4c3c3;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }


        input[type=submit]:hover {
            background-color: #555555;
        }


        .container {
            border-radius: 20px;
            background-color: #ffffff;
            padding: 20px;
            margin-top: 170px;
            margin-bottom: 20px;


        }
    </style>
</head>
<body>
<div class="container">
    <form action="announcementsLecturer.php">

        <label for="fname">Module Code</label>

        <select id="selectModule" name="selectModule">
            <?php
            $studentInfo = getStudentDetails(); //gets all student details
            $ID = $studentInfo['studentID'];

            //gets the course ID of the student
            $studentidquery = "select courseID from tbl_student where studentID='$ID'";
            $student = $db->query($studentidquery);
            $row = $student->fetch(PDO::FETCH_ASSOC);
            $CourseID = $row['courseID'];

            $coursequery = "select * from tbl_course where courseID='$CourseID'";
            $course = $db->query($coursequery);
            while ($row = $course->fetchObject())
            {
                $module1ID = $row->module1; $module1 = convertModuleID($module1ID);
                echo '<option value="'.$module1ID.'">'.$module1ID." - ".$module1.'</option>';
                $module2ID = $row->module2; $module2 = convertModuleID($module2ID);
                echo '<option value="'.$module2ID.'">'.$module2ID." - ".$module2.'</option>';
                $module3ID = $row->module3; $module3 = convertModuleID($module3ID);
                echo '<option value="'.$module3ID.'">'.$module3ID." - ".$module3.'</option>';
                $module4ID = $row->module4; $module4 = convertModuleID($module4ID);
                echo '<option value="'.$module4ID.'">'.$module4ID." - ".$module4.'</option>';
                $module5ID = $row->module5; $module5 = convertModuleID($module5ID);
                echo '<option value="'.$module5ID.'">'.$module5ID." - ".$module5.'</option>';
                $module6ID = $row->module6; $module6 = convertModuleID($module6ID);
                echo '<option value="'.$module6ID.'">'.$module6ID." - ".$module6.'</option>';
                $module7ID = $row->module7; $module7 = convertModuleID($module7ID);
                echo '<option value="'.$module7ID.'">'.$module7ID." - ".$module7.'</option>';
                $module8ID = $row->module8; $module8 = convertModuleID($module8ID);
                echo '<option value="'.$module8ID.'">'.$module8ID." - ".$module8.'</option>';
            }
            ?>
        </select>

        <label for="subject"> Subject </label>
        <input type="text" id="subject" name="subject" placeholder="Type a subject..">

        <label for="message">Message</label>
        <textarea id="message" name="message" placeholder="Type your message.." style="height:200px"></textarea>

        <input type="submit" value="Submit" name="submit">

    </form>
</div>

<script>

</script>
</body>
</html>
