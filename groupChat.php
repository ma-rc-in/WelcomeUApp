<?php
require_once('connection.php');//gets the connections.php
require_once("functions.php");
require_once("groupChatFunctions.php");
$db = getConnection();//returns the connection for the database.


//needs to display the information, and show the users name, also needs to redirect if the user hasn't enrolled

//CHANGE LATER, BUT RETURNS USER IF STUDENT ID IS SET
session_start();
if (isset($_SESSION['sessionStudentID'])) { //requires functions
    if (checkAccessType() != "Student") {
        header('Location:mainmenuLecturer.php');
    }

    //this is used to get the students information required to use the chat
    $studentInfo = getStudentDetails(); //gets all student details
    $studentFirstName = $studentInfo['firstName'];//firstname
    $studentLastName = $studentInfo['lastName']; //lastname
    $studentID = $studentInfo['studentID'];//student ID
    $studentCourseID = $studentInfo['courseID'];//courseID
    $courseName = courseNameConversion($studentCourseID); //conversion for course ID

    echo '<Script> localStorage.setItem("pinCheck", "false"); //updates the pin check</Script>';

} else { //return user to login
    header('Location:mainmenu.php');
}

if(isset($_POST['gcSubmitPin'])){
    $studentPin = $studentInfo['PIN'];//courseID
    $checkPin = $_POST['gcPinInput'];
    if (password_verify($checkPin, $studentPin)) {
        echo '<Script> localStorage.setItem("pinCheck", "true"); //updates the pin check</Script>';
    }
}


if (isset($_POST['submit'])) //when the user submits their message
{
    $RoomName = $courseName;
    $Message = $_POST['formMessage'];//message is assigned to what the user writes
    if (strlen($Message) >= 500) { //if more than 255 characters
        // user has too many characters
        //TODO ERROR MESSAGE
    } else {
        $senderStudentID = $studentID;
        $query = "INSERT INTO tbl_groupChat(chatRoomName, chatMessage, senderStudentID) VALUES (:chatName, :chatMessage, :senderStudentID)";
        $groupChatInsert = $db->prepare($query);
        $groupChatInsert->bindParam('chatName', $RoomName, PDO::PARAM_STR);
        $groupChatInsert->bindParam('chatMessage', $Message, PDO::PARAM_STR);
        $groupChatInsert->bindParam('senderStudentID', $senderStudentID, PDO::PARAM_STR);
        $groupChatInsert->execute(array(":chatName" => $RoomName, ":chatMessage" =>$Message, ":senderStudentID" => $senderStudentID));
        echo '.<Script> localStorage.setItem("pinCheck", "true"); //updates the pin check</Script>.';
    }
}

