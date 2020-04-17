<?php
require_once("connection.php");//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.
?>
<?php
session_start();
$StudentInfo = getStudentDetails();
if(isset($_SESSION['sessionStudentID'])) {
    if (checkAccessType() == "Lecturer") {
        header('Location:mainmenuLecturer.php');
    }
}
else
{header('Location:loginform.php');}  //return user to login
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="mainmenu.js"></script>
    <script src="settings.js"></script>

    <title>WelcomeU</title>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Source+Code+Pro' rel='stylesheet' type='text/css'>
<style>

html, body {

  /*background-color: black;*/
  font-family: 'Open Sans', Arial, sans-serif;
  -webkit-font-smoothing: subpixel-antialiased;


}

@-ms-viewport{
  height: device-height;
}

    a {
        text-decoration: none;
    }


/********************************
Plugin Hero Example
********************************/

.patch-button {

  color: white;
  cursor: pointer;
  font-size: 1em;
  font-size: 1.5em;
  letter-spacing: 0;
  height: 70px;
  width: 30px;
}

/*
.patch-button:hover {
  border: solid 3px #FFF;
  line-height: 1px;
}
*/

.patch-item {
    padding-top: 100px;
  background-color: black;
  border-radius: 4px;
  float: left;
  height: 200px;
  margin: 0 0 5% 0;
  width: 70%;

}

.textIcons {

  color: white;
    }

.patch-container {
  background-color: #000000;
  border-radius: 5px;
  color: #000000;
  overflow: auto;
  position: relative;
  text-align: center;
  zoom: 1;

}


.patch-panel {
  background-color: #FFF;
  border-radius: 4px;
  color: #FFF;
  display: none;
  float: left;
  font-size: 1.5em;

  line-height: 250px;
  margin: 0 0 2% 0;
  width: 70%;
     height: 00px;
}

[data-patch-panel='1'],
[data-patch-panel='5'],
[data-patch-panel='8'] {
  background: #F5AB35;
}

[data-patch-panel='2'],
[data-patch-panel='6'],
[data-patch-panel='9'] {
  background: #00B16A;
}

[data-patch-panel='3'],
[data-patch-panel='7'],
[data-patch-panel='10'] {
  background: #E74C3C;
}

[data-patch-panel='4'],
[data-patch-panel='8'],
[data-patch-panel='12'] {
  background: #3498DB;
}
/********************************
Media Queries
********************************/

@media only screen and (max-width: 989px) {
  h2 {
    font-size: 3.3rem;
  }

  .patch-panel {
    margin: 1%;
    width: 100%;

  }
  .components {
    margin: 1.5%;
    width: 46%;
  }

   .logout-box {
  padding-top: 30px;
  float: left;
  height: 100px;
  width: 100%;

    }

.patch-item {
    padding-top: 30px;
  background-color: black;
  border-radius: 4px;
  float: left;
  height: 200px;
  margin: 0 0 1% 0;
  width: 50%;

}

    /*.patch-item {
    float: left;
  height: 200px;
  margin: 0 0 5% 0;
    width: 30%;
  }*/


}



@media only screen and (min-width: 990px) {
  .patch-container {
      max-width: 100%;

  }

  .patch-item {
    margin: 0.6667%;
    margin: calc(4% / 6);
    width: 32%;
  }

  .patch-panel {
    margin: 0.6667%;
    margin: calc(4% / 6);
    width: 98.6666%;
    width: calc(100% - (4% / 6) * 2);
  }

.logout-box {
  padding-top: 30px;
  float: left;
  height: 100px;
  width: 100%;

}

  .resize {
    margin: 50px auto -2%;
  }
  .wide {
    margin: 0.6667%;
    margin: calc(4% / 6);
    width: 48.6666%;
    width: calc(50% - (4% / 6) * 2);
  }
  .thin {
    width: 23.6666%;
    width: calc(25% - (4% / 6) * 2);
  }
}

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,10); /* Fallback color */
  background-color: rgba(0,0,0,.95); /* Black w/ opacity */
}

.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 80%;
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

.close {
  color: white;
  float: right;
  font-size: 38px;
  font-weight: bold;
  -webkit-text-stroke-width: 0.3px;
  -webkit-text-stroke-color: white;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #474747;
  color: white;
}

.modal-body {
  padding: 2px 16px;
  background-color: #383838;
  color: white;
  font-family: OpenSans-Regular, sans-serif;

}

.logoDiv {
  width: 100%;
  margin-top: 20px;
  display: inline-block;
}

