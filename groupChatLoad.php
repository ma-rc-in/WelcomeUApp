<?php
    require_once('connection.php');//gets the connections.php
    require_once("functions.php");
    require_once("groupChatFunctions.php");
    $db = getConnection();//returns the connection for the database.

    session_start();
    $studentInfo = getStudentDetails(); //gets all student details
    $studentFirstName = $studentInfo['firstName'];//firstname
    $studentLastName = $studentInfo['lastName']; //lastname
    $studentID = $studentInfo['studentID'];//student ID
    $studentCourseID = $studentInfo['courseID'];//courseID
    $courseName = courseNameConversion($studentCourseID); //conversion for course ID

    $messages = groupChatMessage($courseName);//gets all the messages associated with the courseName
    while ($row = $messages->fetchObject()) {
        //shows information for users
        $sendID = $row->senderStudentID;
        $studentNames = studentName($sendID);

        echo '<div id=messageSent>';
        echo $studentNames['firstName'] . " " . $studentNames['lastName'] . " (" . $row->senderStudentID . "):\n";
        echo $row->chatMessage."\n";
        echo "\n";
        echo '</div>';
}
?>