if (isset($_POST['submitReport'])) //when the user submits their message
{
    $reporterStudentID = $studentID;

    $reportedStudentID = $_POST['reportUserID'];
    $reportType = $_POST['reportType'];
    $reportComment = $_POST['reportComment'];

    if (strlen($reportComment) >= 500) { //if more than 255 charaters
        // user has too many characters
        //TODO ERROR MESSAGE
    } else {
        $query = "INSERT INTO tbl_report (reportType, reportedStudentID, reportComment, reporterStudentID)
        VALUES (:reportType, :reportedStudentID, :reportComment, :reporterStudentID)";
        $groupChatInsert = $db->prepare($query);
        $groupChatInsert->bindParam('reportType', $reportType, PDO::PARAM_STR);
        $groupChatInsert->bindParam('reportedStudentID', $reportedStudentID, PDO::PARAM_STR);
        $groupChatInsert->bindParam('reportComment', $reportComment, PDO::PARAM_STR);
        $groupChatInsert->bindParam('reporterStudentID', $reporterStudentID, PDO::PARAM_STR);
        $groupChatInsert->execute(array(":reportType" => $reportType, ":reportedStudentID" =>$reportedStudentID, ":reportComment" => $reportComment, ":reporterStudentID" => $reporterStudentID));
        echo '.<Script> localStorage.setItem("pinCheck", "true"); //updates the pin check</Script>.';

        //TODO SUCCESS MESSAGE
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
    <script src="settings.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Source+Code+Pro' rel='stylesheet'
          type='text/css'>
    <style>

        .close {
            color: white;
            float: right;
            font-size: 38px;
            line-height: 15px;
            font-weight: bold;
            -webkit-text-stroke-width: 0.3px;
            -webkit-text-stroke-color: white;
        }

        .modal-header {
            padding: 30px 10px;
            background-color: #474747;
            color: white;
        }

        .formReportInput {
            height: 200px;
            width: 90%;
            font-weight:400;
            border-radius: 6px;
            line-height:2em;
            border:none;
            box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.1);
            font-size: 20px;
            font-family: sans-serif;
            background:#e3e3e3;
            padding: 15px;
            color: black;
        }

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

            .goBackButton{

              display: flex;
        }


        input::-webkit-input-placeholder { color: white;}
        input:-moz-placeholder { color: white;}
        input::-moz-placeholder { color: white;}
        input:-ms-input-placeholder { color: white;}

    </style>


    <!--AJAX Script-->
    <script>

        //loads all the data when the form loads
        $(document).ready(function () {
            $(".messageBox").load("groupChatLoadInitial.php");//can get the initial amount of messages

            var pinVer = localStorage.getItem("pinCheck"); //new message count;
            if(pinVer == "true"){
                pinClose();
            } else {
                pinCheck();
            }

        });

        //every 1000ms call the load function
        $(document).ready(function () {
            setInterval(function () {
                $(".messageBox").load("groupChatLoad.php"); //updates this every 3 seconds
                alertFunction();
            }, 3000);
        });
    </script>

    <script>
          $(document).ready(function() {
        var len = 0;
        var maxchar = 200;

        $('#reportComment').keyup(function(){
          len = this.value.length
          if(len > maxchar){
              return false;
          }
          else if (len > 0) {
              $( "#charLeftReport" ).html( "Remaining characters: " +( maxchar - len ) );
          }
          else {
              $( "#charLeftReport" ).html( "Remaining characters: " +( maxchar ) );
          }
        })
      });
    </script>

</head>
<body>
<div class="patch-container" id="gcContainer">
    <div class="limiter" id="limiter">
        <div class="logoDiv">
            <div class="goBackButton"><a href="mainmenu.php"><img src="images/back.png" id="gcBack" class="goBackIcon"></a></div>
            <div class="logoChatWrapper">
                <a href="mainmenu.php">
                    <img class="logoChat" id="gcLogo" src="images/logo_white.png" alt="Logo"/>
                </a>
            </div>
        </div>

        <div class="container-chat" id="gcChatContainer">
            <div class="wrappedChat p-l-55 p-r-55 p-b-50" id="gcBackground" style="padding-top: 10px;">


                <h1 style="margin-bottom: 5px; display: block; margin-left: auto; margin-right: auto; text-align: center; " id="gcCourseNameEcho"><?php echo $courseName?></h1>
                <h1 id="gcCourseNameTitle" style="margin-bottom: 5px; display: block; margin-left: auto; margin-right: auto; text-align: center; ">- Group Chat</h1>

                <!-- Messages will be placed here -->
                <div class="messageBox" id="messageBox"
                     style="overflow:scroll; height:400px; overflow-x:hidden; width: 100%;">
                </div>
            </div>

            <div class="login100-form validate-form">
          <span class="chatHeading p-b-33">
            <h3 class="messageChat" id="gcYourMessage">Your message:</h3>
            <form action="groupChat.php" method="post">
              <div class="wrap-input100 validate-input" data-validate="" style="border: 2px solid #e6e6e6;">
                <input class="input100 messageContent" type="text" name="formMessage" id="gcMessageContentBox"
                       placeholder="Type your message here.">
                <span class="focus-input100-1"></span>
                <span class="focus-input100-2"></span>
                <input class="buttonChat" type="submit" id="gcSendButton" name="submit" value="Send"
                       style="margin-top: 10px; float: right;"/>
              </form>
              <button type="button" class="buttonChat" id="gcReportButton" style="margin-top: 10px; float: left" ;>Report</button>
            </div>
        </div>
        <!--PopupBoxPage reportButton close-->
        <!--JavaScript for report function-->
        <!--Pop Up Box HTML-->

        <div id="PopupBoxPage" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" id="" style="padding-bottom: 10px;">&times;</span>
                    <h4 id="gcReportUser">Report a user</h4>
                </div>
                <div class="modal-body" style="margin-bottom: 120px;">
                    <form class="formPass" method="post">
                        <div class="formPassWrapper">
                            <br>
                            <h4 class="formHeading" id="gcUserID">Please select the users ID you wish to report:</h4>
                            <select class="formPassInput" id="reportUserID" name="reportUserID">
                                <?php
                                //php to select the ID
                                $studentInfo = getStudentDetails();
                                $studentCourseID = $studentInfo['courseID'];

                                $users = usersInChat($studentCourseID);
                                while ($row = $users->fetchObject()) {
                                    $id = $row->studentID;
                                    $firstName = $row->firstName;
                                    $lastName = $row->lastName;
                                    echo '<option value="' . $id . '">' . $id . " (" . $firstName . " " . $lastName . ")" . '</option>'; //'.$id.'
                                }
                                ?>
                            </select>
                        </div>
                        <div class="formPassWrapper">
                            <br>
                            <h4 class="formHeading" id="gcReasonTitle">Please select your reason for reporting:</h4>
                            <select class="formPassInput" id="reportType" name="reportType">
                                <!--class="formReportInput"-->
                                <option value="Spam">Spam</option>
                                <option value="Abuse">Abusive Language/Content</option>
                                <option value="Violence">Inciting Violence</option>
                                <option value="Other">Other (Please Comment Below)</option>
                            </select>
                        </div>
                        <div class="formPassWrapper">
                            <br>
                            <br>
                            <h4 class="formHeading" id="gcReason">Please explain why you are making this report:</h4>
                            <br>
                            <textarea id="reportComment" class="formReportInput" name="reportComment" placeholder="Please comment here:" rows="10" cols="140"
                            contentEditable=true data-text="Enter text here" maxlength="200"></textarea>
                            <br>
                            <br>
                            <span id='charLeftReport' style="font-size: 17px; "></span>

                        </div>
                        <br>
                        <input class="adminButtons" name="submitReport" id="gcReportSubmit" type="submit" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>



        <!--Pin Popup-->
        <div id="PinPopupBoxPage" class="modal">
            <div class="modal-content">
              <div class="goBackButton" style="margin-top: 30px;"><a href="mainmenu.php"><img src="images/back.png" id="gcBack" class="goBackIcon"></a></div>

                <div class="modal-header">
                    <h4 id="gcPinText">Pin Verification</h4>
                </div>
                <div class="modal-body" style="margin-bottom: 0px;">
                    <form class="formPin" method="post">
                        <div class="formPassWrapper">
                            <br>
                            <br>
                            <h4 class="formHeading" id="gcTextPinCheck">Please verify your PIN to continue:</h4>
                            <input type="password" class="formPassInput" id="gcPinInput" name="gcPinInput" placeholder="Enter your PIN" autocomplete="off"/>
                        </div>
                        <input class="adminButtons" name="gcSubmitPin" id="gcSubmitPin" type="submit" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
        <!--End of Modal-->
    </div>
</div>
</div>
<script>
    var modal = document.getElementById("PopupBoxPage");
    var btn = document.getElementById("gcReportButton");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function () {
        modal.style.display = "block";
    }
    span.onclick = function () {
        modal.style.display = "none";
    }
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<!--Pin Popup Script-->
<script>
    var modalPin = document.getElementById("PinPopupBoxPage");
    var gcSendButton = document.getElementById("gcSendButton");
    var gcReportButton = document.getElementById("gcReportButton");
    function pinCheck() {
        modalPin.style.display = "block";
        gcSendButton.disabled = true;
        gcReportButton.disabled = true;
    }
    function pinClose(){
        modalPin.style.display = "none";
        gcSendButton.disabled = false;
        gcReportButton.disabled = false;
    }
    window.onclick = function (event) {
        if (event.target == modalPin) {
            modalPin.style.display = "block";
        }
    }
</script>

</div>
</body>
</html>

<script>
    languageChange(); //changes the language (default is english)
    themeChange();
    highContrast();
</script>
