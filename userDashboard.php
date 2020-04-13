<!-- <?php
require_once("connection.php");//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.
?>
<?php
session_start();
if(isset($_SESSION['sessionStudentID'])) {
  if (checkAccessType() == "Lecturer") {
        header('Location:userDashboardAdmin.php');
    }
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
              $message = "Password has been changed successfully!";
              //display if the password is correct
          } else
              $message = "Something went wrong. Please try again!";
      }
      else
      {
      $message = "Current password is wrong! Please try again!";
       }
  }
    $checkPassword = $_POST['CheckPass'];
    if (isset($_POST['submitDelete'])) {
        if (password_verify($checkPassword, $password)) {
            $db->query("DELETE from tbl_student where studentID='$student'");
            $db->query("DELETE from tbl_groupChat where senderStudentID='$student'");
            //$db->query("DELETE from tbl_selfEnrolment where senderStudentID='$student'"); //will need to update senderStudentID
            sleep(1);
            logout();
          }
          $message = "Operation aborted, your current password is wrong. Plese try again!";

        } else {
        }

  $newPin = $_POST['NewPin'];
  $checkPin = $_POST['CheckPin'];
    if(isset($_POST['submitPin'])) {
        if (strlen($newPin) > 4 || is_numeric($newPin) == false) { //if more than 4 characters
            //display when there is more than numbers or the user is not entering a number
            $message = "Something went wrong. Please try again!";

        } else
         {
            // if (pin_change($oldPassword, $password)) {
            if ($newPin == $checkPin) {
                $hashed_password = password_hash($newPin, PASSWORD_BCRYPT); //PASSWORD_BCRYPT
                $db->query("UPDATE tbl_student SET PIN='$hashed_password' WHERE studentID='$student'"); //='$hashed_password'
                $message = "Modal Pin - Pin has been set!";
            } else {
              $message = "Something went wrong. Plese try again!";
            }
        }
  }
  ?> -->

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/css/popUpCSS.css">

    <title>WelcomeU Login</title>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Source+Code+Pro' rel='stylesheet' type='text/css'>

<script src="settings.js"></script>

<script>
    languageChange();
    themeChange();
    highContrast();
</script>

    <script>
    function checkForPassword() {
  var password = $("#newPassInput").val();
  var confirmPassword = $("#repeatPassInput").val();
  var button = $('#udBttonTextSubmitButtonForPass');

  if (password != confirmPassword)
    $("#error").html("Passwords are not the same!!!");
  else
  $("#error").html("Passwords match, you can now submit it.");

  if (password == confirmPassword)
  $(button).removeAttr('disabled');
  //$("#error").html("");
}

$(document).ready(function() {
  $("#repeatPassInput").keyup(checkForPassword);
  $("#disabledText").text("Please fill in the form to be able to submit your new password");

  $('#firstModal').on('hidden', function () {
  //$('#passChangeForm').find('input[type="password"]').val('');
});
});

</script>
<style>

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.9);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 200px auto;
  padding: 20px;
  background: rgba(87, 87, 87, 1);
  color: white;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
  color: white;
  font-family: Arial, sans-serif;
  font-size: 20px;
}

