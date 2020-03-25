<?php
    require_once('connection.php');//gets the connections.php
    require_once("functions.php");
    require_once("groupChatFunctions.php");
    $db = getConnection();//returns the connection for the database.

    //needs to display the information, and show the users name, also needs to redirect if the user hasn't enrolled

    //CHANGE LATER, BUT RETURNS USER IF STUDENT ID IS SET
    session_start();
    if(isset($_SESSION['sessionStudentID'])) { //requires functions

        //this is used to get the students information required to use the chat
        $studentInfo = getStudentDetails(); //gets all student details
        $studentFirstName = $studentInfo['firstName'];//firstname
        $studentLastName = $studentInfo['lastName']; //lastname
        $studentID = $studentInfo['studentID'];//student ID
        $studentCourseID = $studentInfo['courseID'];//courseID
        $courseName = courseNameConversion($studentCourseID); //conversion for course ID
    }
    else { //return user to login
        header('Location:mainmenu.php');
    }

    if(isset($_POST['submit'])) //when the user submits their message
    {
        $RoomName = $courseName;
        $Message = $_POST['formMessage'];//message is assigned to what the user writes
        $senderStudentID = $studentID;
        $sendTime = date("Y-m-d H:i:s"); //"Y-m-d H:i:s" was"y-m-d h:i A"

        //sends this to the database when user clicks send
        $groupChatInsert = $db->query("INSERT INTO tbl_groupchat (
        chatRoomName, chatMessage, senderStudentID, timeSent)
        VALUES('{$RoomName}','{$Message}','{$senderStudentID}','{$sendTime}')");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>WelcomeU Group Chat</title>

    <!--Scripts-->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" type="text/css" href="CSS/css/util.css">
    <link rel="stylesheet" type="text/css" href="CSS/css/main.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Source+Code+Pro' rel='stylesheet' type='text/css'>
</head>
<body>

    <script>
        $(document).ready(function(){
            setInterval(function() {
                $("#message").load("groupChatLoad.php");
            }, 1000);
        });
    </script>

    <h1><?php echo $courseName." - Group Chat";?> </h1>

    <button>Back</button>

    <div id="messageBox">
    <textarea name="messageArea" id="message" rows="20" cols="60">
    <?php
        $messages = groupChatMessage($courseName);//gets all the messages associated with the courseName
        while ($row = $messages->fetchObject()) {
            //shows information for users
            $sendID = $row->senderStudentID;
            $studentNames = studentName($sendID);
            echo $studentNames['firstName'] . " " . $studentNames['lastName'] . " (" . $row->senderStudentID . "):\n";
            echo $row->chatMessage . "\n";
        }
    ?>
    </textarea>
    </div>

    <form action=""groupChat.php" method="post">
    <label for "formMessage">Your Message:</label><br>
    <input type = "text" name = "formMessage"><br><br>
    <button>Report</button>
    <input type="submit" name="submit" value="Submit"/>
    </form>
</body>
</html>
