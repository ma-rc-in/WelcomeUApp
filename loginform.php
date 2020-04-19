<?php
require_once("connection.php");//gets the connections.php //was connection
require_once("functions.php");//gets the connections.php //was connection
$db = getConnection();//returns the connection for the database.

//NEEDS TO INCLUDE VALIDATION, Error Handling
//NEEDS TO INCLUDE VALIDATION, Error Handling
//NEEDS TO INCLUDE VALIDATION, Error Handling
?>
<?php
$ID = $PW = "";
$ErrorMessage = "";
echo '<script> localStorage.setItem("login", "no"); </script>';

$cookiename = "user";
if (isset($_COOKIE[$cookiename])){
    $ID = $_COOKIE[$cookiename];
    echo '<script> localStorage.setItem("login", "yes"); </script>';
}


if (isset($_POST['submit'])) {
    if (empty($_POST['formStudentID']) || empty($_POST['formPassword'])) {
        $ErrorMessage = "Please enter your Student ID or Password.";
    } else {

        $ID = inputTest($_POST['formStudentID']); //$_POST['studentID']; //$ID= $_POST->studentID; //checks if this is not emptys
        $PW = inputTest($_POST['formPassword']); //$_POST['password']; !empty
        //student ID from tbl_student
        $studentquery = "select password, studentID, isBanned from tbl_student where studentID=:SID"; //gets all from tbl_student
        $studentselect = $db->prepare($studentquery);
        $studentselect->bindParam('SID', $ID, PDO::PARAM_STR);
        $studentselect->execute(array(":SID" => $ID));
        $select = $studentselect->fetchObject();

        $amount = studentCount($ID);
        if ($amount > 0) {
            $pwobject = $select->password;
        } else {
            $ErrorMessage = "Incorrect Student ID or Password.";
            $pwobject = "null";
        }

        //This is pulling both numbers and strings from the DB.
        if (password_verify($PW, $pwobject)) //['password'] //$obj->fetch->password uses a hash //serialize converts it to string
        {
            $isBannedobject = $select->isBanned;

            if ($isBannedobject == 0) {
                $set = $_POST['cookieset'];
                if($set == "set") {
                    setcookie($cookiename, $ID );
                } else {
                    setcookie($cookiename, "", time() - 100);//delete the cookie
                }

                session_start();
                $userobject = $select->studentID; //gets the user ID
                $_SESSION["sessionStudentID"] = $userobject; //sets the session to the user ID
                if (checkAccessType() != "Student") {
                    header('Location:mainmenuLecturer.php');//sents to the lecturer version of the menu
                } else {
                    header("Location:mainmenu.php"); //going to the main menu
                }
            } else {
                $ErrorMessage = "Your account is currently suspended.";
                //displays an error.
            }
        } else {
            session_start();
            $_SESSION["LogInFail"] = "Yes";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>WelcomeU</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="Images/favicon.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="CSS/css/util.css">
    <link rel="stylesheet" type="text/css" href="CSS/css/main.css">
    <link rel="stylesheet" type="text/css" href="CSS/css/popUpCSS.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="settings.js"></script>
    <!--===============================================================================================-->
</head>
<style>
#capsLockInfo {
  font-family: Arial, sans-serif;
  color: red;
  text-align: center;
  display:inline-block;
  margin-bottom: 5px;
  display: none;
}

.cookiesDiv {
  display: inline-block;
  position: fixed;
  width: 100%;
  top: 0;
  right: 0;
  left: 0;
  height: 35px;
  line-height: 35px;
  background: #5c5c5c;
  color: white;
  font-size: 17px;
  font-family: Arial, sans-serif;
  font-weight: 100;
  -webkit-transition: .8s;
  transition: .8s;
  -webkit-animation: slideIn .8s;
          animation: slideIn .8s;
  -webkit-animation-delay: .8s;
          animation-delay: .8s;
  z-index: 10;

}
.messageCookiesDiv {
  display: inline-block;
  color: white;
  margin-top: 3px;
  margin-bottom: 3px;
  float; left;
  width: 95%;
  text-align: center;
  margin-left: 20px;
}

.closeCookiesDiv {
  border: none;
  color: white;
  position: absolute;
  display: inline-block;
  right: 8px;
  top: 2;
  cursor: pointer;
  line-height: 30px;
  height: 30px;
  width: 30px;
  font-size: 32px;
  font-weight: bold;
}
.closeCookiesDiv:hover {
  color: #c4c4c4;
}

.checkBoxCookiesDiv {
  display: none;
}
.checkBoxCookiesDiv:checked + .cookiesDiv {
  display: none;
  -webkit-transition: .8s;
  transition: .8s;
  -webkit-animation: slideIn .8s;
          animation: slideIn .8s;
  -webkit-animation-delay: .8s;
          animation-delay: .8s;

}

@media screen and (max-width: 920px){
    .cookiesDiv {
    height: 70px;
  }
  .messageCookiesDiv {
    float; left;
    width: 91%;
    margin-left: 20px;
  }
  .closeCookiesDiv {
    right: 3px;
    top: 7px;
  }
}

@media screen and (max-width: 590px){
    .cookiesDiv {
    height: 105px;
  }
  .messageCookiesDiv {
    font-size: 15.5px;
    color: white;
    margin-top: 3px;
    margin-bottom: 3px;
    float; left;
    width: 88%;
    margin-left: 20px;
  }
  .closeCookiesDiv {
    right: 3px;
    top: 7px;
    font-size: 30px;
  }
}

.cookiesMoreInfoLink {
text-decoration: underline;
margin-left: 2px;
cursor: pointer;
display: inline-block;

}

#cookiesMoreInfoLink:hover {
color: #b5b5b5;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.95);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
  z-index: 99;

}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 50px auto;
  padding: 10px 20px 20px 20px;
  background: rgba(87, 87, 87, 1);
  color: white;
  border-radius: 5px;
  width: 60%;
  position: relative;
  transition: all 5s ease-in-out;
  color: white;
  font-family: Arial, sans-serif;
  font-size: 13px;
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4;
}

