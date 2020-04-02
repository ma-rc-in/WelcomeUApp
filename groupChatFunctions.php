<?php
require_once("connection.php");//gets the connections.php
require_once("functions.php");//gets the connections.php

function groupChatMessage($courseName)
{
    $db = getConnection();
    $messagequery = "SELECT * FROM tbl_groupChat WHERE chatRoomName=:courseName";
    $messeageselect = $db->prepare($messagequery);
    $messeageselect->bindParam('courseName', $courseName, PDO::PARAM_STR);
    $messeageselect->execute(array(":courseName" => $courseName));
    return $messeageselect;
}

function usersInChat($courseID)
{
    $db = getConnection();
    $userquery = "SELECT studentID, firstName, lastName FROM tbl_student WHERE courseID=:courseID";
    $userselect = $db->prepare($userquery);
    $userselect->bindParam(":courseID", $courseID, PDO::PARAM_STR);
    $userselect->execute(array(":courseID" => $courseID));
    return $userselect;
}
?>
