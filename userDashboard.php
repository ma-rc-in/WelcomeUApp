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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/css/popUpCSS.css">
    <title>WelcomeU Login</title>
    <script src="jquery-3.4.1.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Source+Code+Pro' rel='stylesheet' type='text/css'>
    <style>

    html, body {

      background-color: black;
      font-family: 'Open Sans';
      -webkit-font-smoothing: subpixel-antialiased;
    }

    @-ms-viewport{
      height: device-height;
    }
    a {
      text-decoration: none;
    }

    .patch-button {
      color: white;
      cursor: pointer;
      font-size: 1em;
      font-size: 1.5em;
      letter-spacing: 0;
      height: 10px;
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
    width: 100%;

  }

  .textIcons {
    color: white;
    font-weight: bold;
    cursor: default;
    font-size: 1em;
    font-size: 1.5em;
    letter-spacing: 0;
    height: 70px;
    width: 30px;
    background-color: black;
    border-radius: 4px;
    float: left;
    width: 45%;
    margin-top: 25px;

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

  a.button{
    display:inline-block;
    padding:0.35em 1.2em;
    border:0.1em solid #FFFFFF;
    margin:0 0.3em 0.3em 0;
    border-radius:0.12em;
    box-sizing: border-box;
    text-decoration:none;
    font-family:'Roboto',sans-serif;
    font-weight:300;
    color:#FFFFFF;
    text-align:center;
    transition: all 0.2s;
    float: center;
    margin-top: 28px;
    min-width: 35%;
    margin-left: 10px;
  }
  a.button:hover{
    color:#000000;
    background-color:#FFFFFF;
  }
  @media all and (max-width:30em){
    a.button{
      float: center;
      text-align: center;
    }
  }

  .imgPass {
    float: left;
    margin-left: 100px;
    cursor: default;
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

  @media only screen and (max-width: 1010px) {
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

    .textIcons {
      color: white;
      font-weight: bold;
      float: left;
      width: 45%;
      display: none;
    }

    .imgPass {
      float: left;
      margin-left: 50px;
      cursor: default;
      height: 80px;
      width: 80px;
      margin-top: 10px;
    }

    .button[data-abbr]::after {
      content: attr(data-abbr);
    }


    /* .imgPass {
    height: auto;
    width: auto;
    max-width: 80px;
    max-height: 80px;
    } */


    /*patch-item {
    float: left;
    height: 200px;
    margin: 0 0 5% 0;
    width: 30%;
    }*/


    @media only screen and (min-width: 1010px) {
      .patch-container {
        max-width: 100%;
      }

      .patch-item {
        margin: 0.6667%;
        margin: calc(4% / 6);
        float: left;
        width: 33.33%;        }

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

        .textIcons {
          color: white;
          float: right;
          font-weight: bold;
          float: left;
          width: 33.33%;

        }

        .iconPass {
          float: left;
          width: 33.33%;
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
        <div class="patch-container">
        <div class="logoMain">
        <a href="mainmenu.php">
        <img class="test" src="Images/logo_white.png" alt="Logo" width= "350px" height= "100px" style="margin-top: 25px;" />
        </a>
        </div>
        <div class="patch-item patch-button" style="width: 100%; float: left;">
        <div class="iconPass">
        <img class="imgPass" src="Images/pass.png" alt="PasswordKey" width= "90px" height= "90px"/>
        </div>
        <h3 class="textIcons">Change password</h3>
        <a href="#" id="myBtn" class="button" data-abbr=" password">Change</a>
        <div id="myModal" class="modal">
        <div class="modal-content">
        <div class="modal-header">
        <span class="close">&times;</span>
        <h4>Change password</h4>
        </div>
        <div class="modal-body">
        aa
        </div>
        </div>
        </div>
        <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
          modal.style.display = "block";}
          span.onclick = function() {
            modal.style.display = "none";}
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none"; }}
                </script>
                </div>
                </div>
                </body>
                </html>
