<?php
require_once('connection.php');//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.

session_start();
$ID = "";
$ModuleID="";
echo '<Script> localStorage.setItem("moduleCheck", "false");</Script>';

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
  $ModuleID = $_POST['viewModule'];
  echo '<Script> localStorage.setItem("moduleCheck", "true"); //used to load the page</Script>';
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
  <script src="settings.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Source+Code+Pro' rel='stylesheet'
  type='text/css'>
  <style>
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


  .adminButtons {
    display: inline-block;
    width: 500px;
    float: left;
    left: 25%;
    min-height: 100px;
  }

  .reports, td, th, tr {
    text-align: center;
    width: 70%;
  }

  .reports, td {
    margin-left: 15%;
  }

  @media screen and (max-width: 1000px) {

    .reports, td, th, tr {
      display: block;
      width: 99%;
      float: left;
      margin-left: 0%;
    }

    .adminButtons {
      width: 95%;
    }
  }

.annoucementContainer {
  border: 1px solid #383838;
  background-color: #4f4f4f;
  border-radius: 5px;
  padding: 15px 10px 10px 10px;
  margin: 2px 0;
  min-height: 50px;
  overflow: auto;
  color: white;
}

.annoucementContainerText {
  color: white;
  font-size: 17px;
  font-family: Arial, sans-serif;
  float: left;
  width: 30%;
  display: inline-block;
}

</style>

    </head>
    <body>
    <div class="patch-container" id="asContainer">
    <div class="limiter" id="limiter">
    <div class="logoDiv">
    <div class="goBackButton"><a href="mainmenu.php"><img id="asBack" src="images/back.png" class="goBackIcon"></a></div>
    <div class="logoChatWrapper">
    <a href="mainmenu.php">
    <img class="logoChat" id="asImage" src="images/logo_white.png" alt="Logo"/>
    </a>
    </div>
    </div>
    <h1 class="formHeading" id="aaStudentHeading">Please select the module</h1>


    <table class="reports">
    <form action="announcementsStudent.php" method="post" input align="center" >
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
      $ID1 = $row->module1; $module1 = convertModuleID($ID1);
      $ID2 = $row->module2; $module2 = convertModuleID($ID2);
      $ID3 = $row->module3; $module3 = convertModuleID($ID3);
      $ID4 = $row->module4; $module4 = convertModuleID($ID4);
      $ID5 = $row->module5; $module5 = convertModuleID($ID5);
      $ID6 = $row->module6; $module6 = convertModuleID($ID6);
      $ID7 = $row->module7; $module7 = convertModuleID($ID7);
      $ID8 = $row->module8; $module8 = convertModuleID($ID8);

      echo '<tr>';
      echo '<td><button type="submit" class="adminButtons" name="viewModule" id="aaView" value="' . $ID1 . '">'."View ". $ID1." ($module1)". '</button></td>';
      echo '<td><button type="submit" class="adminButtons" name="viewModule" id="aaView" value="' . $ID2 . '">'."View ". $ID2." ($module2)". '</button></td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td><button type="submit" class="adminButtons" name="viewModule" id="aaView" value="' . $ID3 . '">'."View ". $ID3." ($module3)". '</button></td>';
      echo '<td><button type="submit" class="adminButtons" name="viewModule" id="aaView" value="' . $ID4 . '">'."View ". $ID4." ($module4)". '</button></td>';
      echo '</tr>';

      echo '<tr>';
      echo '<td class="collapseCollumn"><button type="submit" class="adminButtons" name="viewModule" id="aaView" value="' . $ID5 . '">'."View ". $ID5." ($module5)". '</button></td>';
      echo '<td class="collapseCollumn"><button type="submit" class="adminButtons" name="viewModule" id="aaView" value="' . $ID6 . '">'."View ". $ID6." ($module6)". '</button></td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td class="collapseCollumn"><button type="submit" class="adminButtons" name="viewModule" id="aaView" value="' . $ID7 . '">'."View ". $ID7." ($module7)". '</button></td>';
      echo '<td class="collapseCollumn"><button type="submit" class="adminButtons" name="viewModule" id="aaView" value="' . $ID8 . '">'."View ". $ID8." ($module8)". '</button></td>';
      echo '</tr>';
    }
    ?>
    </form>
    </table>



    <div id="firstModal" class="modal">
    <div class="modal-content">
    <div class="modal-header">
    <span class="close firstClose" id="">&times;</span>
    <h3>View</h3>
    </div>

    <div class="modal-body">
    <h4 class="formHeading" id="ssTextModalNotifications"><?php echo $ModuleID ?></h4>
    <div class="formPassWrapper">
    <?php
    if ($ModuleID != ""){
      $module = "SELECT * FROM tbl_announcement WHERE moduleID=:moduleID"; //sets the user to banned status
      $annoucement = $db->prepare($module);
      $annoucement->bindParam('moduleID', $ModuleID, PDO::PARAM_STR);
      $annoucement->execute(array(":moduleID" => $ModuleID));
      $count = count($annoucement->fetchAll());

      if ($count > 0) {
        $annoucement->execute(array(":moduleID" => $ModuleID));
        while ($row = $annoucement->fetchObject()) {
          $message = $row->announcementMessage;
          $subject = $row->announcementSubject;
          $time = $row->announcementDateTime;

          echo '<div class=annoucementContainer>';
            echo "<p class=".'annoucementContainerText'.">Subject: ".$subject."</p></br>";
            echo "<p class=".'annoucementContainerText'.">Subject: ".$message."</p></br>";
            echo "<p class=".'annoucementContainerText'.">Subject: ".$time."</p></br>";
          echo '</div>';
        }
      } else {
        $modulename = convertModuleID($ModuleID);
        echo '<div class=annoucementContainer>';
        echo "No announcements have been made for $ModuleID ($modulename).";
        echo '</div>';
      }
    }
    ?>
    </div>
    </div>
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
    var check = localStorage.getItem("moduleCheck"); //new message count;
    if(check == "true"){
      loadPage();
    }
    </script>

    </div>
    </body>
    </html>

<script>
    languageChange();
    themeChange();
    highContrast();
</script>
