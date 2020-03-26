<?php
    require_once("connection.php");//gets the connections.php
    require_once("functions.php");
    $db = getConnection();//returns the connection for the database.


?>
<?php
    session_start();
    $StudentInfo = getStudentDetails();
    echo $StudentInfo['firstName'];
    if(isset($_POST['submit']))
    {
        $ID = $_SESSION['sessionStudentID'];
        $PersonalEmail = $_POST['personalEmail'];


        echo $ID;
        echo $PersonalEmail;

        $studentDB = $db->query("UPDATE tbl_student 
                                SET personalEmail = '$PersonalEmail'
                                WHERE studentID='$ID'");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Self-enrolment page</title>
</head>
<body>
<h1>Self-enrolment</h1>
<h2>Please fill in the details</h2>

<form action="selfEnrolmentForm.php" method="POST">
    <label for "firstName">Title: </label>
    <input type = "text" name = "title" readonly value="<?php echo $StudentInfo['title'];?>">
    <br /><br />
    <label for "firstName">First Name: </label>
    <input type = "text" name = "firstName" readonly value="<?php echo $StudentInfo['firstName'];?>">
    <br /><br />
    <label for "lastName">Last Name: </label>
    <input type = "text" name = "lastName" readonly value="<?php echo $StudentInfo['lastName'];?>">
    <br /><br />
    <label for "lastName">Gender: </label>
    <input type = "text" name = "gender" readonly value="<?php echo $StudentInfo['gender'];?>">
    <br /><br />
    <label for "personalEmail">Personal Email Address:</label>
    <input type = "text" name = "personalEmail">
    <br /><br />

    <input type="submit" name="submit" value="Submit"/>
</form>

<form>
    <h2>Upload SmartCard Photo</h2>
    <button type="submit" formaction="UploadPhoto.php">Next</button>
</form>
</body>
</html>