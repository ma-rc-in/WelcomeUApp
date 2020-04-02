<?php
require_once('connection.php');//gets the connections.php
require_once("functions.php");
require_once("groupChatFunctions.php");
$db = getConnection();//returns the connection for the database.


//needs to display the information, and show the users name, also needs to redirect if the user hasn't enrolled

//CHANGE LATER, BUT RETURNS USER IF STUDENT ID IS SET
session_start();
if(isset($_SESSION['sessionStudentID'])) { //requires functions

  //this is used to get the students information required to use the chat
  $studentInfo = getStudentDetails(); //gets all student details
  $studentFirstName = $studentInfo['firstName'];//firstname
  $studentLastName = $studentInfo['lastName']; //lastname
  $studentID = $studentInfo['studentID'];//student ID
  $studentCourseID = $studentInfo['courseID'];//courseID
  $courseName = courseNameConversion($studentCourseID); //conversion for course ID
}
else { //return user to login
  header('Location:mainmenu.php');
}

if(isset($_POST['submit'])) //when the user submits their message
{
  $RoomName = $courseName;

  $Message = $_POST['formMessage'];//message is assigned to what the user writes
    if (strlen($Message) >= 500) { //if more than 255 characters
        // user has too many characters
    } else {
        $senderStudentID = $studentID;
        //$sendTime = date("Y-m-d H:i:s"); //"Y-m-d H:i:s" was"y-m-d h:i A"  //timeSent ,'{$sendTime}')
        //sends this to the database when user clicks send
        $groupChatInsert = $db->query("INSERT INTO tbl_groupChat (
        chatRoomName, chatMessage, senderStudentID)
        VALUES('{$RoomName}','{$Message}','{$senderStudentID}')");
        header('location:groupChat.php');
    }
}

if(isset($_POST['submitReport'])) //when the user submits their message
{
    $reporterStudentID = $studentID;

    $reportedStudentID = $_POST['reportUserID'];
    $reportType = $_POST['reportType'];
    $reportComment = $_POST['reportComment'];

    if (strlen($reportComment) >= 500) { //if more than 255 charaters
        // user has too many characters
    } else {
        $groupChatInsert = $db->query("INSERT INTO tbl_report (reportType, reportedStudentID, reportComment, reporterStudentID)
        VALUES('{$reportType}','{$reportedStudentID}','{$reportComment}','$reporterStudentID')");
        echo '.<Script> alert("Your report has been submitted."); </Script>.';
    }
}
?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>WelcomeU Group Chat</title>
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!--Scripts-->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" type="text/css" href="CSS/css/util.css">
    <link rel="stylesheet" type="text/css" href="CSS/css/main.css">
    <link rel="stylesheet" type="text/css" href="CSS/css/popUpCSS.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Source+Code+Pro' rel='stylesheet' type='text/css'>
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



      <!--AJAX Script-->
    <script>

     //loads all the data when the form loads
    $(document).ready(function(){
         $(".messageBox").load("groupChatLoadInitial.php");//can get the initial amount of messages
    });

        //every 1000ms call the load function
    $(document).ready(function(){
      setInterval(function()
      {
        $(".messageBox").load("groupChatLoad.php");
        alertFunction();
      }, 3000);
    });
    </script>
  </script>


  </head>
  <body>
  <div class="limiter" id="limiter">
    <div class="logoDiv">
      <div class="goBackButton"> <a href="mainmenu.php"><img src="images/back.png" class="goBackIcon"></a></div>
      <div class="logoChatWrapper">
        <a href="mainmenu.php">
            <img class="logoChat" src="images/logo_white.png" alt="Logo" />
        </a>
      </div>
    </div>

    <div class="container-chat">
      <div class="wrappedChat p-l-55 p-r-55 p-b-50" style="padding-top: 10px;">

        <h1 style="margin-bottom: 5px; display: block; margin-left: auto; margin-right: auto; text-align: center; "><?php echo $courseName." - Group Chat";?> </h1>

        <!-- Messages will be placed here -->
        <div class="messageBox" id="messageBox" style="overflow:scroll; height:400px; overflow-x:hidden; width: 100%;">
        </div>
        </div>

        <div class="login100-form validate-form">
          <span class="chatHeading p-b-33">
            <h3 class="messageChat">Your message:</h3>
            <form action="groupChat.php" method="post">
              <div class="wrap-input100 validate-input" data-validate="" style="border: 2px solid #e6e6e6;">
                <input class="input100 messageContent" type="text" name="formMessage" placeholder="Type your message here.">
                <span class="focus-input100-1"></span>
                <span class="focus-input100-2"></span>
                <button type="button" class="buttonChat" id="reportButton" style="margin-top: 10px; float: left";>Report</button>
                <input class="buttonChat" type="submit" name="submit" value="Send" style="margin-top: 10px; float: right;"/>
              </form>
            </div>
          </div>
      <!--PopupBoxPage reportButton close-->
      <!--JavaScript for report function-->
      <!--Pop Up Box HTML-->
      <div id="PopupBoxPage" class="modal">
          <div class="modal-content">
              <div class="modal-header">
                  <span class="close">&times;</span>
                  <h4>Report User</h4>
              </div>
              <div class="modal-body"> <!--report form-->
                  <form class="formReport" method="post">
                      <div class="formReportWrapper">
                          <h5 class="formHeading">Please select the users ID you wish to report:</h5>
                          <select id="reportUserID" name="reportUserID">
                              <?php
                              //php to select the ID
                              $studentInfo = getStudentDetails();
                              $studentCourseID = $studentInfo['courseID'];

                              $users = usersInChat($studentCourseID);
                              while ($row = $users->fetchObject())
                              {
                                  $id = $row->studentID;
                                  $firstName = $row->firstName;
                                  $lastName = $row->lastName;
                                  echo '<option value="'.$id.'">'.$id." (".$firstName." ".$lastName.")".'</option>'; //'.$id.'
                              }
                              ?>
                          </select>
                      </div>
                      <div class="formReportWrapper">
                          <h5 class="formHeading">Please select your reason for reporting:</h5>
                          <select id="reportType" name="reportType"> <!--class="formReportInput"-->
                              <option value="Spam">Spam</option>
                              <option value="Abuse">Abusive Language/Content</option>
                              <option value="Violence">Inciting Violence</option>
                              <option value="Other">Other (Please Comment Below)</option>
                          </select>
                      </div>
                      <div class="formReportWrapper">
                          <h5 class="formHeading">Please explain why you are making this report:</h5>
                          <textarea id="reportComment" class="formReportInput"  name="reportComment" placeholder="Please comment here:" rows="10" cols="140"></textarea>
                      </div>
                      <input name="submitReport" type="submit" value="Submit"/>
                  </form>
              </div>
          </div>
      </div>

      <script>
          var modal = document.getElementById("PopupBoxPage");
          var btn = document.getElementById("reportButton");
          var span = document.getElementsByClassName("close")[0];

          btn.onclick = function()
          {
              modal.style.display = "block";
          }
          span.onclick = function()
          {
              modal.style.display = "none";
          }
          window.onclick = function(event)
          {
              if (event.target == modal)
              {
                  modal.style.display = "none";
              }
          }
      </script>

      </div>
    </body>
    </html>
