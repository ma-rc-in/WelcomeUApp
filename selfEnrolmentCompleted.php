<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="settings.js"></script>
        <title>Self-enrolment</title>
    </head>
    <body style="background-color:#000000;">
        <a href="mainmenu.php" >
            <center>
                <img src="Images/logo_white.png" alt="Logo" width= "350px" height= "100px" style="margin-top: 25px; align-items: center" />
            </center>
        </a>
    <br/>
    <h1 style="color:#FFFFFF; text-align: center" id="eeSuccess">Congratulation! </h1>
        <br/>
    <h2 style="color:#FFFFFF; text-align: center" id="eeComplete">You have completed self-enrolment process.</h2>
        <p style="color:#FFFFFF; text-align: center" id="eeLink">Please click this <a style="color: #3498DB" href="https://www.northumbria.ac.uk/study-at-northumbria/new-students/">link</a> to view your programme induction timetable</p>
    <br/>
        <center>
            <img src="Images/successful.png" alt="Logo"  width= "312px" height= "312px" style="margin-top: 25px; align-items: center" />
        <br/><br/><br/>
            <input type="submit" href="mainmenu.php"  value="Return to Main Page"/>
        </center>
    </body>
</html>
<script>
    languageChange(); //changes the lanugage (default is english)
    themeChange();
    highContrast();
</script>
<style>
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>