.popup .close {
  position: absolute;
  top: 8px;
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
  max-height: 50%;
  overflow: auto;
}


.cookiesMoreInfoContentText, .LinkCookiesContentText {
  color: white;
  font-size: 18px;
  font-family: Arial, sans-serif;
}

.localStorageLinkCookiesContentText {
  text-decoration: underline;
}

.leftSpaceContentText {
  margin-left: 25px;
  display: list-item;
  list-style-type: disc;
  list-style-position: inside;
}

.logoMain {
  width: 350px;
  height: 110px;
}

.logoDiv {
  width: 100%;
  margin-top: 20px;
  display: inline-block;
  margin-left: 5%;
}



@media screen and (max-width: 500px){

  .cookiesMoreInfoContentText, .LinkCookiesContentText {
    font-size: 15px;
  }

  .close {
    top: 1px;
  }

  .logoMain {
    width: 310px;
    height: 100;
  }

  .logoDiv {
    width: 100%;
    margin-top: 20px;
    display: inline-block;
    margin-left: 0%;
  }

  .rememberUser, #llcookieset {
    display: inline-block;
    float: left;
    margin-top: 10px;
  }

  .forgotPassLabel {
    margin-right: 5px;
  }
}

@media screen and (max-width: 400px){

  .logoMain {
    width:  240px;
    height: 80px;
  }
}

</style>
<body>

<script>
    $(document).ready(function () {
        var check = localStorage.getItem("login");
        if(check == "yes"){
            var check = document.getElementById("llcookieset");
            check.checked = true;
        }
    });
</script>


