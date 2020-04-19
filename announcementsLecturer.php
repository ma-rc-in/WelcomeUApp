<?php
require_once('connection.php');//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.

session_start();
$view = false;
$editID = "";
echo '.<Script> localStorage.setItem("viewCheck", "false"); //used to load the page</Script>.';
echo '.<Script> localStorage.setItem("viewEdit", "false"); //used to load the page</Script>.';

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
} else {
    $studentInfo = getStudentDetails(); //gets all student details
    $lecturerID = $studentInfo['studentID'];//student ID
}
if(isset($_POST['submit'])) {
    $moduleID = $_POST['selectModule'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $query = "INSERT INTO tbl_announcement (moduleID, lecturerID, announcementMessage, announcementSubject) VALUES (:selectModule, :lecturerID, :announcementMessage, :announcementSubject)";
    $queryInsert = $db->prepare($query);
    $queryInsert->bindParam('selectModule', $moduleID, PDO::PARAM_STR);
    $queryInsert->bindParam('lecturerID', $lecturerID, PDO::PARAM_STR);
    $queryInsert->bindParam('announcementMessage', $message, PDO::PARAM_STR);
    $queryInsert->bindParam('announcementSubject', $subject, PDO::PARAM_STR);
    $queryInsert->execute(array(":selectModule" => $moduleID, ":lecturerID" => $lecturerID, ":announcementMessage" =>$message, ":announcementSubject" =>$subject));
}

if(isset($_POST['aaEditAnnoucements'])) {
    $view = true;
    echo '.<Script> localStorage.setItem("viewCheck", "true"); //used to load the page</Script>.';
}

if(isset($_POST['aaEdit'])) {
    $editID = $_POST['aaEdit'];
    echo '.<Script> localStorage.setItem("viewEdit", "true"); //used to load the page</Script>.';
}

if(isset($_POST['aaUpdate'])) {
    $ID = $_POST['aaUpdate'];
    $subject = $_POST['subjectEdit'];
    $message = $_POST['messageEdit'];

    $update = "UPDATE tbl_announcement SET announcementMessage=:message, announcementSubject=:subject WHERE announcementID=:ID";
    $queryUpdate = $db->prepare($update);
    $queryUpdate->bindParam('ID', $ID, PDO::PARAM_STR);
    $queryUpdate->bindParam('subject', $subject, PDO::PARAM_STR);
    $queryUpdate->bindParam('message', $message, PDO::PARAM_STR);
    $queryUpdate->execute(array(":ID" => $ID, ":subject" => $subject, ":message" =>$message));

    $view = true;
    echo '.<Script> localStorage.setItem("viewCheck", "true"); //used to load the page</Script>.';
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
        .container {
            border-radius: 20px;
            background-color: #FFFFFF;
            padding: 20px;
            margin-top: 60px;
            margin-bottom: 20px;
        }

        input[type=submit]:hover {
            background-color: #8d8d8d;;
        }

        .guideButton {
            opacity: .7;
            -webkit-transition: all 0.8s;
            -moz-transition: all 0.8s;
            transition: all 0.8s;
            margin-top: -76px;
            float: right;
            margin-right: auto;
        }

        .guideButton:hover {
            opacity: 1;
            -webkit-transition: all 0.8s;
            -moz-transition: all 0.8s;
            transition: all 0.8s;
        }

        .guideIcon {
            height: 48px;
            width: 48px;
            margin-bottom: 40px;
            margin-right: 20px;
            cursor: pointer;
        }

        @media only screen and (max-width: 600px) {

            .guideButton {
                width: 100%;
                display: block;
                margin-top: 40px;
            }

            .guideIcon {
                height: 58px;
                width: 58px;
                margin-bottom: 40px;
                margin-right: 20px;
                cursor: pointer;
            }
        }

    </style>

</head>
<body>

<div class="patch-container">
    <div class="logoMain">
        <a href="mainmenu.php">
            <div class="logoIcon">
                <img class="imgLogo" src="images/logo_white.png" alt="Logo" width="350px" height="100px"
                     style="margin-top: 25px;"/>
                <h1 class="formHeading" color="#FFFFFF" align="center" >Please fill in the form below..
                </h1>
            </div>
        </a>
    </div>
</div>

<div class="guideButton" id="userGuideButton"><img src="images/guide.png" id="mmHelpGuide" class="guideIcon"></div>
</div>

<div style="width: 100%; color: white">
    <h5 id="mmSmartCardBalance" style="display: inline-block;">Smart Card Balance:</h5>
    <h5 id="mmBalance" style="display: inline-block;">£<?php echo $StudentInfo['smartCardBalance'];?></h5>
</div>


<div class="container">
    <form action="announcementsLecturer.php" method="POST">

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
        <input type="submit" value="Edit Annoucements" name="aaEditAnnoucements">
    </form>

    <!--List of edits-->
    <div id="firstModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close firstClose" id="">&times;</span>
            </div>

            <div class="modal-body">
                <h4 class="formHeading" id="ssTextModalNotifications">Select announcement to change.</h4>
                <form action="announcementsLecturer.php" method="POST">
                <div class="formPassWrapper">
                    <?php
                    if ($view == true){
                        $lecturerID = $studentInfo['studentID'];//student ID
                        $query = "SELECT * FROM tbl_announcement WHERE 	lecturerID=:lecturerID";
                        $annoucementGet = $db->prepare($query);
                        $annoucementGet->bindParam('lecturerID', $lecturerID, PDO::PARAM_STR);
                        $annoucementGet->execute(array(":lecturerID" => $lecturerID));
                        $count = count($annoucementGet->fetchAll());

                        if ($count > 0) {
                            $annoucementGet->execute(array(":lecturerID" => $lecturerID));
                            while ($row = $annoucementGet->fetchObject()) {
                                    $id = $row->announcementID;
                                    $module = $row->moduleID;
                                    $subject = $row->announcementSubject;
                                    $time = $row->announcementDateTime;

                                    echo '<div id=announcementEdit>';
                                    echo $module." - ".$subject. "\n";
                                    echo "Sent at: (".$time. " ) \n";
                                    echo "\n";
                                echo '<button class="adminButtons" type="submit" name="aaEdit" id="aaEdit" value="'.$id.'"> Edit </button>';
                                    echo '</div>';
                            }

                        }else {
                            echo "You have made no announcements";
                        }
                    }
                    ?>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--List of edits-->
    <div id="secondModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close secondClose" id="">&times;</span>
            </div>

            <div class="modal-body">
                <h4 class="formHeading" id="ssTextModalNotifications">Edit announcement.</h4>
                <form action="announcementsLecturer.php" method="POST">
                <div class="formPassWrapper">
                    <?php
                    if ($editID != ""){
                        $query = "SELECT * FROM tbl_announcement WHERE 	announcementID=:announcementID";
                        $annoucementIDGet = $db->prepare($query);
                        $annoucementIDGet->bindParam('announcementID', $editID, PDO::PARAM_STR);
                        $annoucementIDGet->execute(array(":announcementID" => $editID));

                        $row = $annoucementIDGet->fetch(PDO::FETCH_ASSOC);
                        $module = $row['moduleID'];
                        $subject = $row['announcementSubject'];
                        $message = $row['announcementMessage'];
                    }
                    ?>

                    <label for="Module"> Module </label>
                    <input type="text" id="Module" name="ModuleEdit" value="<?php echo $module; ?> " readonly>

                    <label for="subject"> Subject </label>
                    <input type="text" id="subject" name="subjectEdit" value="<?php echo $subject; ?>" placeholder="Type a subject..">

                    <label for="message">Message</label>
                    <textarea id="message" name="messageEdit" placeholder="Type your message.." style="height:200px"><?php echo $message; ?></textarea>


                    <button class="adminButtons" type="submit" name="aaUpdate" id="aaUpdate" value="<?php echo $editID ?>"> Update </button>
                </div>
                </form>
            </div>
        </div>
    </div>


</div>
<script>
    var modal1 = document.getElementById("firstModal");
    var span1 = document.getElementsByClassName("close firstClose")[0];
    function loadPage() {
        modal1.style.display = "block";
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

<script>
    var modal2 = document.getElementById("secondModal");
    var span2 = document.getElementsByClassName("close secondClose")[0];
    function loadPageEdit() {
        modal2.style.display = "block";
    }
    span2.onclick = function () {
        modal2.style.display = "none";
    }
    window.onclick = function (event) {
        if (event.target == modal1) {
            modal2.style.display = "none";
        }
    }
</script>

<script>
    var check = localStorage.getItem("viewCheck"); //new message count;
    if(check == "true"){
        loadPage();
    }

    var checkEdit = localStorage.getItem("viewEdit"); //new message count;
    if(checkEdit == "true"){
        loadPageEdit();
    }
</script>

</body>
</html>
