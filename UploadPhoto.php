<?php
    require_once("connection.php");//gets the connections.php
    require_once("functions.php");
    $db = getConnection();//returns the connection for the database.
?>
<?php
    session_start();
    $StudentInfo = getStudentDetails();
    $FileErr = '';

    if(isset($_POST['submit'])) {
        $ID = $_SESSION['sessionStudentID'];
        $upload_url = "UploadedPhoto/" . $_FILES["myfile"]["name"];
        if (empty($upload_url)) {
            $FileErr = "Please choose a photo";
        } else {
            $filename = $_FILES["myfile"]["name"];
            //move file
            move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_url);
            echo $ID;

            $studentDB = $db->query("UPDATE tbl_student 
                                    SET uploadedPhoto = '$upload_url'
                                    WHERE studentID='$ID'");
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Self-enrolment</title>
    <script src="UploadPhotoJS.js"></script>
</head>
<body style="background-color:#000000;">
<h2>Upload SmartCard Photo</h2>

    <a href="mainmenu.php" >
        <center>
            <img src="Images/logo_white.png" alt="Logo" width= "350px" height= "100px" style="margin-top: 25px; align-items: center" />
        </center>
    </a>
    <br/>
    <h1 style="color:#FFFFFF; text-align: center">Self-enrolment Form</h1>
    <br/>
    <h2 style="color:#FFFFFF">Step 2 _ Please upload a photos of you for your Student ID</h2>
    <div class="container">
        <form action="UploadPhoto.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend style="font-size: x-large; font-weight: bold"> Upload SmartCard Photo </legend>

                <label for="file">Filename:</label>
                <input type="file" name= "myfile" id="myfile" />
                <p class="errorTxt"><?php echo $FileErr; ?></p>
                <br/><br/>
                <input type="submit" name="submit" id="submit" value="Submit" />
            </fieldset>
        </form>
    </div>
</body>
<script>
    function timer() {
    imageEmptyCheck();
    setTimeout(timer, 500); //refresh the timer every 500 ms
    } timer();
</script>
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

    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }


</style>