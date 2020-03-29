<?php
require_once("connection.php");//gets the connections.php

?>
<?php
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
    $studentinfo = $db->query("select * from tbl_student where studentID='$student'");
    $row = $studentinfo->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function courseNameConversion($courseID)//converts to courseName to course ID
{
    $db = getConnection();//returns the connection for the database.
    $courseName = $db->query("SELECT * FROM tbl_course WHERE courseID='$courseID'");
    $row = $courseName->fetch(PDO::FETCH_ASSOC);
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
    $studentinfo = $db->query("SELECT firstName, lastName from tbl_student where studentID='$studentName'");
    $row = $studentinfo->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function deleteUser($studentID)
{
    $db = getConnection();
    $db->query("DELETE from tbl_student where studentID='$studentID'");
}
?>
