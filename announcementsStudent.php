<?php
require_once('connection.php');//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.

session_start();

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
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Source+Code+Pro' rel='stylesheet'
          type='text/css'>
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
        .dropdown {
  position: relative;
  display: inline-block;
}

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        padding: 12px 16px;
        z-index: 1;
        }

        .dropdown:hover .dropdown-content {
        display: block;
        }
    </style>



</head>
<body>
<div class="patch-container">
    <div class="limiter" id="limiter">
        <div class="logoDiv">
            <div class="goBackButton"><a href="mainmenu.php"><img src="images/back.png" class="goBackIcon"></a></div>
            <div class="logoChatWrapper">
                <a href="mainmenu.php">
                    <img class="logoChat" src="images/logo_white.png" alt="Logo"/>
                </a>
            </div>
        </div>

<div class="dropdown">
  <span>Mouse over me</span>
  <div class="dropdown-content">
    <p>Hello World!</p>
  </div>
</div>
        <div class="container-box">
            <div class="wrappedChat p-l-55 p-r-55 p-b-50" style="padding-top: 10px;">

                <h1 style="margin-bottom: 5px; display: block; margin-left: auto; margin-right: auto; text-align: center; "> </h1>

                <!-- Messages will be placed here -->
                <div class="messageBox" id="messageBox"
                     style="overflow:scroll; height:400px; overflow-x:hidden; width: 100%;">
                </div>
            </div>
    </div>
</div>
</div>
<script>
    var modal = document.getElementById("PopupBoxPage");
    var btn = document.getElementById("reportButton");
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
</body>
</html>
