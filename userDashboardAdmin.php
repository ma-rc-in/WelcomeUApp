<!-- <?php
require_once("connection.php");//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.
?>
<?php
session_start();
if(isset($_SESSION['sessionStudentID'])) {
    if (checkAccessType() != "Lecturer") {
        header('Location:userDashboard.php');
    }
    $student = $_SESSION['sessionStudentID'];
    $students = getStudentDetails();
    $password = $students['password'];
    $pin = $students['PIN'];
    $message = "";
}
  else
  {header('Location:loginform.php');}  //return user to login

$newPassword = $_POST['NewPass'];
$oldPassword = $_POST['OldPass'];
$CheckPassword = $_POST['CheckPass'];

  if (isset($_POST['submitPass'])) { //submitPass (count($_POST) > 0)
      if (password_verify($oldPassword, $password)) {
          if ($newPassword == $CheckPassword) {
              $hashed_password = password_hash($newPassword, PASSWORD_BCRYPT); //PASSWORD_BCRYPT
              $db->query("UPDATE tbl_student SET password='$hashed_password' WHERE studentID='$student'"); //='$hashed_password'
              $message = "Password Changed";
              //display if the password is correct
          } else
              $message = "Current Password is not correct";
      }
      else
      {
          //do something if the password isn't correct
      }
  }

    $checkPassword = $_POST['CheckPass'];
    if (isset($_POST['submitDelete'])) {
        if (password_verify($checkPassword, $password)) {
            $db->query("DELETE from tbl_student where studentID='$student'");
            $db->query("DELETE from tbl_groupChat where senderStudentID='$student'");
            //$db->query("DELETE from tbl_selfEnrolment where senderStudentID='$student'"); //will need to update senderStudentID
            logout();
        } else {
            //do something if the password is incorrect.
        }
    }

  $newPin = $_POST['NewPin'];
  $checkPin = $_POST['CheckPin'];
    if(isset($_POST['submitPin'])) {
        if (strlen($newPin) > 4 || is_numeric($newPin) == false) { //if more than 4 characters
            //display when there is more than numbers or the user is not entering a number
        } else {
            // if (pin_change($oldPassword, $password)) {
            if ($newPin == $checkPin) {
                $hashed_password = password_hash($newPin, PASSWORD_BCRYPT); //PASSWORD_BCRYPT
                $db->query("UPDATE tbl_student SET PIN='$hashed_password' WHERE studentID='$student'"); //='$hashed_password'
                $message = "Pin is now set.";
            } else {
                //do something if the password isn't correct
            }
        }
      }

  if(isset($_POST['suspendButton'])){
    $ID = $_POST['suspendButton'];
    $db->query("UPDATE tbl_student SET isBanned='1' WHERE studentID='$ID'"); //sets the user to banned status
    $db->query("DELETE from tbl_report where reportedStudentID='$ID'");//removes the reports from the table, could be used as evidence against the user in a later version
    $db->query("DELETE from tbl_groupChat where senderStudentID='$ID'");
    header('location:userDashboardAdmin.php');
}

if(isset($_POST['dismissButton'])){
    $ID = $_POST['dismissButton'];
    $db->query("DELETE from tbl_report where reportID='$ID'");
    header('location:userDashboardAdmin.php');
}

if(isset($_POST['submitBan'])){
    $ID = $_POST['banID'];
    if($ID != null){
        $banquery = "select isBanned from tbl_student WHERE studentID='$ID'";
        $banned = $db->query($banquery);
        $row = $banned->fetch(PDO::FETCH_OBJ);
        $checkBanned = $row->isBanned;
        if ($checkBanned == 0) {
            $ban = 1;
            $db->query("UPDATE tbl_student SET isBanned='$ban' WHERE studentID='$ID'");
        }
        else{
            $ban = 0;
            $db->query("UPDATE tbl_student SET isBanned='$ban' WHERE studentID='$ID'");
        }
    }else{
        //if null
    }
}

if(isset($_POST['submitAccessChange'])){
    $ID = $_POST['accessID'];
    $type = $_POST['accessType'];
    if($ID != null){
        $db->query("UPDATE tbl_student SET accessType='$type' WHERE studentID='$ID'");
    }else{

    }
}
  ?> -->




  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/css/popUpCSS.css">
    <title>WelcomeU Login</title>
    <script src="jquery-3.4.1.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Source+Code+Pro' rel='stylesheet' type='text/css'>
