<?php
require_once("connection.php");//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.
?>
<?php
session_start();
if(isset($_SESSION['sessionStudentID'])) {
    if (checkAccessType() != "Lecturer") {
        header('Location:mainmenu.php');
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
</style>
</head>


<body>
<div class="patch-container" id="mmbackground">

    <div class="logoMain">
        <a href="mainmenu.php">
            <img class="test" id="mmNULogo" src="images/logo_white.png" alt="Logo" width= "350px" height= "100px" style="margin-top: 25px;" />
        </a>
    </div>

    <div class="patch-item patch-button" id="mmMapBackground">
        <a href="map.php">
            <img class="test" id="mmMapLogo" src="images/maps-and-flags.png" alt="Map" width= "120px" height= "120px" />
            <h5 class="textIcons" id="mapMenu">Map</h5>
        </a>
    </div>

    <div class="patch-item patch-button" id="mmGroupChatBackground">
        <a href="mainmenuLecturer.php">
            <img class="logo" id="mmlgroupChat" src="images/chatBlocked.png" alt="Group Chat" width= "120px" height= "120px" />
            <h5 class="textIcons" id="groupChatMenu">Group Chat</h5>
            <div class="groupChatPlaceHolder"></div>
        </a>
    </div>

    <div class="patch-item patch-button" id="mmHelpBackground">
        <a href="help.php">
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
        <a href="mainmenuLecturer.php">
            <img class="test" id="mmEnrolmentLogoBlocked" src="images/checklistBlocked.png" alt="Self Enrolment" width= "120px" height= "120px" />
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
    </div>
</body>
</html>

<script>
    languageChange(); //changes the lanugage (default is english)
    themeChange();
    highContrast();
</script>

