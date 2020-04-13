<?php
require_once("connection.php");//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.
?>
<?php
session_start();
if (isset($_SESSION['sessionStudentID'])) {
} else {
    header('Location:loginform.php');
}  //return user to login
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/css/popUpCSS.css">
    <!-- <link rel="stylesheet" type="text/css" href="CSS/css/main.css"> -->
    <script src="groupChat.js"></script>
    <script src="settings.js"></script>
    <title>WelcomeU Login</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Source+Code+Pro' rel='stylesheet'
          type='text/css'>
    <style>
        .soundButton {
            position: relative;
            background: rgba(26, 26, 26, 0.5);
            width: 110px;
            height: 40px;
            -webkit-appearance: initial;
            border-radius: 5px;
            outline: none;
            font-size: 15px;
            font-family: sans-serif;
            font-weight: 700;
            cursor: pointer;
        }

        .soundButton:after {
            position: absolute;
            top: 5%;
            display: block;
            line-height: 35px;
            width: 42%;
            height: 90%;
            box-sizing: border-box;
            text-align: center;
            transition: all 0.3s ease-in 0s;
            color: white;
            background: rgba(56, 56, 56, 0.8);
            border-radius: 5px;
        }

        .soundButton:after {
            left: 2%;
            content: "OFF";
        }

        .soundButton:checked:after {
            left: 56%;
            content: "ON";
        }


        .soundButton:checked {
            background: rgba(0, 255, 106, 0.8);
        }

        .soundButton:not(:checked) {
            background: rgba(255, 0, 0, 0.8);
        }

        .labelTheme {
          display: inline-block;
          position: relative;
          padding-left: 35px;
          margin-bottom: 12px;
          cursor: pointer;
          font-size: 22px;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
        }

        .labelTheme input {
          position: absolute;
          opacity: 0;
          cursor: pointer;
        }

        .checkmark {
          position: absolute;
          top: 0;
          left: 0;
          height: 30px;
          width: 30px;
          background-color: #695454;
          border-radius: 50%;
        }

        .labelTheme:hover input ~ .checkmark {
          background-color: #332b2b;
          opacity: 90%;
          transition: all .5s ease;

        }

        .labelTheme input:checked ~ .checkmark {
          background-color: #5e4c4c;

        }

        .checkmark:after {
          content: "";
          position: absolute;
          display: none;
          transition: all .5s ease;

        }

        .labelTheme input:checked ~ .checkmark:after {
          display: block;
          transition: all .5s ease;

        }

        .labelTheme .checkmark:after {
          top: 9px;
          left: 9px;
          width: 12px;
          height: 12px;
          border-radius: 50%;
          background: white;
          transition: all .5s ease;

        }

        .textTheme {
          font-size: 20px;
          font-family: Arial, sans-serif;
          display: inline;
          color: white;
          margin-left: 10px;
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
            </div>
        </a>
    </div>

    <div class="patch-item patch-button" style="width: 100%; float: left;">
        <div class="iconPass">
            <img class="imgPass" src="images/security.png" alt="profileUser" width="90px" height="90px"/>
        </div>
        <h3 class="textIcons" id="ssTextSecurity">Security settings</h3>
        <a href="userDashboard.php" id="ssButtonSecurity" class="button" data-abbr=" security settings">Change</a>
    </div>

    <div class="patch-item patch-button" style="width: 100%; float: left;">
        <div class="iconPass">
            <img class="imgPass" src="images/notificationSettings.png" alt="notificationSettings" width="90px" height="90px"/>
        </div>
        <h3 class="textIcons" id="ssTextNotifications">Notifications settings</h3>
        <a href="#" id="ssFirstBtn" class="button" data-abbr=" notifications settings">Change</a>
    </div>

    <div class="patch-item patch-button" style="width: 100%; float: left;">
        <div class="iconPass">
            <img class="imgPass" src="images/.png" alt="languageSetting" width="90px" height="90px"/>
        </div>
        <h3 class="textIcons" id="ssTextLanguage">Change language</h3>
        <a href="#" id="ssSecondBtn" class="button" data-abbr=" language">Change</a>
    </div>

    <div class="patch-item patch-button" style="width: 100%; float: left;">
        <div class="iconPass">
            <img class="imgPass" src="images/changeTheme.png" alt="changeTheme" width="90px" height="90px"/>
        </div>
        <h3 class="textIcons" id="ssTextTheme">Change theme</h3>
        <a href="#" id="ssThirdBtn" class="button" data-abbr=" theme">Change</a>
    </div>

    <div class="patch-item patch-button" style="width: 100%; float: left;">
        <div class="iconPass">
            <img class="imgPass" src="images/changeContrast.png" alt="changeContrast" width="90px" height="90px"/>
        </div>
        <h3 class="textIcons" id="ssTextContrast">Change contrast</h3>
        <a href="#" id="ssFourthBtn" class="button" data-abbr=" contrast">Change</a>
    </div>

    <!--Notification Settings-->
    <div id="firstModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close firstClose" id="">&times;</span>
                <h4 id="ssTextNotifications">Notification Settings</h4>
            </div>

            <div class="modal-body">
                <h4 class="formHeading" id="ssTextModalNotifications">Enable notification alert sound?</h4>
                <label class="switch" onchange="setVolume()">
                    <input type="checkbox" id="notificationSwitch" class="soundButton">
                    <span class="slider"></span>
                </label>
            </div>
        </div>
    </div>

    <!--Language-->
    <div id="secondModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close secondClose" id="">&times;</span>
                <h3 id="ssTextLanguage">Change Language</h3>
            </div>
            <div class="modal-body">

                <select class="formPassInput" id="languageValue" onchange="setLanguage()">
                    <option value="Default">Change language..</option>
                    <option value="English">English</option>
                    <option value="Polish">Polski (Polish)</option>
                    <option value="Chinese">中文 (Mandarin)</option>
                </select>

            </div>
        </div>
    </div>

    <!--Theme-->
    <div id="thirdModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close thirdClose" id="">&times;</span>
                <h3 id="ssTextTheme">Change theme</h3>
            </div>
            <div class="modal-body">
                <br>
                <label class="labelTheme"><p class="textTheme" id="ssThemeDark">Dark theme</p>
                    <input type="radio" checked="checked" id="dark" name="theme" onchange="setTheme()">
                    <span class="checkmark"></span>
                </label>
                <br>
                <label class="labelTheme"><p class="textTheme" id="ssThemeLight">Light theme</p>
                    <input type="radio" id="light" name="theme" onchange="setTheme()">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
    </div>

    <div id="fourthModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close fourthClose" id="">&times;</span>
                <h4 id="ssTextContrast">High Contrast</h4>
            </div>

            <div class="modal-body">
                <h4 class="formHeading" id="ssTextContrastModal">Enable high contrast setting?</h4>
                <label class="switch" onchange="setHighContrast()">
                    <input type="checkbox" id="contrastSwitch" class="soundButton">
                    <span class="slider"></span>
                </label>
            </div>
        </div>
    </div>

</div>


<script>
    var modal1 = document.getElementById("firstModal");
    var btn1 = document.getElementById("ssFirstBtn");
    var span1 = document.getElementsByClassName("close firstClose")[0];
    btn1.onclick = function () {
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

<script>
    var modal2 = document.getElementById("secondModal");
    var btn2 = document.getElementById("ssSecondBtn");
    var span2 = document.getElementsByClassName("close secondClose")[0];
    btn2.onclick = function () {
        modal2.style.display = "block";
    }
    span2.onclick = function () {
        modal2.style.display = "none";
    }
    window.onclick = function (event) {
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
    }
</script>

<script>
    var modal3 = document.getElementById("thirdModal");
    var btn3 = document.getElementById("ssThirdBtn");
    var span3 = document.getElementsByClassName("close thirdClose")[0];
    btn3.onclick = function () {
        modal3.style.display = "block";
        getTheme();
    }
    span3.onclick = function () {
        modal3.style.display = "none";
    }
    window.onclick = function (event) {
        if (event.target == modal3) {
            modal3.style.display = "none";
        }
    }
</script>

<script>
    var modal4 = document.getElementById("fourthModal");
    var btn4 = document.getElementById("ssFourthBtn");
    var span4 = document.getElementsByClassName("close fourthClose")[0];
    btn4.onclick = function () {
        modal4.style.display = "block";
        getHighContrast();
    }
    span4.onclick = function () {
        modal4.style.display = "none";
    }
    window.onclick = function (event) {
        if (event.target == modal4) {
            modal4.style.display = "none";
        }
    }
</script>
</body>
</html>

<script>
    languageChange(); //changes the lanugage (default is english)
    themeChange();
    highContrast();
</script>