<script src="settings.js"></script>

<style>
.adminButtons {
  width: 130px;
  padding: 10px 20px;
  display: inline-block;
  margin-top: 1px;
  margin-bottom: 1px;
}

.reports, td, th, tr {
  border: 1px solid rgba(99, 99, 99, 0.5);
  text-align: center;
}

</style>


<script>
    languageChange();
    themeChange();
    highContrast();
</script>
    <style>
      </style>
      </head>
      <body>
       <div class="patch-container">
       <div class="logoMain">
       <a href="mainmenu.php">
       <div class="logoIcon">
         <img class="imgLogo" src="images/logo_white.png" alt="Logo" width= "350px" height= "100px" style="margin-top: 25px;" />
       </div>
       </a>
       </div>

       <div class="patch-item patch-button" style="width: 100%; float: left;">
       <div class="iconPass">
         <img class="imgPass" src="images/reportsList.png" alt="reportsList" width= "90px" height= "90px"/>
       </div>
       <h3 class="textIcons" id="udaTextHeaderReports">View reports</h3>
       <a href="#" id="udaButtonTextFirstBtn" class="button" data-abbr=" reports">View</a>
       </div>

       <div class="patch-item patch-button" style="width: 100%; float: left;">
       <div class="iconPass">
         <img class="imgPass" src="images/accessType.png" alt="accessType" width= "90px" height= "90px"/>
       </div>
       <h3 class="textIcons" id="udaTextHeaderAccessType">Assign access type</h3>
       <a href="#" id="udaButtonTextSecondBtn" class="button" data-abbr=" access type">Assign</a>
       </div>

       <div class="patch-item patch-button" style="width: 100%; float: left;">
       <div class="iconPass">
         <img class="imgPass" src="images/ban.png" alt="PasswordKey" width= "90px" height= "90px"/>
       </div>
       <h3 class="textIcons"  id="udaTextHeaderBan">Ban user accounts</h3>
       <a href="#" id="udaButtonTextThirdBtn" class="button" data-abbr=" accounts">Ban</a>
       </div>

       <div id="firstModal" class="modal">
       <div class="modal-content" style="overflow-x: auto;">
       <div class="modal-header" style="min-width: 1000px;">
       <span class="close firstClose" id="">&times;</span>
       <h3 id="udaTextHeaderReports">View reports</h3>
       </div>
       <div class="modal-body" style="min-width: 1000px; overflow: auto;">


  <table class="reports">
    <tr>
       <th id="udaTableLabelReportType" style="min-width:150px">Report Type</th>
       <th id="udaTableLabelReportedStudent" style="min-width:150px">Reported Student</th>
       <th id="udaTableLabelDescription" style="min-width:150px">Description</th>
       <th id="udaTableLabelReporter" style="min-width:150px">Reporter ID</th>
       <th id="udaTableLabelReporter" style="min-width:150px">Choose action</th>
    </tr>
       <form action="userDashboardAdmin.php" method="post">
               <?php
               $reportquery = "select * from tbl_report";
               $report = $db->query($reportquery);
               while ($row = $report->fetchObject())
               {
                   $ID = $row->reportID;
                   $type = $row->reportType;
                   $reported = $row->reportedStudentID;
                   $comment = $row->reportComment;
                   $reporter = $row->reporterStudentID;

                   echo '<tr>';
                       echo '<td style="min-width:150px">'.$type.'</td>';
                       echo '<td style="min-width:150px">'.$reported.'</td>';
                       echo '<td style="min-width:150px; max-width: 200px; overflow-wrap: break-word;">'.$comment.'</td>';
                       echo '<td style="min-width:150px">'.$reporter.'</td><br>';
                       echo '<td style="display: block; min-width:150px"><button class="adminButtons" type="submit" name="dismissButton" id="udaButtonTextSubmitButtonForDismiss" value="'.$ID.'"> Dismiss </button></td>';
                       echo '<td style="display: block; min-width:150px"><button class="adminButtons" type="submit" name="suspendButton" id="udaButtonTextSubmitButtonForSuspend" value="'.$reported.'">Suspend</button></td>';
                   echo '</tr>'; } ?>
       </form>
     </table>

       </div>
       </div>
       </div>

       <div id="secondModal" class="modal">
       <div class="modal-content">
       <div class="modal-header">
       <span class="close secondClose" id="">&times;</span>
       <h3 id="udaTextHeaderAccessType">Assign access type</h3>
       </div>
       <div class="modal-body">

         <form class="formPass" method="post">
            <div class="formPassWrapper">
                <h4 id="udaTextHeaderAccessTypeModal">Access Type</h4>
                <select class="formPassInput" name="accessID">
                <option value="" hidden id="udaTextOptionSelectUser">Please select a user</option>';
                <?php
                $studentidquery = "select studentID, firstName, lastName, accessType from tbl_student";
                $student = $db->query($studentidquery);
                while ($row = $student->fetchObject())
                {
                    $id = $row->studentID;
                    $firstName = $row->firstName;
                    $lastName = $row->lastName;
                    $type = $row->accessType;

                    echo '<option value="'.$id.'">'.$id." (".$firstName." ".$lastName.": ".$type.")".'</option>'; //'.$id.'
                }
                ?>
                </select>
                <br>
                <select class="formPassInput" name="accessType">
                    <option value="" hidden id="udaTextOptionSelectAccessType">Please select access type for the user</option>;
                    <option value="Student" id="udaTextOptionSelectStudent">Student</option>';
                    <option value="Lecturer" id="udaTextOptionSelectLecturer">Lecturer</option>';
                </select>
                <br>
            <button class="adminButtons" name="submitAccessChange" type="submit" id="udaButtonTextSubmitButtonForUpdateAccess">Update</button>
            </div>
        </form>

       </div>
       </div>
       </div>


       <div id="thirdModal" class="modal">
       <div class="modal-content">
       <div class="modal-header">
       <span class="close thirdClose" id="">&times;</span>
       <h3 id="udaTextHeaderBan">Ban a user</h3>
       </div>
       <div class="modal-body">

         <form class="formPass" method="post">
           <div class="formPassWrapper">
               <h4 class="formHeading" id="udaTextHeaderBanUserModal">Please select the users ID you wish to Ban:</h4>
               <select class="formPassInput" name="banID">
               <option value="" hidden id="udaTextOptionBanUserChoose">Please select a user.</option>';
               <?php
               $studentidquery = "select studentID, firstName, lastName, isBanned from tbl_student";
               $student = $db->query($studentidquery);
               while ($row = $student->fetchObject())
               {
                   $id = $row->studentID;
                   $firstName = $row->firstName;
                   $lastName = $row->lastName;
                   $isBanned = $row->isBanned;

                   if ($isBanned == 0) {
                       $bannedDisplay = "No";
                   } else {
                       $bannedDisplay = "Yes";
                   }
                   echo '<option value="'.$id.'">'.$id." (".$firstName." ".$lastName.". Is suspended?: ".$bannedDisplay.")".'</option>'; //'.$id.'
               }
               ?>
           </select>
           <br>
           <button class="adminButtons"name="submitBan" type="submit" id="udaButtonTextSubmitButtonForBan">Submit</button>
           </div>
       </form>


       </div>
       </div>
       </div>


       </div>
       <script>
       var modal1 = document.getElementById("firstModal");
       var btn1 = document.getElementById("udaButtonTextFirstBtn");
       var span1 = document.getElementsByClassName("close firstClose")[0];
       btn1.onclick = function() {
         modal1.style.display = "block";}
         span1.onclick = function() {
           modal1.style.display = "none";}
           window.onclick = function(event) {
             if (event.target == modal1) {
               modal1.style.display = "none"; }}
               </script>

               <script>
               var modal2 = document.getElementById("secondModal");
               var btn2 = document.getElementById("udaButtonTextSecondBtn");
               var span2 = document.getElementsByClassName("close secondClose")[0];
               btn2.onclick = function() {
                 modal2.style.display = "block";}
                 span2.onclick = function() {
                   modal2.style.display = "none";}
                   window.onclick = function(event) {
                     if (event.target == modal2) {
                       modal2.style.display = "none"; }}
              </script>

              <script>
              var modal3 = document.getElementById("thirdModal");
              var btn3 = document.getElementById("udaButtonTextThirdBtn");
              var span3 = document.getElementsByClassName("close thirdClose")[0];
              btn3.onclick = function() {
                modal3.style.display = "block";}
                span3.onclick = function() {
                  modal3.style.display = "none";}
                  window.onclick = function(event) {
                    if (event.target == modal3) {
                      modal3.style.display = "none"; }}
             </script>
             <script>
                 languageChange();
                 themeChange();
                 highContrast();
             </script>
               </div>
               </div>
               </body>
               </html>
