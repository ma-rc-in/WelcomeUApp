<!-- <?php
require_once("connection.php");//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.
?>
<?php
session_start();
if(isset($_SESSION['sessionStudentID'])) {
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

  $newPin = $_POST['NewPin'];
  $checkPin = $_POST['CheckPin'];

    if(isset($_POST['submitPin'])) {
      // if (pin_change($oldPassword, $password)) {
          if ($newPin == $checkPin) {
              $hashed_password = password_hash($newPin, PASSWORD_BCRYPT); //PASSWORD_BCRYPT
              $db->query("UPDATE tbl_student SET PIN='$hashed_password' WHERE studentID='$student'"); //='$hashed_password'
              $message = "Pin is now set.";
      }
      else
      {
          //do something if the password isn't correct
      }
  }


  ?> -->




  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8"/>
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
    height: 100%;
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
    width: 38%;
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

  .formPass {
    width: 100%;
  }

  .formPassWrapper {

  }

  .formHeading {


  }

  .formPassInput {
    margin: 15px 0;
    font-size: 16px;
    padding: 10px;
    width: 70%;
    border: 1px solid #a3a3a3;
    border-top: none;
    border-left: none;
    border-right: none;
    background: rgba(20, 20, 20, 0.2);
    color: white;
    outline: none;
    text-align: center;
  }

  .submitPass {
    border: 1px solid #a3a3a3;
    background: rgba(20, 20, 20, 0.6);
    font-size: 18px;
    color: white;
    margin-top: 20px;
    padding: 10px 50px;
    cursor: pointer;
    transition: .4s;
    margin-bottom: 25px;
  }
  .submitPass:hover {
    background: rgba(20, 20, 20, 0.8);
    padding: 10px 80px;
  }


  @media only screen and (max-width: 900px) {
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
      width: 35%;
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


      @media all and (max-width:700px){
        a.button{
          float: center;
          text-align: center;

        }
        .imgPass {
          float: left;
          margin-left: 39%;
        }

        .iconPass {
          float: left;
          width: 100%;
        }

        .imgLogo {
          float: center;
          cursor: default;
          height: 90px;
          width: 330px;
          margin-top: 10px;
        }
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
         <img class="imgPass" src="images/pass.png" alt="PasswordKey" width= "90px" height= "90px"/>
       </div>
       <h3 class="textIcons">Change password</h3>
       <a href="#" id="firstBtn" class="button" data-abbr=" password">Change</a>
       </div>

       <div class="patch-item patch-button" style="width: 100%; float: left;">
       <div class="iconPass">
         <img class="imgPass" src="images/remove.png" alt="PasswordKey" width= "90px" height= "90px"/>
       </div>
       <h3 class="textIcons">Delete account</h3>
       <a href="#" id="secondBtn" class="button" data-abbr=" account">Delete</a>
       </div>

       <div class="patch-item patch-button" style="width: 100%; float: left;">
       <div class="iconPass">
         <img class="imgPass" src="images/lock.png" alt="PasswordKey" width= "90px" height= "90px"/>
       </div>
       <h3 class="textIcons">Set PIN</h3>
       <a href="#" id="thirdBtn" class="button" data-abbr=" PIN">Set</a>
       </div>

       <div id="firstModal" class="modal">
       <div class="modal-content">
       <div class="modal-header">
       <span class="close firstClose" id="">&times;</span>
       <h4>Change Password</h4>
       </div>
       <div class="modal-body">

       <form class="formPass" method="post">
         <div class="formPassWrapper">
         <h5 class="formHeading"></h5>
           <input type="password" class="formPassInput" id="oldPassInput" name="OldPass" placeholder="Enter your old password" autocomplete="off"/>
         </div>
           <div class="formPassWrapper">
           <h5 class="formHeading"></h5h5>
             <input type="password" class="formPassInput" id="newPassInput" name="NewPass" placeholder="Enter your new password" autocomplete="off"/>
           </div>
             <div class="formPassWrapper">
             <h5 class="formHeading"></h5>
               <input type="password" class="formPassInput" id="repeatPassInput" name="CheckPass" placeholder="Repeat your new password" autocomplete="off"/>
             </div>
                 <input name="submitPass" class="submitPass" type="submit" value="Submit"/>
       </form>


       </div>
       </div>
       </div>

       <div id="secondModal" class="modal">
       <div class="modal-content">
       <div class="modal-header">
       <span class="close secondClose" id="">&times;</span>
       <h4>Delete Account</h4>
       </div>
       <div class="modal-body">

       <form class="formPass" method="post">
             <div class="formPassWrapper">
             <h5 class="formHeading"></h5>
               <input type="password" class="formPassInput" id="repeatPassInput" name="CheckPass" placeholder="Enter your password to delete your account" autocomplete="off"/>
             </div>
                 <input name="submit" class="submitPass" type="submit" value="Submit"/>
       </form>


       </div>
       </div>
       </div>


       <div id="thirdModal" class="modal">
       <div class="modal-content">
       <div class="modal-header">
       <span class="close thirdClose" id="">&times;</span>
       <h4>Set PIN</h4>
       </div>
       <div class="modal-body">

       <form class="formPass" method="post">
           <div class="formPassWrapper">
           <h5 class="formHeading"></h5h5>
             <input type="password" class="formPassInput" id="newPassInput" name="NewPin" placeholder="Enter your new PIN" autocomplete="off"/>
           </div>
             <div class="formPassWrapper">
             <h5 class="formHeading"></h5>
               <input type="password" class="formPassInput" id="repeatPassInput" name="CheckPin" placeholder="Repeat your new PIN" autocomplete="off"/>
             </div>
                 <input name="submitPin" class="submitPass" type="submit" value="Submit"/>
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
