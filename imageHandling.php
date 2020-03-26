<?php
    require_once("connection.php");//gets the connections.php
    require_once("functions.php");
    $db = getConnection();//returns the connection for the database.
?>
<?php
    session_start();
    $StudentInfo = getStudentDetails();

    $ID = $_SESSION['sessionStudentID'];

    $upload_url = "UploadedPhoto/" . $_FILES["myfile"]["name"];

    $filename = $_FILES["myfile"]["name"];
    //move file
    move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_url);
    echo $ID;

    $studentDB = $db->query("UPDATE tbl_student 
                                SET uploadedPhoto = '$upload_url'
                                WHERE studentID='$ID'");

?>
