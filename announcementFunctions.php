<?php

require_once("connection.php");//gets the connections.php
require_once("functions.php");//gets the connections.php

function announcementMessage($moduleID)
{
    $db = getConnection();
    $messagequery = "SELECT * FROM tbl_announcement WHERE announcementMessage=:ModuleID";
    $messeageselect = $db->prepare($messagequery);
    $messeageselect->bindParam('moduleID', $moduleID, PDO::PARAM_STR);
    $messeageselect->execute(array(":moduleID" => $moduleID));
    return $messeageselect;
}

function messageCount($moduleID)
{
    $db = getConnection();
    $messagequery = "SELECT * FROM tbl_announcement WHERE announcementMessage=:ModuleID";
    $messeageselect = $db->prepare($messagequery);
    $messeageselect->bindParam('moduleID', $moduleID, PDO::PARAM_STR);
    $messeageselect->execute(array(":moduleID" => $moduleID));
    $num_rows = count($messeageselect->fetchAll());
    return $num_rows;
}

/*function usersInChat($courseID)
{
    $db = getConnection();
    $userquery = "SELECT studentID, firstName, lastName FROM tbl_student WHERE courseID=:courseID";
    $userselect = $db->prepare($userquery);
    $userselect->bindParam(":courseID", $courseID, PDO::PARAM_STR);
    $userselect->execute(array(":courseID" => $courseID));
    return $userselect;
}*/
