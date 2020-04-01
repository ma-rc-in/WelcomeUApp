<?php
//used to check for new messages
require_once('connection.php');//gets the connections.php
require_once("functions.php");
require_once("groupChatFunctions.php");
$db = getConnection();//returns the connection for the database.

session_start();
$studentInfo = getStudentDetails(); //gets all student details
$studentID = $studentInfo['studentID'];//student ID
$studentCourseID = $studentInfo['courseID'];//courseID
$courseName = courseNameConversion($studentCourseID); //conversion for course ID

    $messageAmount = 0;
    $messages = groupChatMessage($courseName);
    while ($row = $messages->fetchObject()) {
        $messageAmount = $messageAmount + 1;
        $lastSenderID = $row->senderStudentID; //used to get the last sender
    }

    $messageAmountString = strval($messageAmount);
    $currentStudentString = strval($studentID);
    $lastSenderIDString = strval($lastSenderID);

echo '<Script> 
            var message = "'; echo $messageAmountString; echo'";
            localStorage.setItem("mainMenuMessageOld", message); //amount load is now old
            
            var currentStudent = "'; echo $currentStudentString; echo'";
            localStorage.setItem("mainMenuCurrentStudent", currentStudent);
        
            var lastStudent = "'; echo $lastSenderIDString; echo'";
            localStorage.setItem("mainMenuLastStudent", lastStudent);
         </Script>';
    ?>