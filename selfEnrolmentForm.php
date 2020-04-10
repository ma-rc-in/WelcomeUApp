<?php
    require_once("connection.php");//gets the connections.php
    require_once("functions.php");
    $db = getConnection();//returns the connection for the database.
?>
<?php
    session_start();
    $StudentInfo = getStudentDetails();

    $EmailErr = "";
    $PersonalEmail = "";
    $UKMobile = "";
    $UkMobileErr = "";
    $EmergencyPerson = "";

    if(isset($_POST['submit'])) {

    $ID = $_SESSION['sessionStudentID'];
        $EmergencyPerson = $_POST['emergencyPerson'];
        $EmergencyRelationship = $_POST['emergencyRelationship'];
        $EmergencyContact = $_POST['emergencyContact'];
        $db->query("UPDATE tbl_student 
                        SET emergencyPerson='$EmergencyPerson', emergencyRelationship='$EmergencyRelationship',
                        emergencyContact='$EmergencyContact'
                        WHERE studentID='$ID'");
    //Email Validation
        $_POST['personalEmail'] = filter_var($_POST['personalEmail'], FILTER_SANITIZE_EMAIL);
        if (filter_var($_POST['personalEmail'] , FILTER_VALIDATE_EMAIL)) {
            $PersonalEmail = $_POST['personalEmail'];
            $validEmail = true;
        } else {
            $validEmail = false;
            $EmailErr = "**Invalid Email Address!";
        }
        //ukMobile input validation
        $phoneLength = $_POST['ukMobile'];
        //$pattern = "/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/";
        //$match = preg_match($pattern,$_POST['ukMobile']);
        if (strlen($phoneLength) < 10 || strlen($phoneLength) > 11) {
            // We have an invalid phone number
            $validUkMobile = false;
            $UkMobileErr = "**Invalid phone number";

        } else {
            // We have a valid phone number
            $UKMobile = $_POST['ukMobile'];
            $validUkMobile = true;
        }

        // if all user input are valid
        if($validEmail == true && $validUkMobile == true) {
            $db->query("UPDATE tbl_student 
                        SET personalEmail='$PersonalEmail', ukMobile='$UKMobile'
                        WHERE studentID='$ID'");
            header('location:uploadPhoto.php');
        }
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
               <img src="images/logo_white.png" alt="Logo" width= "350px" height= "100px" style="margin-top: 25px; align-items: center" />
           </center>
        </a>
        <br/>

        <h1 style="color:#FFFFFF; text-align: center">Self-enrolment Form</h1>
        <br/>


        <h2 style="color:#FFFFFF">Step 1 _ Please fill in the details</h2>
        <div class="formContainer">
            <form action="selfEnrolmentForm.php" method="POST">
                <fieldset>
                <legend style="font-size: x-large; font-weight: bold"> Personal Details </legend>

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
                    <input type = "text" name = "personalEmail" value="<?php echo $StudentInfo['personalEmail'];?>" required>
                    <p class="errorTxt"><?php echo $EmailErr; ?></p>
                <br /><br />
                    <label for "ukMobile">UK Mobile No.:</label>
                    <p>Please continue after +44 XXXX XXXXXX</p><input type = "number" name = "ukMobile" value="<?php echo $StudentInfo['ukMobile'];?>" required>
                    <p class="errorTxt"><?php echo $UkMobileErr; ?></p>
                <br /><br />
                </fieldset>
                <br />
                <fieldset>
                    <legend style="font-size: x-large; font-weight: bold"> Emergency Contact Details </legend>
                    <label for "emergencyPerson">Emergency Contact Person: </label>
                    <input type = "text" name = "emergencyPerson" value="<?php echo $StudentInfo['emergencyPerson'];?>" required>
                    <br /><br />
                    <label for "emergencyRelationship">Relationship: </label>
                    <select id="country" name="emergencyRelationship" value="<?php echo $StudentInfo['emergencyRelationship'];?>" required>
                        <option value="Parents">Parents</option>
                        <option value="Guardian">Guardian</option>
                        <option value="Others">Others</option>
                    </select>
                    <br /><br />
                    <label for "ukMobile">Contact No.:</label>
                    <input type = "number" name = "emergencyContact" value="<?php echo $StudentInfo['emergencyContact'];?>" required>
                </fieldset>
                <br />
                <input type="submit" name="submit" value="Save & Next"/>
                <br /><br />

            </form>
        </div>

    </body>
</html>

<style>
    * {
        box-sizing: border-box;
    }

    .errorTxt{
        color: darkred;
    }

    input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    input[type=number] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
        font-size: large;
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

    .formContainer {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
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


</style>