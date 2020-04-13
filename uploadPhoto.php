<?php
    require_once("connection.php");//gets the connections.php
    require_once("functions.php");
    $db = getConnection();//returns the connection for the database.

    session_start();
    $StudentInfo = getStudentDetails();
    $student = $StudentInfo['studentID'];//student ID
    $FileErr = '';

if(isset($_POST['submit'])){
    if($_FILES["myfile"]["size"] < 1000000) { //checks size
        $filename = addslashes($_FILES["myfile"]["name"]); //get the name of the file
        $data = addslashes(file_get_contents($_FILES['myfile']['tmp_name']));
        $imgtype = addslashes($_FILES["myfile"]["type"]); //gets the type of the file
        if (empty($data)) { //checks to see if it is not empty
            $studentquery = "select * from tbl_student where studentID=:student";
            $studentselect = $db->prepare($studentquery);
            $studentselect->bindParam('student', $student, PDO::PARAM_STR);
            $studentselect->execute(array(":student" => $student));
            $row = $studentselect->fetch(PDO::FETCH_ASSOC);
            $photo = $row['uploadedPhoto'];
            if($photo != null){
                header('location:selfEnrolmentCompleted.php');
            }
            else {
                $FileErr = "Please choose a photo";
            }
        } else{
            list(, , $imgtype,) = getimagesize($_FILES['myfile']['tmp_name']); //gets the file type
            if ($imgtype == 3) // checking image type
                $ext = "png";   // to use it later in HTTP headers
            elseif ($imgtype == 2)
                $ext = "jpeg";
            elseif ($imgtype == 1)
                $ext = "gif";
            else{
                $FileErr = "Please choose a valid photo type";
            }
            //uploads the data
            $insert = "UPDATE tbl_student SET uploadedPhoto='$data',uploadedPhotoName='$filename',uploadedPhotoType='$ext' WHERE studentID='$student'";
            $studentDB = $db->query($insert);
            header('location:selfEnrolmentCompleted.php');
        }
    }
    else{
        $FileErr = "The image is too large";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Self-enrolment</title>
    <script src="uploadPhotoJS.js"></script>
    <script src="settings.js"></script>
</head>
<body style="background-color:#000000;">

<div class="wrapperBody">
  <h2>Upload SmartCard Photo</h2>

    <a href="mainmenu.php" >
        <center>
            <img src="Images/logo_white.png" alt="Logo" width= "350px" height= "100px" style="margin-top: 25px; align-items: center" />
        </center>
    </a>

<?php
function displayImage(){
    $db = getConnection();
    $student = $_SESSION['sessionStudentID'];
    $studentquery = "select * from tbl_student where studentID=:student";
    $studentselect = $db->prepare($studentquery);
    $studentselect->bindParam('student', $student, PDO::PARAM_STR);
    $studentselect->execute(array(":student" => $student));
    $row = $studentselect->fetch(PDO::FETCH_ASSOC);
    $photo = $row['uploadedPhoto'];
    if ($photo == null)
    {
        echo' <div class="imgWrapper">
          <img src="images/userPlaceholder.png" width="300" height="300" style="align-items: center; border:1px solid #021a40;"/>
        </div>';
    } else{
        echo '
        <div class="imgWrapper" id="uploadedImage">
          <img src="data:image/jpg;base64,'.base64_encode( $photo ).'" width="300" height="300" style="align-items: center; border:1px solid #021a40;"/>
        </div>';
    }
}
?>

    <br/>
    <h1 style="color:#FFFFFF; text-align: center" id="eeTitleTwo">Self-enrolment Form</h1>
    <br/>
    <h2 style="color:#FFFFFF" id="eeStepTwo">Step 2 _ Please upload a photos of you for your Student ID</h2>

    <div class="container">
        <legend style="font-size: x-large; font-weight: bold" id="eeSmartCardCurrent"> Current SmartCard Photo </legend>
        <?php displayImage(); ?>
        <form action="uploadPhoto.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend style="font-size: x-large; font-weight: bold" id="eeSmartCardUpload"> Upload SmartCard Photo </legend>

                <label id="eeFilename">Filename:</label>
                <input type="file" name= "myfile" id="myfile" />
                <p class="errorTxt"><?php echo $FileErr; ?></p>
                <br/><br/>
                <input type="submit" name="submit" id="submit" value="Submit" />
            </fieldset>
        </form>
    </div>
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

    .imgWrapper {
    width: 100%;

    }

    .wrapperBody {
      overflow: auto;
      position: relative;
      text-align: center;
      zoom: 1;
    }


</style>
<script>
    languageChange(); //changes the lanugage (default is english)
    themeChange();
    highContrast();
</script>