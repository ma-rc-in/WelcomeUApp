<!-- <?php
require_once("connection.php");//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.
?>
<?php
session_start();
if(isset($_SESSION['sessionStudentID'])) {
    if (checkAccessType() == "Student") {
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

    <script>
    function validatePassword() {
    var currentPassword,newPassword,confirmPassword,output = true;

    currentPassword = document.frmChange.currentPassword;
    newPassword = document.frmChange.newPassword;
    confirmPassword = document.frmChange.confirmPassword;

    if(!currentPassword.value) {
    	currentPassword.focus();
    	document.getElementById("currentPassword").innerHTML = "required";
    	output = false;
    }
    else if(!newPassword.value) {
    	newPassword.focus();
    	document.getElementById("newPassword").innerHTML = "required";
    	output = false;
    }
    else if(!confirmPassword.value) {
    	confirmPassword.focus();
    	document.getElementById("confirmPassword").innerHTML = "required";
    	output = false;
    }
    if(newPassword.value != confirmPassword.value) {
    	newPassword.value="";
    	confirmPassword.value="";
    	newPassword.focus();
    	document.getElementById("confirmPassword").innerHTML = "not same";
    	output = false;
    }
    return output;
    }
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
       <h3 class="textIcons">View reports</h3>
       <a href="#" id="firstBtn" class="button" data-abbr=" reports">View</a>
       </div>

       <div class="patch-item patch-button" style="width: 100%; float: left;">
       <div class="iconPass">
         <img class="imgPass" src="images/accessType.png" alt="accessType" width= "90px" height= "90px"/>
       </div>
       <h3 class="textIcons">Assign access type</h3>
       <a href="#" id="secondBtn" class="button" data-abbr=" access type">Assign</a>
       </div>

       <div class="patch-item patch-button" style="width: 100%; float: left;">
       <div class="iconPass">
         <img class="imgPass" src="images/ban.png" alt="PasswordKey" width= "90px" height= "90px"/>
       </div>
       <h3 class="textIcons">Ban user accounts</h3>
       <a href="#" id="thirdBtn" class="button" data-abbr=" accounts">Ban</a>
       </div>

       <div id="firstModal" class="modal">
       <div class="modal-content">
       <div class="modal-header">
       <span class="close firstClose" id="">&times;</span>
       <h4 class="formHeading">View reports</h4>
       </div>
       <div class="modal-body">

    <table id="reports" width="100%">
    <tr>
       <th>Report Type</th>
       <th>Reported Student</th>
       <th>Description</th>
       <th>Reporter ID</th>
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

                   echo '<tr id="reportRow">';
                       echo '<td>'.$type.'</td>';
                       echo '<td>'.$reported.'</td>';
                       echo '<td>'.$comment.'</td>';
                       echo '<td>'.$reporter.'</td><br>';
                       echo '<td><button class="adminButtons" type="submit" name="dismissButton" id="dismissButton" value="'.$ID.'">Dismiss</button><br>';
                       echo '<button class="adminButtons" type="submit" name="suspendButton" id="suspendButton" value="'.$reported.'">Suspend</button></td>';
                   echo '</tr>';
               }
               ?>
       </form>
   </table>


       </div>
       </div>
       </div>

       <div id="secondModal" class="modal">
       <div class="modal-content">
       <div class="modal-header">
       <span class="close secondClose" id="">&times;</span>
       <h4>Assign access type</h4>
       </div>
       <div class="modal-body">

         <form class="formPass" method="post">
            <div class="formPassWrapper">
                <h4 class="formHeading">Access Type</h4>
                <select class="formPassInput" name="accessID">
                <option value="" hidden>Please select a user</option>';
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
                    <option value="" hidden>Please select access type for the user</option>;
                    <option value="Student">Student</option>';
                    <option value="Lecturer">Lecturer</option>';
                </select>
                <br>
            <input class="adminButtons" name="submitAccessChange" type="submit" value="Update"/>
            </div>
        </form>

       </div>
       </div>
       </div>


       <div id="thirdModal" class="modal">
       <div class="modal-content">
       <div class="modal-header">
       <span class="close thirdClose" id="">&times;</span>
       <h4>Ban a user</h4>
       </div>
       <div class="modal-body">

         <form class="formPass" method="post">
           <div class="formPassWrapper">
               <h4 class="formHeading">Please select the users ID you wish to Ban:</h4>
               <select class="formPassInput" name="banID">
               <option value="" hidden>Please select a user.</option>';
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
           <input class="adminButtons"name="submitBan" type="submit" value="Submit"/>
           </div>
       </form>


       </div>
       </div>
       </div>


       </div>
       <script>
       var modal1 = document.getElementById("firstModal");
       var btn1 = document.getElementById("firstBtn");
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
               var btn2 = document.getElementById("secondBtn");
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
              var btn3 = document.getElementById("thirdBtn");
              var span3 = document.getElementsByClassName("close thirdClose")[0];
              btn3.onclick = function() {
                modal3.style.display = "block";}
                span3.onclick = function() {
                  modal3.style.display = "none";}
                  window.onclick = function(event) {
                    if (event.target == modal3) {
                      modal3.style.display = "none"; }}
             </script>
               </div>
               </div>
               </body>
               </html>
