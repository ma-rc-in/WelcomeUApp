<?php
require_once('connection.php');//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.

session_start();
$ID = "";

function convertModuleID($ID)
{ //this converts the module ID into a name
    $db = getConnection();
    $modulequery = "select moduleName from tbl_module where moduleID='$ID'";
    $module = $db->query($modulequery);
    $row = $module->fetch(PDO::FETCH_ASSOC);
    $moduleName = $row['moduleName'];
    return $moduleName;
}

if (checkAccessType() == "Lecturer") {
        header('Location:announcementsStudent.php');
    }

if (isset($_POST['viewModule'])) {
    $ID = $_POST['viewModule'];
    echo '<script>loadPage();<script>';
    $db->query("SELECT * FROM tbl_annoucements WHERE moudleID='$ID'"); //sets the user to banned status
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

    </style>

</head>
<body>
<div class="patch-container">
    <div class="limiter" id="limiter">
        <div class="logoDiv">
            <div class="goBackButton"><a href="mainmenu.php"><img src="images/back.png" class="goBackIcon"></a></div>
            <div class="logoChatWrapper">
                <a href="mainmenu.php">
                    <img class="logoChat" src="images/logo_white.png" alt="Logo"/>
                </a>
            </div>
        </div>
        <form class="formModule" method="post">
            <h1 class="formHeading">Please select the module</h1>
            <select class="formPassInput" id="selectModule" name="selectModule">
                <?php
                $studentInfo = getStudentDetails(); //gets all student details
                $ID = $studentInfo['studentID'];

                //gets the course ID of the student
                $studentidquery = "select courseID from tbl_student where studentID='$ID'";
                $student = $db->query($studentidquery);
                $row = $student->fetch(PDO::FETCH_ASSOC);
                $CourseID = $row['courseID'];

                echo $CourseID;

                $coursequery = "select * from tbl_course where courseID='$CourseID'";
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
                    echo '<option value="' . $module8ID . '">' . $module8ID . " - " . $module8 . '</option>';
                }
                ?>
            </select>
        </form>
        <table class="reports">
            <tr>
                <th id="udaTableLabelReportType">Module Name</th>
                <th id="udaTableLabelReportedStudent">View</th>
            </tr>
            <form action="announcmentsStudent.php" method="post" input align="center" >
                <?php
                $studentInfo = getStudentDetails(); //gets all student details
                $ID = $studentInfo['studentID'];

                //gets the course ID of the student
                $studentidquery = "select courseID from tbl_student where studentID='$ID'";
                $student = $db->query($studentidquery);
                $row = $student->fetch(PDO::FETCH_ASSOC);
                $CourseID = $row['courseID'];

                //module
                $coursequery = "select * from tbl_course where courseID='$CourseID'";
                $course = $db->query($coursequery);

                while ($row = $course->fetchObject()) {
                    $ID1 = $row->module1;
                    $ID2 = $row->module2;
                    $ID3 = $row->module3;
                    $ID4 = $row->module4;
                    $ID5 = $row->module5;
                    $ID6 = $row->module6;
                    $ID7 = $row->module7;
                    $ID8 = $row->module8;

                    echo '<tr>';
                    echo '<td>' . $ID1 . '</td>';
                    echo '<td><button type="submit" name="viewModule" id="aaView" value="' . $ID1 . '">View</button></td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td>' . $ID2 . '</td>';
                    echo '<td><button type="submit" name="viewModule" id="aaView" value="' . $ID2 . '">View</button></td>';
                    echo '</tr>';

                }
                ?>
            </form>
        </table>
    </div>

    <div id="firstModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close firstClose" id="">&times;</span>
            </div>

            <div class="modal-body">
                <h4 class="formHeading" id="ssTextModalNotifications"><?php $ID ?></h4>
                <label class="switch" onchange="setVolume()">
                    <input type="checkbox" id="notificationSwitch" class="soundButton">
                    <span class="slider"></span>
                </label>
            </div>
        </div>
    </div>

    <script>
        var modal1 = document.getElementById("firstModal");
        var btn1 = document.getElementById("aaView");
        var span1 = document.getElementsByClassName("close firstClose")[0];
         function loadPage() {
            modal1.style.display = "block";
            getVolume();
        }
        span1.onclick = function () {
            modal1.style.display = "none";
        }
        window.onclick = function (event) {
            if (event.target == modal1) {
                modal1.style.display = "none";
            }
        }
    </script>


</div>
</body>
</html>