<?php
//used to check for new messages
require_once('connection.php');//gets the connections.php
require_once("functions.php");
require_once("announcementFunctions.php");
$db = getConnection();//returns the connection for the database.

session_start();

$amount = announcementMessageCount();
$messageAmountString = strval($amount);

echo '<Script> 
            var message = "'; echo $messageAmountString; echo'";
            localStorage.setItem("announcementOld", message); //amount load is now old
         </Script>';
?>
