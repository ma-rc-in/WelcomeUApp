<?php
require_once("connection.php");//gets the connections.php
$db = getConnection();//returns the connection for the database.

    //used to verify users
    //delete later
?>
<?php
if(isset($_POST['submit']))
{
    $ID = $_POST['formStudentID']; //$_POST['studentID']; //$ID= $_POST->studentID; //checks if this is not emptys
    $PW = $_POST['formPassword']; //$_POST['password'];
    $TL = $_POST['formTitle'];
    $FN = $_POST['formFirst'];
    $LN = $_POST['formLast'];
    $G = $_POST['formGender'];
    $DOB = $_POST['formDOB'];
    $Address = $_POST['formAddress'];
    $SEM = $_POST['formSEmail'];
    $PIN = $_POST['formPin'];
    $Course = $_POST['formCourse'];
    $AT = $_POST['formAccess'];

    $StorePassword = password_hash($PW, PASSWORD_BCRYPT,array('cost'=>10));
    $studentDB = $db->query("INSERT INTO tbl_student (
        studentID, password, title, firstName, lastName, gender, DOB, address,studentEmail, PIN, courseID, accessType) 
        VALUES('{$ID}','{$StorePassword}','{$TL}','{$FN}','{$LN}','{$G}','{$DOB}','{$Address}','{$SEM}','{$PIN}','{$Course}','$AT')");
    //header('Location: loginform.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>testing page</title>
</head>
<body>
<h1>Testing Purposes</h1>
<h2>Create Account</h2>

<form action="adminCreate.php" method="POST">
    <label for "formStudentID">StudentID:</label>
    <input type = "text" name = "formStudentID">

    <label for "formPassword">Password:</label>
    <input type = "text" name = "formPassword">

    <label for "formTitle">Title:</label>
    <input type = "text" name = "formTitle">

    <label for "formFirst">Firstname:</label>
    <input type = "text" name = "formFirst">

    <label for "formLast">Lastname:</label>
    <input type = "text" name = "formLast">

    <label for "formGender">Gender:</label>
    <input type = "text" name = "formGender">

    <label for "formDOB">DOB:</label>
    <input type = "text" name = "formDOB">

    <label for "formAddress">Address:</label>
    <input type = "text" name = "formAddress">

    <label for "formSEmail">Email:</label>
    <input type = "text" name = "formSEmail">

    <label for "formPin">Pin:</label>
    <input type = "text" name = "formPin">

    <label for formCourse">Course:</label>
    <input type = "text" name = "formCourse">

    <label for formAccess">Access:</label>
    <input type = "text" name = "formAccess">

    <input type="submit" name="submit" value="Submit"/>
</form>
</body>
</html>