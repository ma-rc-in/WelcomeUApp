<?php

require_once("connection.php");//gets the connections.php
require_once("functions.php");//gets the connections.php

function announcementMessageCount()//gets the students course ID
{
    $amount = 0;

    $db = getConnection();
    $studentInfo = getStudentDetails(); //gets all student details
    $ID = $studentInfo['studentID'];

    //gets the course ID of the student
    $studentidquery = "select courseID from tbl_student where studentID='$ID'";
    $student = $db->query($studentidquery);
    $row = $student->fetch(PDO::FETCH_ASSOC);
    $CourseID = $row['courseID'];

    $coursequery = "select * from tbl_course where courseID='$CourseID'";
    $course = $db->query($coursequery);

    while ($row = $course->fetchObject()) {
        $ID1 = $row->module1;$ID2 = $row->module2;
        $ID3 = $row->module3;$ID4 = $row->module4;
        $ID5 = $row->module5;$ID6 = $row->module6;
        $ID7 = $row->module7;$ID8 = $row->module8;
    }

    $coursequery = "select * from tbl_announcement where moduleID='$ID1'";
    $course = $db->query($coursequery);
    while ($row = $course->fetchObject()) {
        $amount = $amount + 1;
    }

    $coursequery = "select * from tbl_announcement where moduleID='$ID2'";
    $course = $db->query($coursequery);
    while ($row = $course->fetchObject()) {
        $amount = $amount + 1;
    }

    $coursequery = "select * from tbl_announcement where moduleID='$ID3'";
    $course = $db->query($coursequery);
    while ($row = $course->fetchObject()) {
        $amount = $amount + 1;
    }

    $coursequery = "select * from tbl_announcement where moduleID='$ID4'";
    $course = $db->query($coursequery);
    while ($row = $course->fetchObject()) {
        $amount = $amount + 1;
    }

    $coursequery = "select * from tbl_announcement where moduleID='$ID5'";
    $course = $db->query($coursequery);
    while ($row = $course->fetchObject()) {
        $amount = $amount + 1;
    }
    $coursequery = "select * from tbl_announcement where moduleID='$ID6'";
    $course = $db->query($coursequery);
    while ($row = $course->fetchObject()) {
        $amount = $amount + 1;
    }

    $coursequery = "select * from tbl_announcement where moduleID='$ID7'";
    $course = $db->query($coursequery);
    while ($row = $course->fetchObject()) {
        $amount = $amount + 1;
    }

    $coursequery = "select * from tbl_announcement where moduleID='$ID8'";
    $course = $db->query($coursequery);
    while ($row = $course->fetchObject()) {
        $amount = $amount + 1;
    }

    return $amount;
}

