<?php
    require_once("connection.php");//gets the connections.php
    $db = getConnection();//returns the connection for the database.

    //NEEDS TO INCLUDE VALIDATION, Error Handling
    //NEEDS TO INCLUDE VALIDATION, Error Handling
    //NEEDS TO INCLUDE VALIDATION, Error Handling
?>
<?php
if(isset($_POST['submit']))
{
    $ID = $_POST['formStudentID']; //$_POST['studentID']; //$ID= $_POST->studentID; //checks if this is not emptys
    $PW = $_POST['formPassword']; //$_POST['password']; !empty
    //student ID from tbl_student
    $studentselect = $db->query("select password from tbl_student where studentID='$ID'"); //gets all from tbl_student, //password
    $obj = $studentselect->fetchObject();

    $pwobject = $obj->password; //ensures that the value isn't empty

    //This is pulling both numbers and strings from the DB.
//serialise
    if(password_verify($PW, $pwobject)) //['password'] //$obj->fetch->password uses a hash //serialize converts it to string
    //if($PW == $pwobject)
    {
        session_start();
        //$_SESSION["studentID"] = $obj->fetch('studentID'); //$row["studentID"]
        //Here we are pulling the information from the specific row in the DB.
        header("Location:mainmenu.php");
    }
    else
    {
        session_start();
        $_SESSION["LogInFail"] = "Yes";
        echo 'Failed: PW and ID = '.$pwobject.' '.$ID; //Delete later
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V19</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="CSS/css/util.css">
	<link rel="stylesheet" type="text/css" href="CSS/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
         
         
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                <img class="imglogo" src="CSS/images/logo.png" alt="logo" width="250" height="75"/>
				<form action="loginform.php" method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-33">
						WelcomeU
					</span>
                    <h5> Please login with your university login</h5>

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
	

	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>