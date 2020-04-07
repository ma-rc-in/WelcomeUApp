<?php
require_once("connection.php");//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.
?>
<?php
session_start();
if(isset($_SESSION['sessionStudentID'])) {}
else
{header('Location:loginform.php');}  //return user to login
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
    <title>WelcomeU Login</title>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Source+Code+Pro' rel='stylesheet' type='text/css'>
<style>
    .soundButton
    {
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
        cursor:pointer;
    }
    .soundButton:after
    {
        position:absolute;
        top:5%;
        display:block;
        line-height: 35px;
        width: 42%;
        height: 90%;
        box-sizing:border-box;
        text-align:center;
        transition: all 0.3s ease-in 0s;
        color: white;
        background: rgba(56, 56, 56, 0.8);
        border-radius:5px;
    }
    .soundButton:after
    {
        left:2%;
        content: "OFF";
    }
    .soundButton:checked:after
    {
        left:56%;
        content: "ON";
    }


    .soundButton:checked {
        background: rgba(0, 255, 106, 0.8);
    }

    .soundButton:not(:checked) {
        background: rgba(255, 0, 0, 0.8);
    }


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
      <img class="imgPass" src="images/security.png" alt="profileUser" width= "90px" height= "90px"/>
    </div>
    <h3 class="textIcons">Security settings</h3>
    <a href="userDashboard.php" id="" class="button" data-abbr=" security settings">Change</a>
    </div>

    <div class="patch-item patch-button" style="width: 100%; float: left;">
    <div class="iconPass">
      <img class="imgPass" src="images/notificationSettings.png" alt="notificationSettings" width= "90px" height= "90px"/>
    </div>
    <h3 class="textIcons">Notifications settings</h3>
    <a href="#" id="firstBtn" class="button" data-abbr=" notifications settings">Change</a>
    </div>

    <div id="firstModal" class="modal">
    <div class="modal-content">
    <div class="modal-header">
    <span class="close firstClose" id="">&times;</span>
    <h4>Notification Settings</h4>
    </div>

    <div class="modal-body">
        <h4 class="formHeading">Enable notification alert sound?</h4>
        <label class="switch"  onchange="setVolume()">
            <input type="checkbox" id="notificationSwitch" class="soundButton">
         <span class="slider"></span>
        </label>
    </div>
    </div>
    </div>
  </div>


  <script>
  var modal1 = document.getElementById("firstModal");
  var btn1 = document.getElementById("firstBtn");
  var span1 = document.getElementsByClassName("close firstClose")[0];
  btn1.onclick = function() {
    modal1.style.display = "block";
    getVolume();}
    span1.onclick = function() {
      modal1.style.display = "none";}
      window.onclick = function(event) {
        if (event.target == modal1) {
          modal1.style.display = "none"; }}
          </script>

</body>
</html>
