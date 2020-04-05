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
$ErrorMessage="";

if(isset($_POST['submit']))
{
  if (empty($_POST['formStudentID']) ||empty($_POST['formPassword'])) {
      $ErrorMessage="Please enter your Student ID or Password.";
  } else {
      $ID = inputTest($_POST['formStudentID']); //$_POST['studentID']; //$ID= $_POST->studentID; //checks if this is not emptys
      $PW = inputTest($_POST['formPassword']); //$_POST['password']; !empty
  //student ID from tbl_student
  $studentquery = "select password, studentID, isBanned from tbl_student where studentID=:SID"; //gets all from tbl_student
  $studentselect = $db->prepare($studentquery);
  $studentselect->bindParam('SID', $ID, PDO::PARAM_STR);
  $studentselect->execute(array(":SID" => $ID));
  $select = $studentselect->fetchObject();
  $pwobject = $select->password;
  $isBannedobject = $select->isBanned;

  //This is pulling both numbers and strings from the DB.
  if(password_verify($PW, $pwobject)) //['password'] //$obj->fetch->password uses a hash //serialize converts it to string
  {

      if ($isBannedobject == 0)
      {
          session_start();
          $userobject = $select->studentID; //gets the user ID
          $_SESSION["sessionStudentID"] = $userobject; //sets the session to the user ID
          if (checkAccessType() != "Student") {
              header('Location:mainmenuLecturer.php');//sents to the lecturer version of the menu
          }
          else{
              header("Location:mainmenu.php"); //going to the main menu
          }
      } else {
          $ErrorMessage="Your account is currently suspended.";
          //need to display an error so that the user knows they're banned
      }
  }
  else
  {
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
  <!--===============================================================================================-->
</head>
<body>



  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
        <div class="imgWrapper">
          <img class="imglogo" src="images/uni_logo.png" alt="logo" width= "250px" height= "75px" />
        </div>
        <form action="loginform.php" method="POST" class="login100-form validate-form">
          <span class="login100-form-title p-b-33">
            WelcomeU
          </span>
          <h5> Please login with your university login</h5>
          <p class="errorTxt"><?php echo $ErrorMessage; ?></p>
          <div class="wrap-input100 validate-input" data-validate="Student ID is required">
            <input class="input100" type="text" name="formStudentID" placeholder="StudentID">
            <span class="focus-input100-1"></span>
            <span class="focus-input100-2"></span>
          </div>

          <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="formPassword" placeholder="Password">
            <span class="focus-input100-1"></span>
            <span class="focus-input100-2"></span>
          </div>
          <input name="submit" class="login100-form-btn" type="submit" value="submit"/>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
