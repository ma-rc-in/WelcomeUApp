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
    <div class="container-login100" id="llContainerLogin">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50" id="llWrapLogin">
            <div class="imgWrapper">
                <img class="imglogo" id="llLogo" src="images/uni_logo.png" alt="logo" width="250px" height="75px"/>
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

    <!--Cookies Changes-->
    <div id="cookiesWarning">
        <div id="closecookiesWarning">x</div>
        <p id="cookiewarning">This website is using cookies and javascript local storage to improve your experience.</p>
        <button type="button" id="mmCookieMoreInfo" style="margin-top: 10px; float: left" ;>More Information</button>
        <button type="button" id="mmCookieAccept" style="margin-top: 10px; float: left" ;>Accept</button>
    </div>

    <!--More Info Modal-->
    <div id="CookieInfoPage" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" id="" style="padding-bottom: 10px;">&times;</span>
                <h4 id="mmCookieInformationHeader">Cookie Information</h4>
            </div>
            <div class="modal-body" style="margin-bottom: 0px;">
                <p id="mminfo">This website uses cookies and javascript local storage to enhance your experience while using this website.<p>
                <p id="mminfo2">We do this by using cookies to:</p>
                <p id="mminfo3">Store your username to make it easier for you to login.</br></p>
                <p id="mminfo4">We also use javascript local storage to:</p>
                <p id="mminfo5">Save various settings you may use in our website, such as the theme, language or contrast settings.</br></p>
                <button type="button" id="mmCookieButtonClose" style="margin-top: 10px; float: left" ;>Close</button>
            </div>
        </div>
    </div>
    <!--End More Info Modal-->
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
