<?php
require_once('connection.php');//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.

session_start();
  if(isset($_POST["submit"])){
    // Checking For Blank Fields..
    if($_POST["moduleID"]==""){

    } else {
          echo "No new anouncements at the moment";
    };

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> Announcements</title>
<style>
      </style>

</head>
<body>

$module = $_POST['aaView']

     </body>
</html>


