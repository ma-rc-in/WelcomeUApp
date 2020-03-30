<?php
require_once("connection.php");//gets the connections.php
require_once("functions.php");//gets the connections.php

function groupChatMessage($courseName)
{
    $db = getConnection();
    $message = $db->query("SELECT * FROM tbl_groupChat WHERE chatRoomName='$courseName'"); //used to only display the course chatroom
    //$row = $message->fetch(PDO::FETCH_ASSOC);
    return $message;
}

function usersInChat($courseID)
{
    $db = getConnection();
    $message = "SELECT studentID, firstName, lastName FROM tbl_student WHERE courseID='$courseID'";
    return $message;
}
?>
