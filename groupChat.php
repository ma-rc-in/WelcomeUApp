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
  $senderStudentID = $studentID;
  $sendTime = date("Y-m-d H:i:s"); //"Y-m-d H:i:s" was"y-m-d h:i A"

  //sends this to the database when user clicks send
  $groupChatInsert = $db->query("INSERT INTO tbl_groupchat (
    chatRoomName, chatMessage, senderStudentID, timeSent)
    VALUES('{$RoomName}','{$Message}','{$senderStudentID}','{$sendTime}')");
  }
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>WelcomeU Group Chat</title>

    <!--Scripts-->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" type="text/css" href="CSS/css/util.css">
    <link rel="stylesheet" type="text/css" href="CSS/css/main.css">

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
    <script>
    $(document).ready(function(){
      setInterval(function() {
        $("#messageBox").load("groupChatLoad.php");
      }, 1000);
    });
    </script>

    <script>
    function goBack() {
      window.history.back();
    }
  </script>
  </head>
  <body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrappedChat p-l-55 p-r-55 p-t-65 p-b-50">

        <h1><?php echo $courseName." - Group Chat";?> </h1>

        <button  onclick="goBack()"><img src="images/back.png" style="height: 28px; width: 28px; margin-bottom: 10px;"></button>

        <!-- Messages will be placed here -->
        <div id="messageBox" style="overflow:scroll; height:400px; overflow-x:hidden;">

        </div>


        <div class="login100-form validate-form">
          <span class="chatHeading p-b-33">
            <h3 class="messageChat">Your message:</h3>
            <form action=""groupChat.php" method="post">
              <div class="wrap-input100 validate-input" data-validate="" style="border: 2px solid #e6e6e6;">
                <input class="input100" type="text" name="formStudentID" placeholder="Put your message">
                <span class="focus-input100-1"></span>
                <span class="focus-input100-2"></span>
                <input class="login100-form-btn" type="submit" name="submit" value="Submit" style="margin-top: 10px; "/>
              </form>
            </div>
          </div>
        </div>
      </div>
    </body>
    </html>
