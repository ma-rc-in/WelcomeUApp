<?php
require_once("connection.php");//gets the connections.php
require_once("functions.php");//gets the connections.php

function groupChatMessage($courseName)
{
    $db = getConnection();
    $message = "SELECT * FROM tbl_groupChat WHERE chatRoomName='$courseName'";
    $messageq = $db->query($message); //used to only display the course chatroom
    return $messageq;
}

function usersInChat($courseID)
{
    $db = getConnection();
    $message = "SELECT studentID, firstName, lastName FROM tbl_student WHERE courseID='$courseID'";
    return $message;
}
?>