<div class="limiter">

  <input class="checkBoxCookiesDiv" id="checkBoxCookiesDiv" type="checkbox" />
  <div class="cookiesDiv">
    <div class="messageCookiesDiv">
      This website is using cookies and javascript local storage to improve your experience. More information
      <div id="" class="cookiesMoreInfoLink" onclick="window.location.href='#cookiesClickMoreInfoDiv'">here</div>
    </div>
    <label for="checkBoxCookiesDiv" class="closeCookiesDiv">&times;</label>
  </div>

    <div class="container-login100" id="llContainerLogin" style="margin-top: 100px;">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50" id="llWrapLogin">

          <div class="logoDiv">
            <div class="logoChatWrapper">
              <img class="logoMain" id="gcLogo" src="images/logoBlack.png" alt="Logo" />
            </div>
          </div>

            <form action="loginform.php" method="POST" class="login100-form validate-form">
          <span class="login100-form-title p-b-33" id="llWelcomeU">
            WelcomeU
          </span>
                <h5 id="llLoginMessage"> Please login with your university login</h5>
                <p class="errorTxt"><?php echo $ErrorMessage; ?></p>
                <p id="capsLockInfo">*Be careful with your login and password, Caps Lock is ON*</p>

                <div class="wrap-input100 validate-input" data-validate="Student ID is required">
                    <input id="inputTextCapsLockLogin" class="input100" type="text" id="llStudentID" name="formStudentID" placeholder="StudentID" value="<?php echo $ID ?>">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                    <input id="inputTextCapsLockPass" class="input100" type="password" id="llPassword" name="formPassword" placeholder="Password">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>
                <input name="submit" class="login100-form-btn" id="llSubmit" type="submit" value="submit"/>
                <div class="rememberBox">
                  <a class="forgotPassLabel" style="color: #3498DB" href="helpServices.php#errorMessage" >Forgot Password?</a>
                <div class="rememberUser">
                  <label>
                  <input type="checkbox" id="llcookiesetCheckBox" name="cookieset" value="set">
                  <span id="llcookieset" style="user-select: none;">Remember Username?
                  </label>
                </input>
                </div>
              </div>
            </form>
        </div>
    </div>

    <!--Cookies Changes
    <div id="cookiesWarning">
        <div id="closecookiesWarning">&times;</div>
        <p id="cookiewarning">This website is using cookies and javascript local storage to improve your experience.</p>
        <button type="button" id="mmCookieMoreInfo" style="margin-top: 10px; float: left" ;>More </button>
        <button type="button" id="mmCookieAccept" style="margin-top: 10px; float: left" ;>Accept</button>
    </div>-->


    <div id="cookiesClickMoreInfoDiv" class="overlay">
     <div class="popup">
       <a class="close" href="#" style=" ">&times;</a>
       <div class="content" style="margin-top: 20px;">
         <p id="mmCookieInformationHeader" class="cookiesMoreInfoContentText">Cookies Information</p>
         <hr>
         <br>
         <p id="mminfo" class="cookiesMoreInfoContentText">This website uses <a class="LinkCookiesContentText" href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Cookies" >cookies </a> and <a class="LinkCookiesContentText" href="https://developer.mozilla.org/pl/docs/Web/API/Window/localStorage" >JavaScript local storage</a>  to enhance your experience while using this website.<p>
           <br>
         <p id="mminfo2" class="cookiesMoreInfoContentText">We do this by using cookies to:</p>
         <br>
         <p id="mminfo3" class="cookiesMoreInfoContentText leftSpaceContentText">Store your username to make it easier for you to login.</br></p>
         <br>
         <hr>
         <br>
         <p id="mminfo4" class="cookiesMoreInfoContentText">We also use JavaScript local storage to:</p>
         <p id="mminfo5" class="cookiesMoreInfoContentText leftSpaceContentText">Save various settings you may use in our website, such as the theme, language or contrast settings.</br></p>       </div>
     </div>
    </div>
</div>

</body>
</html>

<script>
    languageChange(); //changes the lanugage (default is english)
    themeChange();
    highContrast();
</script>

<script>
var checkInput = document.getElementById("inputTextCapsLockLogin");
var capsNote = document.getElementById("capsLockInfo");
checkInput.addEventListener("keyup", function(event) {

  if (event.getModifierState("CapsLock")) {
    capsNote.style.display = "block";
  } else {
    capsNote.style.display = "none"
  }
});
</script>
<script>
var checkInput = document.getElementById("inputTextCapsLockPass");
var capsNote = document.getElementById("capsLockInfo");
checkInput.addEventListener("keyup", function(event) {

  if (event.getModifierState("CapsLock")) {
    capsNote.style.display = "block";
  } else {
    capsNote.style.display = "none"
  }
});
</script>

<script>
    var modal = document.getElementById("CookieInfoPage");
    var btn = document.getElementById("mmCookieMoreInfo");
    var btnClose = document.getElementById("mmCookieButtonClose");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function () {
        modal.style.display = "block";
    }
    btnClose.onclick = function () {
        modal.style.display = "none";
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
