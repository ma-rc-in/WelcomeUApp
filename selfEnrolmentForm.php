<?php
    require_once("connection.php");//gets the connections.php
    require_once("functions.php");
    $db = getConnection();//returns the connection for the database.


?>
<?php
    session_start();
    $StudentInfo = getStudentDetails();
  //  echo $StudentInfo['firstName'];
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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Self-enrolment</title>
    </head>
    <body style="background-color:#000000;">
        <a href="mainmenu.php" >
           <center>
               <img src="Images/logo_white.png" alt="Logo" width= "350px" height= "100px" style="margin-top: 25px; align-items: center" />
           </center>
        </a>

        <h1 style="color:#FFFFFF">Self-enrolment Form</h1>
        <br/>


        <h2 style="color:#FFFFFF">Step 1</h2>
        <h2 style="color:#FFFFFF">Please fill in the details</h2>
        <div class="container">
            <form action="selfEnrolmentForm.php" method="POST">
                <fieldset>
                <legend> Personal Details </legend>

                    <label for "title">Title: </label>
                    <input  type = "text" name = "title" readonly value="<?php echo $StudentInfo['title'];?>"/>

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
                    <input formaction="UploadPhoto.php" type="submit" name="submit" value="Submit"/>
                </fieldset>


            </form>
        </div>

    </body>
</html>

<style>
    * {
        box-sizing: border-box;
    }

    input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
        .col-25, .col-75, input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }
    #containerWrapper {
        place-content: center;
    }
    #container{
        border-radius: 25px;
        background: #FFFFFF;
        border: 3px solid #000000;
        //padding: 20px;
       // width: 600px;
        height: 60%;
        margin: auto;
        width: 60%;
    }
    .grid-container {
        display: grid;
        grid-template-columns: auto auto auto;
    }
    .grid-item {
        grid-column: 1 / 3;
    }
    .grid-item2 {
        grid-column: 2 / 5;
    }

</style>