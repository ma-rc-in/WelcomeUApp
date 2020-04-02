<?php
require_once("connection.php");//gets the connections.php

?>
<?php
function inputTest($input) //tests user input https://www.w3schools.com/php/php_form_validation.asp
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function logout()
{
    session_start();
    unset($_SESSION["sessionStudentID"]);
    session_destroy();
    header('Location: loginform.php');
}

function previousLogin() //this destorys the session, not checks
{
    if(isset($_SESSION['sessionStudentID'])) {
        header('Location: mainmenu.php'); //returns to the main menu
    }
    else{}

}

function getStudentDetails()//gets the info of the current user based on the sessionStudentID, call this to return all student data
{
    $db = getConnection();//returns the connection for the database
    $student = $_SESSION['sessionStudentID'];
    $studentquery = "select * from tbl_student where studentID=:student";
    $studentselect = $db->prepare($studentquery);
    $studentselect->bindParam('student', $student, PDO::PARAM_STR);
    $studentselect->execute(array(":student" => $student));
    $row = $studentselect->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function courseNameConversion($courseID)//converts to courseName to course ID
{
    $db = getConnection();//returns the connection for the database.
    $coursequery = "SELECT * FROM tbl_course WHERE courseID=:courseID";
    $courseselect = $db->prepare($coursequery);
    $courseselect->bindParam('courseID', $courseID, PDO::PARAM_STR);
    $courseselect->execute(array(":courseID" => $courseID));
    $row = $courseselect->fetch(PDO::FETCH_ASSOC);
    $courseName = $row['courseName'];
    if($courseName == null)
    {
       $courseName = "Unknown Course";
    }
    return $courseName;
}

function studentName($studentName)//for first and last name
{
    $db = getConnection();
    $studentquery = "SELECT firstName, lastName from tbl_student where studentID=:studentName";
    $studentselect = $db->prepare($studentquery);
    $studentselect->bindParam('studentName', $studentName, PDO::PARAM_STR);
    $studentselect->execute(array(":studentName" => $studentName));
    $row = $studentselect->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function deleteUser($studentID)
{
    $db = getConnection();
    $db->query("DELETE from tbl_student where studentID='$studentID'");
    $db->query("DELETE from tbl_groupchat where senderStudentID='$studentID'");
    //$db->query("DELETE from tbl_selfenrolment where student='$studentID'"); //update once Kee Wen has finished self enrolment
}
?>