.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 38px;
  font-weight: bold;
  text-decoration: none;
  -webkit-text-stroke-width: 0.3px;
  -webkit-text-stroke-color: white;
  color: white;
}
.popup .close:hover {
  color: #b8b8b8;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
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
       <h3 class="textIcons" id="udTextHeaderPass">Change password</h3>
       <a href="#" id="udButtonTextFirstBtn" class="button" data-abbr=" password">Change</a>
       </div>

       <div class="patch-item patch-button" style="width: 100%; float: left;">
       <div class="iconPass">
         <img class="imgPass" src="images/remove.png" alt="PasswordKey" width= "90px" height= "90px"/>
       </div>
       <h3 class="textIcons" id="udTextHeaderAccount">Delete account</h3>
       <a href="#" id="udButtonTextSecondBtn" class="button" data-abbr=" account">Delete</a>
       </div>

       <div class="patch-item patch-button" style="width: 100%; float: left;">
       <div class="iconPass">
         <img class="imgPass" src="images/lock.png" alt="PasswordKey" width= "90px" height= "90px"/>
       </div>
       <h3 class="textIcons" id="udTextHeaderPin">Set PIN</h3>
       <a href="#" id="udButtonTextThirdBtn" class="button" data-abbr=" PIN">Set</a>
       </div>

       <div id="errorMessage" class="overlay">
        <div class="popup">
          <a class="close" href="#" style="line-height: 1px;">&times;</a>
          <div class="content" style="margin-top: 20px;">
            <?php echo $message;?>
          </div>
        </div>
       </div>

       <div id="firstModal" class="modal">
       <div class="modal-content">
       <div class="modal-header">
       <span class="close firstClose" id="">&times;</span>
       <h3 id="udTextHeaderPass">Change Password</h3>
       </div>
       <div class="modal-body">

       <form id="passChangeForm" class="formPass" method="post" name="passwordForm" >
         <div class="formPassWrapper">
         <h5 class="formHeading"></h5>
           <input type="password" class="formPassInput" id="udTextModalOldPassPlaceholder" name="OldPass" placeholder="Enter your current password" autocomplete="off" required/>
         </div>
           <div class="formPassWrapper">
           <h5 class="formHeading"></h5>
             <input type="password" class="formPassInput" id="udTextModalNewPassPlaceholder" name="NewPass" placeholder="Enter your new password" autocomplete="off" required/>
           </div>
             <div class="formPassWrapper">
             <h5 class="formHeading"></h5>
               <input type="password" class="formPassInput" id="udTextModalRepeatNewPassPlaceholder" name="CheckPass" placeholder="Repeat your new password" autocomplete="off" onChange="checkForPassword();" required/>
             </div>
                 <button onclick="window.location.href='#errorMessage'" id="udButtonTextSubmitButtonForPass" name="submitPass" class="submitPass" type="submit" disabled>Submit</button><br/><span id="error"/><br/><span id="disabledText"/><br><span id="currentPassCheck"/>

       </form>
       </div>
       </div>
       </div>

       <div id="secondModal" class="modal">
       <div class="modal-content">
       <div class="modal-header">
       <span class="close secondClose" id="">&times;</span>
       <h3 id="udTextHeaderAccount">Delete Account</h3>
       </div>
       <div class="modal-body">

      <div id="udModalTextBodyWarningNote" class="deleteNote">
        <h4 id="udModalTextHeaderWarning">WARNING</h4>
        You are about to delete all data related to your account, so you will no longer be able to use this application.<br>If you want to continue, please enter your current password below and click on "submit".
      </div>

       <form class="formPass" method="post">
             <div class="formPassWrapper">
             <h5 class="formHeading"></h5>
               <input type="password" class="formPassInput" id="udTextModalRepeatPassDeleteAccountPlaceholder" name="CheckPass" placeholder="Enter your password to delete your account" autocomplete="off"/>
             </div>
                 <button onclick="window.location.href='#errorMessage'" id="udButtonTextSubmitButtonForDeleteAccount" name="submitDelete" class="submitPass" type="submit">Submit</button>
       </form>
       </div>
       </div>
       </div>

       <div id="thirdModal" class="modal">
       <div class="modal-content">
       <div class="modal-header">
       <span class="close thirdClose" id="">&times;</span>
       <h3 id="udTextHeaderPin">Set PIN</h3>
       </div>
       <div class="modal-body">

       <form class="formPass" method="post">
           <div class="formPassWrapper">
           <h5 class="formHeading"></h5>
             <input type="password" class="formPassInput" id="udTextModalNewPinPlaceholder" name="NewPin" placeholder="Enter your new PIN" autocomplete="off"/>
           </div>
             <div class="formPassWrapper">
             <h5 class="formHeading"></h5>
               <input type="password" class="formPassInput" id="udTextModalRepeatPinPlaceholder" name="CheckPin" placeholder="Repeat your new PIN" autocomplete="off"/>
             </div>
                 <button onclick="window.location.href='#errorMessage'" id="udButtonTextSubmitButtonForChangePin" name="submitPin" class="submitPass" type="submit">Submit</button>
       </form>


       </div>
       </div>
       </div>
       </div>
       <script>
       var modal1 = document.getElementById("firstModal");
       var btn1 = document.getElementById("udButtonTextFirstBtn");
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
               var btn2 = document.getElementById("udButtonTextSecondBtn");
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
              var btn3 = document.getElementById("udButtonTextThirdBtn");
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