.logoMain {
  width: 350px;
  height: 100px;
  margin-left: 38%;
  margin-left: auto;
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

<script>
    //load the form up
    $(document).ready(function(){
        $(".groupChatPlaceHolder").load("mainmenuCheck.php");//checks to see if there are new messages
        mainmenuAlert();
        languageChange(); //changes the lanugage (default is english)
        themeChange();
        highContrast();
    });

    //every 10 seconds check
    $(document).ready(function(){
        setInterval(function()
        {
            $(".groupChatPlaceHolder").load("mainmenuCheck.php");//checks to see if there are new messages
            mainmenuAlert();
        }, 5000);
    });
</script>

<body>
<div class="patch-container" id="mmbackground">

<div class="logoDiv">
    <div class="logoChatWrapper">
        <a href="mainmenu.php">
            <img class="logoMain" id="gcLogo" src="images/logo_white.png" alt="Logo"/>
        </a>
    </div>
    <div class="guideButton"><img src="images/guide.png" id="mmHelpGuide" class="guideIcon"></div>

</div>

   <div style="width: 100%; color: white">
        <h5 id="mmSmartCardBalance" style="display: inline-block;">Smart Card Balance:</h5>
        <h5 id="mmBalance" style="display: inline-block;"><?php echo $StudentInfo['smartCardBalance'];?></h5>
   </div>

    <div class="patch-item patch-button" id="mmMapBackground">
        <a href="map.php">
            <img class="test" id="mmMapLogo" src="images/maps-and-flags.png" alt="Map" width= "120px" height= "120px" />
            <h5 class="textIcons" id="mapMenu">Map</h5>
        </a>
    </div>

    <div class="patch-item patch-button" id="mmGroupChatBackground">
        <a href="groupChat.php">
            <img class="logo" id="groupChat" src="images/chat.png" alt="Group Chat" width= "120px" height= "120px" />
            <h5 class="textIcons" id="groupChatMenu">Group Chat</h5>
            <div class="groupChatPlaceHolder"></div>
        </a>
    </div>

    <div class="patch-item patch-button" id="mmHelpBackground">
        <a href="helpServices.php">
            <img class="test" id="mmHelpLogo" src="images/question.png" alt="Help" width= "120px" height= "120px" />
            <h5 class="textIcons" id="helpMenu">Help</h5>
        </a>
    </div>

     <div class="patch-item patch-button" id="mmAnnoucementsBackground">
        <a href="announcementsStudent.php">
            <img class="test" id="mmAnnoucementsLogo" src="images/speaker.png" alt="Annoucements" width= "120px" height= "120px" />
            <h5 class="textIcons" id="annoucementsMenu">Annoucements</h5>
        </a>
    </div>

    <div class="patch-item patch-button" id="mmEnrolmentBackground">
        <a href="selfEnrolmentForm.php">
            <img class="test" id="mmEnrolmentLogo" src="images/checklist.png" alt="Self Enrolment" width= "120px" height= "120px" />
            <h5 class="textIcons" id="enrolmentMenu">Self Enrolment</h5>
        </a>
    </div>

    <div class="patch-item patch-button" id="mmSettingsBackground">
        <a href="settings.php">
            <img class="test" id="mmSettingsLogo" src="images/settings.png" alt="Settings" width= "120px" height= "120px" />
            <h5 class="textIcons" id="settingsMenu">Settings</h5>
        </a>
    </div>

    <div class="logout-box">
        <a href="logout.php">
            <img class="test" id="mmLogoutLogo" src="images/logout.png" alt="Logout" width= "44px" height= "44px" />
        </a>

    </div>



            <div id="mainMenuModal" class="modal">
            <div class="modal-content">
            <div class="modal-header">
            <span class="close" id="">&times;</span>
            <h3 id="mmTextHeadermainMenuModal">User Guide</h3>

            </div>
            <div class="modal-body">
                <p id="mmHelpMap">Map - Users can search Northumbria University's Newcastle city campus for guidance and directions to their destination.</p>
                <p id="mmHelpGroupChat">Groupchat - Students can use the group chat service to connect with other students on their course, where they are able to message each other.</p>
                <p id="mmHelpHelp">Help - Users can receive help by submitting enquiries, viewing the most frequently asked questions and asking our chat bot for help.</p>
                <p id="mmHelpAnnouncements">Announcements - Users can receive announcements by lecturers on their course, allowing them to keep update to date with the most recent information. Lecturers can use this subsystem to keep students informed.</p>
                <p id="mmHelpEnrolment">Self Enrolment - Users can enrol for their course by completing a quick form on the self enrolnment system. Changes to student details can also be updated on this form.</p>
                <p id="mmHelpSettings">Settings - Users can change the applications language, theme and enable high contrast settings. Additionally, students will also be able to update their password, pin and delete their related data.</p>
            </div>
            </div>
            </div>
    </div>

    <script>
    var modal = document.getElementById("mainMenuModal");
    var btn = document.getElementById("mmHelpGuide");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
      modal.style.display = "block";}
      span.onclick = function() {
        modal.style.display = "none";}
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none"; }}
            </script>

</body>
</html>
<script>
    languageChange(); //changes the lanugage (default is english)
    themeChange();
    highContrast();
</script>
